<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Indicator;
use App\Metadata;
use App\SDBSData;
use App\Country;
use Spatie\ArrayToXml\ArrayToXml;
use DB;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class DatabaseController extends Controller
{
    private $xml;
    private $metadata;
    private $per_page = 500;

    public function __construct()
    {
        $this->xml = new \XMLWriter();
    }

    #returns api version
    public function apiv() {
        $this->xml->writeAttribute('version', "1.0");
    }

    # API home landing page
    public function apiHome()
    {
        $orderLog = new Logger('api');
        $orderLog->pushHandler(new StreamHandler(storage_path('logs/api.log')), Logger::INFO);
        $orderLog->info('api/,'.$this->getUserIpAddr());
        // $lastupdate = DB::table('sdbs_misc_data')
        //         ->select('misc_data_val')
        //         ->where('misc_data_id', 'HOME_LAST_UPD_DT')
        //         ->first();
        return view('api-home');
    }

    # API home landing page
    public function test()
    {
        return view('test');
    }

    # returns the API XML header
    public function xmlHeader($per_page,$total_records,$last_page,$curr_page)
    {
        $xml = $this->xml;
        $xml->startElement('message:Header');
                $xml->startElement('message:ID');
                $xml->text('KI');
                $xml->endElement();
                $xml->startElement('message:Test');
                $xml->text('false');
                $xml->endElement();
                $xml->startElement('message:Prepared');
                $xml->text(Carbon::now());
                $xml->endElement();
            
                $xml->startElement('message:Sender');
                $xml->writeAttribute('id', "ADB");
                    $xml->startElement('common:Name');
                    $xml->writeAttribute('xml:lang', "en");
                    $xml->text('Asian Development Bank');
                    $xml->endElement();
                    $xml->startElement('message:Contact');
                        $xml->startElement('common:Name');
                        $xml->writeAttribute('xml:lang', "en");
                        $xml->text('SDMX API Admin');
                        $xml->endElement();
                        $xml->startElement('message:Email');
                        $xml->text('jdelacruz3.consultant@adb.org');
                        $xml->endElement();
                    $xml->endElement();
                $xml->endElement();

                $xml->startElement('message:Structure');
                $xml->writeAttribute('structureID', "KI_DSD_1_0");
                $xml->writeAttribute('dimensionAtObservation', "TIME_PERIOD");
                    $xml->startElement('common:Structure');
                        $xml->startElement('Ref');
                        $xml->writeAttribute('agencyID', "ADB");
                        $xml->writeAttribute('id', "KI_DSD_1_0");
                        $xml->writeAttribute('version', "1.0");
                        $xml->endElement();
                    $xml->endElement();
                $xml->endElement();

                $xml->startElement('message:DataSetAction');
                $xml->text("Information");
                $xml->endElement();
                $xml->startElement('message:DataSetID');
                $xml->text("ADB_KI");
                $xml->endElement();
                $xml->startElement('message:Extracted');
                $xml->writeAttribute('text', Carbon::now());
                $xml->endElement();
                $xml->startElement('message:Records');
                if ($total_records) {
                    $xml->writeAttribute('totalRecords', $total_records);
                }
                if ($per_page) {
                    $xml->writeAttribute('recordsPerPage', $per_page);
                } else {
                    $xml->writeAttribute('recordsPerPage', $this->per_page);
                }
                if ($total_records && $per_page) {
                    $xml->writeAttribute('totalPages', number_format($total_records/$per_page,0));
                } else {
                    $xml->writeAttribute('totalPages', number_format($total_records/$this->per_page,0));
                }
                if ($curr_page) {
                    $xml->writeAttribute('currentPage', $curr_page);
                }
                $xml->endElement();

        $xml->endElement();
    }

    public function rawQuery() {
        $dataset = DB::table('SDBS_Metadata')
                       ->leftjoin('SDBS_Subject','SDBS_Metadata.subj_id', '=', 'SDBS_Subject.subj_id')
                       ->leftjoin('SDBS_Country','SDBS_Metadata.ctry_id', '=', 'SDBS_Country.ctry_id')
                       ->where('SDBS_Subject.subj_sdmx','MIN_QUR_CNP')
                       ->orderBy('ctry_sdmx','asc')
                       ->select(['SDBS_Subject.subj_id','subj_alt','subj_sdmx','SDBS_Country.ctry_sdmx','SDBS_Metadata.metadata_id'])
                       ->paginate(10);
        echo "<pre>";
        var_dump($dataset->items());
        dd();
    }

    #set number of records per result page
    public function setPagination($per_page) {
        if ($per_page) {
            $this->per_page = $per_page;
        }
        return $this->per_page;
    }

    public function applyCountryScope($query,$countries) {
        $country_filter = [];
        if ($countries) {
            $country_codes = explode(",",$countries);
            $query->whereIn('SDBS_Country.ctry_sdmx',$country_codes);
        }
        return $query;
    }

    public function applyYearScope($query,$years) {
        $year_filter = [];
        if ($years) {
            $year_filter = explode(",",$years); #allow single year and range input
            foreach ($year_filter as $key => $year_input) {
                if (strpos($year_input, ':') !== false) {
                    $parts = explode(':', $year_input);
                    $startyear = $parts[0];
                    $endyear = $parts[1];
                    unset($year_filter[$key]);
                    for ($x = $startyear; $x <= $endyear; $x++) {
                        array_push($year_filter,(string)$x);    
                    }
                }
            }
            $query->whereIn('SDBS_Data.data_year',$year_filter);
        }
        return $query;
    }

    public function applyAlternateScope($query,$years) {
        $query->where('SDBS_Metadata.subj_id',$indicator->subj_alt);
        return $query;
    }

    #filter data by input year
    public function filterData($countries, $years, $indicator) {
        $ki_countries = ["AF","AM","AU","AZ","BD","BT","BN","KH","CN","CK","FJ","GE","HK","IN","ID","JP","KZ","KI","KP","KG","LA","MY","MV","MH","FM","MN","MM","NR","NP","NZ","PK","PW","PG","PH","WS","SG","SB","LK","TW","TJ","TH","TL","TO","TM","TV","UZ","VU","VN"];
        $dataset = DB::table('SDBS_Data')
                       ->leftjoin('SDBS_Metadata','SDBS_Metadata.metadata_id', '=', 'SDBS_Data.metadata_id')
                       ->leftjoin('SDBS_Country','SDBS_Metadata.ctry_id', '=', 'SDBS_Country.ctry_id')
                       ->where('SDBS_Metadata.subj_id',$indicator->subj_id)
                       ->where('data_year','>=','2000')
                       ->where('data_flg_value','KI')
                       ->whereIn('SDBS_Country.ctry_sdmx',$ki_countries)
                       ->orderBy('ctry_sdmx','asc')
                       ->orderBy('data_year','asc')
                       ->select(['data_value1','data_year','SDBS_Country.ctry_sdmx']);
        $dataset = $this->applyCountryScope($dataset,$countries);
        $dataset = $this->applyYearScope($dataset,$years);
        $dataset = $dataset->paginate($this->per_page);

        #select * from sdbs_subject_group_members where subj_grp_id = 'SG-99' and subj_grp_mem_parent_id = 'SU-962' order by subj_grp_mem_lineage ;
        if (count($dataset)==0) {
            $alt_indicator = DB::table('sdbs_subject_group_members')->where('subj_grp_id','SG-99')->where('subj_grp_mem_parent_id',$indicator->subj_id)->first();
            $dataset = DB::table('SDBS_Data')
                       ->leftjoin('SDBS_Metadata','SDBS_Metadata.metadata_id', '=', 'SDBS_Data.metadata_id')
                       ->leftjoin('SDBS_Country','SDBS_Metadata.ctry_id', '=', 'SDBS_Country.ctry_id')
                       ->where('SDBS_Metadata.subj_id',$alt_indicator->subj_id)
                       ->where('data_year','>=','2000')
                       ->orderBy('ctry_sdmx','asc')
                       ->orderBy('data_year','asc')
                       ->select(['data_value1','data_year','SDBS_Country.ctry_sdmx']);
            $dataset = $this->applyCountryScope($dataset,$countries);
            $dataset = $this->applyYearScope($dataset,$years);
            $dataset = $dataset->paginate($this->per_page);
        }
        return $dataset;
    }

    #returns data frequency (annual only)
    public function filterFrequency($freq) {
        if (isset($freq) && strtoupper($freq)!= "A")  {
            dd("There is no data for the requested query. Please try again.");
        }
        return true;
    }

    #returns the multiplier value
    public function formatMultiplier($multiplier) {
        if ($multiplier) {
            $multiplier = pow(10,$multiplier);
        } else {
            $multiplier = 1;
        }
        return $multiplier;
    }

    # returns SDMX sample data
    public function querydata(Request $request, $sdmx_code) {

        $indicator = Indicator::where('subj_sdmx',$sdmx_code)->first();
        if ($indicator) {
            $pagination   = $this->setPagination($request->input('per_page'));
            $datasets     = $this->filterData($request->input('country'), $request->input('year'),$indicator);
            $frequency    = $this->filterFrequency($request->input('freq'));
            $multiplier   = $this->formatMultiplier($request->input('um'));
        } else { return abort(404); }

        
        if ($request->input('sdmx_format')=="compact") {
            return $this->structuredSDMXFormat($sdmx_code, $indicator, $datasets->items(), $frequency, $multiplier, $request->input('input_format'),$request->input('per_page'),$datasets->total(),$datasets->lastPage(),$datasets->currentPage(),$request->input('mode'));
        } else {
            return $this->genericSDMXFormat($sdmx_code, $indicator, $datasets->items(), $frequency, $multiplier,$request->input('input_format'),$request->input('per_page'),$datasets->total(),$datasets->lastPage(),$datasets->currentPage(),$request->input('mode'));    
        }

    }

    #generic format - longer
    public function genericSDMXFormat($sdmx_code, $indicator, $datasets, $frequency, $multiplier, $input_format, $per_page, $total_records, $last_page, $curr_page, $viewmode) {

        $xml = $this->xml;
        $xml->openMemory();
        $xml->startDocument();
        $xml->startElement('message:GenericData'); 
        $xml->writeAttribute('xmlns:message', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/message");
        $xml->writeAttribute('xmlns:generic', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/data/generic");
        $xml->writeAttribute('xmlns:footer', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/message/footer");
        $xml->writeAttribute('xmlns:common', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/common");
        $xml->writeAttribute('xmlns:xsi', "http://www.w3.org/2001/XMLSchema-instance");
        $this->xmlHeader($per_page, $total_records, $last_page, $curr_page);

            $xml->startElement('message:DataSet');
            $xml->writeAttribute('action', "Append");
            $xml->writeAttribute('structureRef', "KI_DSD_1_0");
            
                $country = "";
                foreach ($datasets as $data) {
                    if ($country != $data->ctry_sdmx) {
                        if($country != "") {
                            $xml->endElement();
                        }
                        $xml->startElement('generic:Series');
                        $xml->startElement('generic:SeriesKey');
                            $xml->startElement('generic:Value');
                            $xml->writeAttribute('id', "REF_AREA");
                            $xml->writeAttribute('value', $data->ctry_sdmx);
                            $xml->endElement();
                            $xml->startElement('generic:Value');
                            $xml->writeAttribute('id', "SERIES");
                            $xml->writeAttribute('value', $sdmx_code);
                            $xml->endElement();
                            $xml->startElement('generic:Value');
                            $xml->writeAttribute('id', "FREQ");
                            $xml->writeAttribute('value', "A");
                            $xml->endElement();
                        $xml->endElement();
                            if ($data->data_value1) {
                            $xml->startElement('generic:Obs');
                                $xml->startElement('generic:ObsDimension');
                                $xml->writeAttribute('id', "TIME_PERIOD");
                                $xml->writeAttribute('value', $data->data_year);
                                $xml->endElement();
                                $xml->startElement('generic:ObsValue');
                                $xml->writeAttribute('value', $data->data_value1/$multiplier);
                                $xml->endElement();
                                // $xml->startElement('generic:Attributes');
                                //     $xml->startElement('generic:Value');
                                //     $xml->writeAttribute('id', "UNIT_MULT");
                                //     $xml->writeAttribute('value', "0");
                                //     $xml->endElement();
                                // $xml->endElement();
                            $xml->endElement();
                            }   
                        $country = $data->ctry_sdmx;
                    } else {
                        if ($data->data_value1) {
                        $xml->startElement('generic:Obs');
                            $xml->startElement('generic:ObsDimension');
                            $xml->writeAttribute('id', "TIME_PERIOD");
                            $xml->writeAttribute('value', $data->data_year);
                            $xml->endElement();
                            $xml->startElement('generic:ObsValue');
                            $xml->writeAttribute('value', $data->data_value1/$multiplier);
                            $xml->endElement();
                            // $xml->startElement('generic:Attributes');
                            //     $xml->startElement('generic:Value');
                            //     $xml->writeAttribute('id', "UNIT_MULT");
                            //     $xml->writeAttribute('value', "0");
                            //     $xml->endElement();
                            // $xml->endElement();
                        $xml->endElement();
                        }
                    }
                }  
            $xml->endElement();
        $xml->endElement();

        $xml->endDocument();
        $content = $xml->outputMemory();
        $xml = null;
        $response_time = microtime(true) - LUMEN_START;

        $orderLog = new Logger('api');
        $orderLog->pushHandler(new StreamHandler(storage_path('logs/api.log')), Logger::INFO);
        $orderLog->info('querydata,generic,'.$sdmx_code.','.$this->getUserIpAddr());


        if ($input_format == "json") {
            $xmlObject = simplexml_load_string(str_replace(":","",$content));
            $json = json_encode($xmlObject);
            $array = json_decode($json,TRUE);
            return response()->json($array)->withHeaders(['X-Elapsed-Time'=>$response_time]);
        } else {
            // return response($content)->withHeaders(['Content-Type'=>'text/xml', 'X-Elapsed-Time'=>$response_time]);
            // return response($content)->withHeaders(['Content-Type' => 'text/xml','Content-Disposition' => 'attachment; filename="sampledata.xml"']);
            if ($viewmode == "view") {
                return response($content)->withHeaders(['Content-Type'=>'text/xml', 'X-Elapsed-Time'=>$response_time]);
            } else {
                return response($content)->withHeaders(['Content-Type' => 'text/xml','Content-Disposition' => 'attachment;filename="'.$indicator->subj_sdmx.'.xml"', 'X-Elapsed-Time'=>$response_time]);
            }
        }
    }

    #structure specific - more compact ///test comment
    public function structuredSDMXFormat($sdmx_code, $indicator, $datasets, $frequency, $multiplier, $input_format, $per_page, $total_records, $last_page, $curr_page, $viewmode) {

        $xml = $this->xml;
        $xml->openMemory();
        $xml->startDocument();
        $xml->startElement('message:StructureSpecificData'); 
        $xml->writeAttribute('xmlns:ss', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/data/structurespecific");
        $xml->writeAttribute('xmlns:message', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/message");
        $xml->writeAttribute('xmlns:generic', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/data/generic");
        $xml->writeAttribute('xmlns:footer', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/message/footer");
        $xml->writeAttribute('xmlns:common', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/common");
        $xml->writeAttribute('xmlns:xsi', "http://www.w3.org/2001/XMLSchema-instance");
        $this->xmlHeader($per_page, $total_records, $last_page, $curr_page);

        $xml->startElement('message:DataSet');
        $xml->writeAttribute('action', "Append");
        $xml->writeAttribute('structureRef', "KI_DSD_1_0");

        $country = "";
                
                foreach ($datasets as $data) {
                    // dd($data);
                    if ($country != $data->ctry_sdmx) {
                        if($country != "") {
                            $xml->endElement();
                        }
                        $xml->startElement('Series');
                        $xml->writeAttribute('REF_AREA', $data->ctry_sdmx);
                        $xml->writeAttribute('INDICATOR', $sdmx_code);
                        $xml->writeAttribute('FREQ', "A");
                        // $xml->writeAttribute('UNIT_MULT', "1");
                            $xml->startElement('Obs');
                            $xml->writeAttribute('TIME_PERIOD', $data->data_year);
                            $xml->writeAttribute('OBS_VALUE', $data->data_value1/$multiplier);
                            $xml->endElement();
                        $country = $data->ctry_sdmx;
                    } else {
                        $xml->startElement('Obs');
                        $xml->writeAttribute('TIME_PERIOD', $data->data_year);
                        $xml->writeAttribute('OBS_VALUE', $data->data_value1/$multiplier);
                        $xml->endElement();
                    }
                }   

        $xml->endElement();
        $xml->endDocument();
        $content = $xml->outputMemory();
        $xml = null;
        $response_time = microtime(true) - LUMEN_START;

        $orderLog = new Logger('api');
        $orderLog->pushHandler(new StreamHandler(storage_path('logs/api.log')), Logger::INFO);
        $orderLog->info('querydata,compact,'.$sdmx_code.','.$this->getUserIpAddr());

        if ($input_format == "json") {
            $xmlObject = simplexml_load_string(str_replace(":","",$content));
            $json = json_encode($xmlObject);
            $array = json_decode($json,TRUE);
            return response()->json($array)->withHeaders(['X-Elapsed-Time'=>$response_time]);
        } else {
            if ($viewmode == "view") {
                return response($content)->withHeaders(['Content-Type'=>'text/xml', 'X-Elapsed-Time'=>$response_time]);
            } else {
                return response($content)->withHeaders(['Content-Type' => 'text/xml','Content-Disposition' => 'attachment; filename="'.$indicator->subj_sdmx.'.xml"', 'X-Elapsed-Time'=>$response_time]);
            }
        }
    }

    public function getUserIpAddr(){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

}
