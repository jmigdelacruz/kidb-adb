<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Indicator;
use App\Metadata;
use App\SDBSData;
use App\Country;
use Spatie\ArrayToXml\ArrayToXml;

class DatabaseController extends Controller
{
    private $xml;

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
        return view('api-home');
    }

    # returns the API XML header
    public function xmlHeader()
    {
        $xml = $this->xml;
        $xml->startElement('Header');
            $xml->startElement('ID');
                $xml->text('Key Indicators');
            $xml->endElement();
            $xml->startElement('Test');
                $xml->text('True');
            $xml->endElement();
            $xml->startElement('Prepared');
                $xml->text(Carbon::now());
            $xml->endElement();
            $xml->startElement('Sender');
                $xml->writeAttribute('id', "");
            $xml->endElement();
            $xml->startElement('Reciever');
                $xml->writeAttribute('id', "");
            $xml->endElement();
        $xml->endElement();
    }

    public function filterDataByCountry($metadata, $countries) {
        $country_filter = [];
        if ($countries) {
            $country_filter = explode(",",$countries);
            $countries  = Country::whereIn('country_sdmx',$country_filter)->get();
        } else {
            $country_filter = $metadata->map(function($i) use ($country_filter) {
                return implode($i->only('country_id')); 
            })->toArray();
            $countries  = Country::whereIn('id',$country_filter)->get();
        }   
        return $countries;
    }

    public function filterDataByYear($metadata, $years) {
        $year_filter = [];
        if ($years) {
            $year_filter = explode(",",$years);
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
            $datasets = $metadata->map(function($i) use ($year_filter) {
                return SDBSData::where('metadata_id',$i->only('id'))->whereIn('data_year',$year_filter)->orderBy('data_year','asc')->get();
            });
        } else {
            $datasets = $metadata->map(function($i) {
                return SDBSData::where('metadata_id',$i->only('id'))->orderBy('data_year','asc')->get();
            });
        }   

        return $datasets;
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

        $indicator = Indicator::where('sdmx_code',$sdmx_code)->first();
        if ($indicator) {
            $metadata     = Metadata::where('indicator_id',$indicator->id)->get();
            $countries    = $this->filterDataByCountry($metadata, $request->input('country'));
            $datasets     = $this->filterDataByYear($metadata, $request->input('year'));
            $frequency    = $this->filterFrequency($request->input('freq'));
            $multiplier   = $this->formatMultiplier($request->input('um'));
        } else {
            return abort(404);
        }

        $xml = $this->xml;
        $xml->openMemory();
        $xml->startDocument();
        $xml->startElement('message:GenericData'); 
        $xml->writeAttribute('xmlns:message', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/message");
        $xml->writeAttribute('xmlns:generic', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/data/generic");
        $xml->writeAttribute('xmlns:footer', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/message/footer");
        $xml->writeAttribute('xmlns:common', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/common");
        $xml->writeAttribute('xmlns:xsi', "http://www.w3.org/2001/XMLSchema-instance");
            
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
                $xml->writeAttribute('structureID', "ADB_KI");
                $xml->writeAttribute('dimensionAtObservation', "TIME_PERIOD");
                    $xml->startElement('common:Structure');
                        $xml->startElement('Ref');
                        $xml->writeAttribute('agencyID', "ADB");
                        $xml->writeAttribute('id', "KI");
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

            $xml->endElement();

            $xml->startElement('message:DataSet');
            $xml->writeAttribute('action', "Append");
            $xml->writeAttribute('structureRef', "ADB_KI");
                
                foreach ($countries as $key => $country) {
                    if ($country) {
                    $xml->startElement('generic:Series');
                        $xml->startElement('generic:SeriesKey');
                            $xml->startElement('generic:Value');
                            $xml->writeAttribute('id', "REF_AREA");
                            $xml->writeAttribute('value', $country->country_sdmx);
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
                        foreach ($datasets[0] as $data) {
                        $xml->startElement('generic:Obs');
                            $xml->startElement('generic:ObsDimension');
                            $xml->writeAttribute('id', "TIME_PERIOD");
                            $xml->writeAttribute('value', $data->data_year);
                            $xml->endElement();
                            $xml->startElement('generic:ObsValue');
                            $xml->writeAttribute('value', $data->data_value/$multiplier);
                            $xml->endElement();
                            $xml->startElement('generic:Attributes');
                                $xml->startElement('generic:Value');
                                $xml->writeAttribute('id', "UNIT_MULT");
                                $xml->writeAttribute('value', "0");
                                $xml->endElement();
                            $xml->endElement();
                        $xml->endElement();
                        }
                    $xml->endElement();
                    }
                }
            $xml->endElement();
        $xml->endElement();

        $xml->endDocument();
        $content = $xml->outputMemory();
        $xml = null;

        $format = $request->input('format');
        if ($format == "json") {
            dd($content);
            $xmlObject = simplexml_load_string($content);
            dd($xmlObject);
            $json = json_encode($xmlObject);
            $array = json_decode($json,TRUE);
            return response()->json($array);
        } else {
            return response($content)->withHeaders(['Content-Type' => 'text/xml']);
            // return response($content)->withHeaders(['Content-Type' => 'text/xml','Content-Disposition' => 'attachment; filename="sampledata.xml"']);
        }
    }

}
