<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Country;
use App\UnitMultiplier;

class MetadataController extends Controller
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
        $xml->startElement('Structure');
        $xml->writeAttribute('xmlns', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/message");

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
                $xml->writeAttribute('id', '');
                $xml->endElement();
                $xml->startElement('Reciever');
                $xml->writeAttribute('id', '');
                $xml->endElement();
            $xml->endElement();

            $xml->startElement('Structures');
    }

    # returns the API XML footer
    public function xmlFooter()
    {
        $xml = $this->xml;
        $xml->endElement();
        $xml->endElement();
        $xml->endDocument();
    }

    public function returnJson($xml)
    {
        $xmlObject = simplexml_load_string($xml);
        $json = json_encode($xmlObject);
        $array = json_decode($json,TRUE);
        return $array;
    }

    # returns the KIDB SDMX dataflow
    public function dataflow(Request $request) {

        $xml = $this->xml;
        $xml->openMemory();
        $xml->startDocument();
        $xml->startElement('Structure');
        $xml->writeAttribute('xmlns', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/message");
            $this->xmlHeader();
            $xml->startElement('Structures');
                    $xml->startElement('Dataflows');
                    $xml->writeAttribute('xmlns', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/structure");
                        $xml->startElement('Dataflow');
                        $xml->writeAttribute('id', "KI");
                        $xml->writeAttribute('urn', "urn:sdmx:org.sdmx.infomodel.datastructure.Dataflow:ADB(1.0)");
                        $xml->writeAttribute('agencyID', "ADB");
                        $xml->writeAttribute('version', "1.0");
                        $xml->writeAttribute('isFinal', "false");
                            $xml->startElement('Name');
                            $xml->writeAttribute('xml:lang', "en");
                            $xml->writeAttribute('xmlns', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/common");
                            $xml->text('Key Indicators Database');
                            $xml->startElement('Structure');
                                $xml->startElement('Ref');
                                $xml->writeAttribute('id', "KI");
                                $xml->writeAttribute('version', "0.1");
                                $xml->writeAttribute('agency', "ADB");
                                $xml->writeAttribute('package', "datastructure");
                                $xml->writeAttribute('class', "DataStructure");
                                $xml->writeAttribute('xmlns', "");
            $xml->endElement();
        $xml->endElement();
        $xml->endDocument();
        $content = $xml->outputMemory();
        $xml = null;

        $format = $request->input('format');
        if ($format == "json") {
            $xmlObject = simplexml_load_string($content);
            $json = json_encode($xmlObject);
            $array = json_decode($json,TRUE);
            return response()->json($array);
        } else {
            return response($content)->header('Content-Type', 'text/xml');
        }
    }

    # returns the KIDB SDMX data
    public function datastructure() {
        
        $xml = $this->xml;
        $xml->openMemory();
        $xml->startDocument();
        $xml->startElement('Structure');
        $xml->writeAttribute('xmlns', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/message");
            $this->xmlHeader();
            $xml->startElement('Structures');
                    $xml->startElement('DataStructures');
                    $xml->writeAttribute('xmlns', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/structure");
                        $xml->startElement('DataStructure');
                        $xml->writeAttribute('id', "KI");
                        $xml->writeAttribute('urn', "urn:sdmx:org.sdmx.infomodel.conceptscheme.ConcepScheme=ADB:KI(1.0)");
                        $xml->writeAttribute('agencyID', "ADB");
                        $xml->writeAttribute('version', "1.0");
                        $xml->writeAttribute('isFinal', "false");
                            $xml->startElement('Name');
                            $xml->writeAttribute('xml:lang', "en");
                            $xml->writeAttribute('xmlns', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/common");
                            $xml->text('Key Indicators Database');
                            $xml->startElement('DataStructureComponents');

                                $xml->startElement('DimensionList');
                                $xml->writeAttribute('id', "DimensionDescriptor");
                                $xml->writeAttribute('urn', "urn:sdmx:org.sdmx.infomodel.datastructure.DimensionDescriptor=ADB:KI(1.0).DimensionDescriptor");
                                    #freq dimension
                                    $xml->startElement('Dimension');
                                    $xml->writeAttribute('id', "FREQ");
                                    $xml->writeAttribute('urn', "urn:sdmx:org.sdmx.infomodel.datastructure.Dimension=ADB:KI(1.0).FREQ");
                                    $xml->writeAttribute('position', "1");
                                        $xml->startElement('ConceptIdentity');
                                            $xml->startElement('Ref');
                                                $xml->writeAttribute('id', "FREQ");
                                                $xml->writeAttribute('maintainableParentID', "KI_CONCEPT");
                                                $xml->writeAttribute('maintainableParentVersion', "1.0");
                                                $xml->writeAttribute('agencyID', "ADB");
                                                $xml->writeAttribute('package', "conceptscheme");
                                                $xml->writeAttribute('class', "Concept");
                                            $xml->endElement();
                                        $xml->endElement();
                                        $xml->startElement('LocalRepresentation');
                                            $xml->startElement('Enumeration');
                                                $xml->startElement('Ref');
                                                $xml->writeAttribute('id', "CL_FREQ_ADB");
                                                $this->apiv();
                                                $xml->writeAttribute('maintainableParentVersion', "1.0");
                                                $xml->writeAttribute('agencyID', "ADB");
                                                $xml->writeAttribute('package', "codelist");
                                                $xml->writeAttribute('class', "CodeList");
                                                $xml->endElement();
                                            $xml->endElement();
                                        $xml->endElement();
                                    $xml->endElement();


                                    #series dimension
                                    $xml->startElement('Dimension');
                                    $xml->writeAttribute('id', "SERIES");
                                    $xml->writeAttribute('urn', "urn:sdmx:org.sdmx.infomodel.datastructure.Dimension=ADB:KI(1.0).SERIES");
                                    $xml->writeAttribute('position', "2");
                                        $xml->startElement('ConceptIdentity');
                                            $xml->startElement('Ref');
                                                $xml->writeAttribute('id', "SERIES");
                                                $xml->writeAttribute('maintainableParentID', "KI_CONCEPT");
                                                $xml->writeAttribute('maintainableParentVersion', "1.0");
                                                $xml->writeAttribute('agencyID', "ADB");
                                                $xml->writeAttribute('package', "conceptscheme");
                                                $xml->writeAttribute('class', "Concept");
                                            $xml->endElement();
                                        $xml->endElement();
                                        $xml->startElement('LocalRepresentation');
                                            $xml->startElement('Enumeration');
                                                $xml->startElement('Ref');
                                                $xml->writeAttribute('id', "CL_SERIES_ADB");
                                                $this->apiv();
                                                $xml->writeAttribute('maintainableParentVersion', "1.0");
                                                $xml->writeAttribute('agencyID', "ADB");
                                                $xml->writeAttribute('package', "codelist");
                                                $xml->writeAttribute('class', "CodeList");
                                                $xml->endElement();
                                            $xml->endElement();
                                        $xml->endElement();
                                    $xml->endElement();

                                    #ref area dimension
                                    $xml->startElement('Dimension');
                                    $xml->writeAttribute('id', "REF_AREA");
                                    $xml->writeAttribute('urn', "urn:sdmx:org.sdmx.infomodel.datastructure.Dimension=ADB:KI(1.0).REF_AREA");
                                    $xml->writeAttribute('position', "3");
                                        $xml->startElement('ConceptIdentity');
                                            $xml->startElement('Ref');
                                                $xml->writeAttribute('id', "REF_AREA");
                                                $xml->writeAttribute('maintainableParentID', "KI_CONCEPT");
                                                $xml->writeAttribute('maintainableParentVersion', "1.0");
                                                $xml->writeAttribute('agencyID', "ADB");
                                                $xml->writeAttribute('package', "conceptscheme");
                                                $xml->writeAttribute('class', "Concept");
                                            $xml->endElement();
                                        $xml->endElement();
                                        $xml->startElement('LocalRepresentation');
                                            $xml->startElement('Enumeration');
                                                $xml->startElement('Ref');
                                                $xml->writeAttribute('id', "CL_REF_AREA_ADB");
                                                $this->apiv();
                                                $xml->writeAttribute('maintainableParentVersion', "1.0");
                                                $xml->writeAttribute('agencyID', "ADB");
                                                $xml->writeAttribute('package', "codelist");
                                                $xml->writeAttribute('class', "CodeList");
                                                $xml->endElement();
                                            $xml->endElement();
                                        $xml->endElement();
                                    $xml->endElement();

                                    #ref period dimension
                                    $xml->startElement('TimeDimension');
                                    $xml->writeAttribute('id', "TIME_PERIOD");
                                    $xml->writeAttribute('urn', "urn:sdmx:org.sdmx.infomodel.datastructure.Dimension=ADB:KI(1.0).TIME_PERIOD");
                                    $xml->writeAttribute('position', "4");
                                        $xml->startElement('ConceptIdentity');
                                            $xml->startElement('Ref');
                                                $xml->writeAttribute('id', "TIME_PERIOD");
                                                $xml->writeAttribute('maintainableParentID', "KI_CONCEPT");
                                                $xml->writeAttribute('maintainableParentVersion', "1.0");
                                                $xml->writeAttribute('agencyID', "ADB");
                                                $xml->writeAttribute('package', "conceptscheme");
                                                $xml->writeAttribute('class', "Concept");
                                            $xml->endElement();
                                        $xml->endElement();
                                        $xml->startElement('LocalRepresentation');
                                            $xml->startElement('TextFormat');
                                                $xml->writeAttribute('textType', "ObservationalTimePeriod");
                                                $xml->endElement();
                                            $xml->endElement();
                                        $xml->endElement();
                                    $xml->endElement();


                            $xml->startElement('AttributeList');
                            $xml->writeAttribute('id', "AttributeDescriptor");
                            $xml->writeAttribute('urn', "urn:sdmx:org.sdmx.infomodel.datastructure.AttributeDescriptor=ADB:KI(1.0).AttributeDescriptor");
                                    $xml->startElement('Attribute');
                                    $xml->writeAttribute('id', "UNIT_MULT");
                                    $xml->writeAttribute('urn', "urn:sdmx:org.sdmx.infomodel.datastructure.DataAttribute=ADB:KI(1.0).UNIT_MULT");
                                    $xml->writeAttribute('assignmentStatus', "Mandatory");
                                        $xml->startElement('ConceptIdentity');
                                            $xml->startElement('Ref');
                                                $xml->writeAttribute('id', "UNIT_MULT");
                                                $xml->writeAttribute('maintainableParentID', "KI_CONCEPT");
                                                $xml->writeAttribute('maintainableParentVersion', "1.0");
                                                $xml->writeAttribute('agencyID', "ADB");
                                                $xml->writeAttribute('package', "conceptscheme");
                                                $xml->writeAttribute('class', "Concept");
                                            $xml->endElement();
                                        $xml->endElement();
                                        $xml->startElement('LocalRepresentation');
                                            $xml->startElement('Enumeration');
                                                $xml->startElement('Ref');
                                                $xml->writeAttribute('id', "CL_UNIT_MULT_ADB");
                                                $this->apiv();
                                                $xml->writeAttribute('maintainableParentVersion', "1.0");
                                                $xml->writeAttribute('agencyID', "ADB");
                                                $xml->writeAttribute('package', "codelist");
                                                $xml->writeAttribute('class', "CodeList");
                                                $xml->endElement();
                                            $xml->endElement();
                                        $xml->endElement();
                                        $xml->startElement('AttributeRelationship');
                                            $xml->startElement('PrimaryMeasure');
                                                $xml->startElement('Ref');
                                                $xml->writeAttribute('id', "OBS_VALUE");
                                                $xml->endElement();
                                            $xml->endElement();
                                        $xml->endElement();
                                    $xml->endElement();
                            $xml->endElement();


                            $xml->startElement('MeasureList');
                            $xml->writeAttribute('id', "MeasureDescriptor");
                            $xml->writeAttribute('urn', "urn:sdmx:org.sdmx.infomodel.datastructure.MeasureDescriptor=ADB:KI(1.0).MeasureDescriptor");
                                    $xml->startElement('PrimaryMeasure');
                                    $xml->writeAttribute('id', "OBS_VALUE");
                                    $xml->writeAttribute('urn', "urn:sdmx:org.sdmx.infomodel.datastructure.PrimaryMeasure=ADB:KI(1.0).OBS_VALUE");
                                        $xml->startElement('ConceptIdentity');
                                            $xml->startElement('Ref');
                                                $xml->writeAttribute('id', "OBS_VALUE");
                                                $xml->writeAttribute('maintainableParentID', "KI_CONCEPT");
                                                $xml->writeAttribute('maintainableParentVersion', "1.0");
                                                $xml->writeAttribute('agencyID', "ADB");
                                                $xml->writeAttribute('package', "conceptscheme");
                                                $xml->writeAttribute('class', "Concept");
                                            $xml->endElement();
                                        $xml->endElement();
                                    $xml->endElement();
                            $xml->endElement();



                        $xml->endElement();
            $xml->endElement();
        $xml->endElement();
        $xml->endDocument();

        $content = $xml->outputMemory();
        $xml = null;
        return response($content)->header('Content-Type', 'text/xml');
    }

    # returns the KIDB SDMX conceptscheme
    public function conceptscheme(Request $request) {

        $xml = $this->xml;
        $xml->openMemory();
        $xml->startDocument();
        $xml->startElement('Structure');
        $xml->writeAttribute('xmlns', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/message");
            $this->xmlHeader();
            $xml->startElement('Structures');
                    $xml->startElement('Concepts');
                    $xml->writeAttribute('xmlns', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/structure");
                        $xml->startElement('ConceptScheme');
                        $xml->writeAttribute('id', "KI_CONCEPT");
                        $xml->writeAttribute('urn', "urn:sdmx:org.sdmx.infomodel.conceptscheme.ConcepScheme=ADB:KI_CONCEPT(1.0)");
                        $xml->writeAttribute('agencyID', "ADB");
                        $xml->writeAttribute('version', "1.0");
                        $xml->writeAttribute('isFinal', "false");
                            $xml->startElement('Name');
                            $xml->writeAttribute('xml:lang', "en");
                            $xml->writeAttribute('xmlns', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/common");
                            $xml->text('Default Scheme');

                            $xml->startElement('Concept');
                                $xml->writeAttribute('id', "FREQ");
                                $xml->writeAttribute('urn', "urn:sdmx:org.sdmx.infomodel.conceptscheme.Concept=ADB:KI_CONCEPT(1.0).FREQ");
                                $xml->startElement('Name');
                                    $xml->writeAttribute('xml:lang', "en");
                                    $xml->writeAttribute('xmlns', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/common");
                                    $xml->text('Frequency');
                                $xml->endElement();
                                $xml->startElement('Description');
                                    $xml->writeAttribute('xml:lang', "en");
                                    $xml->writeAttribute('xmlns', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/common");
                                    $xml->text('Indicates rate of recurrence at which observations occur (e.g. monthly, yearly, biannually, etc.).');
                                $xml->endElement();
                            $xml->endElement();
                            $xml->startElement('Concept');
                                $xml->writeAttribute('id', "REF_AREA");
                                $xml->writeAttribute('urn', "urn:sdmx:org.sdmx.infomodel.conceptscheme.Concept=ADB:KI_CONCEPT(1.0).REF_AREA");
                                $xml->startElement('Name');
                                    $xml->writeAttribute('xml:lang', "en");
                                    $xml->writeAttribute('xmlns', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/common");
                                    $xml->text('Reference Area');
                                $xml->endElement();
                                $xml->startElement('Description');
                                    $xml->writeAttribute('xml:lang', "en");
                                    $xml->writeAttribute('xmlns', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/common");
                                    $xml->text('Reference Area: Specific areas (e.g. Country, Regional Grouping, etc) the observed values refer to. Reference areas can be determined according to different criteria (e.g.: geographical, economic, etc.).');
                                $xml->endElement();
                            $xml->endElement();
                            $xml->startElement('Concept');
                                $xml->writeAttribute('id', "SERIES");
                                $xml->writeAttribute('urn', "urn:sdmx:org.sdmx.infomodel.conceptscheme.Concept=ADB:KI_CONCEPT(1.0).SERIES");
                                $xml->startElement('Name');
                                    $xml->writeAttribute('xml:lang', "en");
                                    $xml->writeAttribute('xmlns', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/common");
                                    $xml->text('Series');
                                $xml->endElement();
                                $xml->startElement('Description');
                                    $xml->writeAttribute('xml:lang', "en");
                                    $xml->writeAttribute('xmlns', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/common");
                                    $xml->text('The phenomenon or phenomena to be measured in the data set. The word SERIES is used for consistency with the term used in the KI Database. SERIES are 1024 key indicators from ADB KI Database.');
                                $xml->endElement();
                            $xml->endElement();
                            $xml->startElement('Concept');
                                $xml->writeAttribute('id', "TIME_PERIOD");
                                $xml->writeAttribute('urn', "urn:sdmx:org.sdmx.infomodel.conceptscheme.Concept=ADB:KI_CONCEPT(1.0).TIME_PERIOD");
                                $xml->startElement('Name');
                                    $xml->writeAttribute('xml:lang', "en");
                                    $xml->writeAttribute('xmlns', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/common");
                                    $xml->text('Time Period');
                                $xml->endElement();
                                $xml->startElement('Description');
                                    $xml->writeAttribute('xml:lang', "en");
                                    $xml->writeAttribute('xmlns', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/common");
                                    $xml->text('Reference date - or date range - the observed value refers to (usually different from the dates of data production or dissemination)');
                                $xml->endElement();
                            $xml->endElement();
                            $xml->startElement('Concept');
                                $xml->writeAttribute('id', "TIME_PERIOD");
                                $xml->writeAttribute('urn', "urn:sdmx:org.sdmx.infomodel.conceptscheme.Concept=ADB:KI_CONCEPT(1.0).TIME_PERIOD");
                                $xml->startElement('Name');
                                    $xml->writeAttribute('xml:lang', "en");
                                    $xml->writeAttribute('xmlns', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/common");
                                    $xml->text('Time Period');
                                $xml->endElement();
                                $xml->startElement('Description');
                                    $xml->writeAttribute('xml:lang', "en");
                                    $xml->writeAttribute('xmlns', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/common");
                                    $xml->text('Reference date - or date range - the observed value refers to (usually different from the dates of data production or dissemination).');
                                $xml->endElement();
                            $xml->endElement();
                            $xml->startElement('Concept');
                                $xml->writeAttribute('id', "UNIT_MULT");
                                $xml->writeAttribute('urn', "urn:sdmx:org.sdmx.infomodel.conceptscheme.Concept=ADB:KI_CONCEPT(1.0).UNIT_MULT");
                                $xml->startElement('Name');
                                    $xml->writeAttribute('xml:lang', "en");
                                    $xml->writeAttribute('xmlns', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/common");
                                    $xml->text('Unit Multiplier');
                                $xml->endElement();
                                $xml->startElement('Description');
                                    $xml->writeAttribute('xml:lang', "en");
                                    $xml->writeAttribute('xmlns', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/common");
                                    $xml->text('Exponent in base 10 that multiplied by the observation numeric value gives the result expressed in the unit of.');
                                $xml->endElement();
                            $xml->endElement();
                            $xml->startElement('Concept');
                                $xml->writeAttribute('id', "OBS_VALUE");
                                $xml->writeAttribute('urn', "urn:sdmx:org.sdmx.infomodel.conceptscheme.Concept=ADB:KI_CONCEPT(1.0).OBS_VALUE");
                                $xml->startElement('Name');
                                    $xml->writeAttribute('xml:lang', "en");
                                    $xml->writeAttribute('xmlns', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/common");
                                    $xml->text('Observation Value');
                                $xml->endElement();
                                $xml->startElement('Description');
                                    $xml->writeAttribute('xml:lang', "en");
                                    $xml->writeAttribute('xmlns', "http://www.sdmx.org/resources/sdmxml/schemas/v2_1/common");
                                    $xml->text('Observation value.');
                                $xml->endElement();
                            $xml->endElement();
            $xml->endElement();
        $xml->endElement();
        $xml->endDocument();
        $content = $xml->outputMemory();
        $xml = null;

        $format = $request->input('format');
        if ($format == "json") {
            dd($content);
            $xmlObject = simplexml_load_string($content);
            $json = json_encode($xmlObject);
            $array = json_decode($json,TRUE);
            return response()->json($array);
        } else {
            return response($content)->withHeaders(['Content-Type' => 'text/xml']);
            // return response($content)->withHeaders(['Content-Type' => 'text/xml','Content-Disposition' => 'attachment; filename="sampledata.xml"']);
        }
    }

    # returns the sdmx code lists
    public function getCodeList(Request $request)
    {

        $xml = $this->xml;
        $xml->openMemory();
        $xml->startDocument();
        $this->xmlHeader();

        $xml->startElement('Codelists');
        $xml->writeAttribute('xmlns', 'http://www.sdmx.org/resources/sdmxml/schemas/v2_1/structure');

            /* start code list*/
            $xml->startElement('Codelist');
            $xml->writeAttribute('id', 'CL_FREQ_ADB');
            $xml->writeAttribute('urn', 'urn:sdmx:org.sdmx.infomodel.codelist.Codelist=KI:CL_FREQ_ADB(1.0)');
            $xml->writeAttribute('agencyID', 'ADB');
            $xml->writeAttribute('version', '1.0');
            $xml->writeAttribute('isFinal', 'false');
                $xml->startElement('Name');
                $xml->writeAttribute('xml:lang', 'en');
                $xml->writeAttribute('xmlns', 'http://www.sdmx.org/resources/sdmxml/schemas/v2_1/common');
                $xml->writeAttribute('text', 'Frequency code list');
                $xml->endElement();
                /*start code value*/
                $xml->startElement('Code');
                $xml->writeAttribute('id', 'A');
                $xml->writeAttribute('urn', 'urn:sdmx:org.sdmx.infomodel.codelist.Code=KI:CL_FREQ_ADB(1.0).A');
                    $xml->startElement('Name');
                    $xml->writeAttribute('xml:lang', 'en');
                    $xml->writeAttribute('xmlns', 'http://www.sdmx.org/resources/sdmxml/schemas/v2_1/common');
                    $xml->writeAttribute('text', 'Annual');
                    $xml->endElement();
                $xml->endElement();
                /*end code value*/
            $xml->endElement();
            /* end code list*/

            #COUNTRIES
            $xml->startElement('Codelist');
            $xml->writeAttribute('id', 'CL_REF_AREA_ADB');
            $xml->writeAttribute('urn', 'urn:sdmx:org.sdmx.infomodel.codelist.Codelist=KI:CL_REF_AREA_ADB(1.0)');
            $xml->writeAttribute('agencyID', 'ADB');
            $xml->writeAttribute('version', '1.0');
            $xml->writeAttribute('isFinal', 'false');
                $xml->startElement('Name');
                $xml->writeAttribute('xml:lang', 'en');
                $xml->writeAttribute('xmlns', 'http://www.sdmx.org/resources/sdmxml/schemas/v2_1/common');
                $xml->writeAttribute('text', 'This code list provides code values for the reference area');
                $xml->endElement();
                /*start country codes*/
                $countries = Country::all();
                foreach ($countries as $country) {
                    $xml->startElement('Code');
                    $xml->writeAttribute('id', $country->country_code);
                    $xml->writeAttribute('urn', 'urn:sdmx:org.sdmx.infomodel.codelist.Code=KI:CL_REF_AREA_ADB(1.0).'.$country->country_sdmx);
                        $xml->startElement('Name');
                        $xml->writeAttribute('xml:lang', 'en');
                        $xml->writeAttribute('xmlns', 'http://www.sdmx.org/resources/sdmxml/schemas/v2_1/common');
                        $xml->writeAttribute('text', $country->country_name);
                        $xml->endElement();
                    $xml->endElement();
                }
                /*end country codes*/
            $xml->endElement();

            #UNIT MULT
            $xml->startElement('Codelist');
            $xml->writeAttribute('id', 'CL_UNIT_MULT_ADB');
            $xml->writeAttribute('urn', 'urn:sdmx:org.sdmx.infomodel.codelist.Codelist=KI:CL_UNIT_MULT_ADB(1.0)');
            $xml->writeAttribute('agencyID', 'ADB');
            $xml->writeAttribute('version', '1.0');
            $xml->writeAttribute('isFinal', 'false');
                $xml->startElement('Name');
                $xml->writeAttribute('xml:lang', 'en');
                $xml->writeAttribute('xmlns', 'http://www.sdmx.org/resources/sdmxml/schemas/v2_1/common');
                $xml->writeAttribute('text', 'This code list provides code values for indicating the magnitude in the units of measurement. ');
                $xml->endElement();
                /*start unit multiplier codes*/
                $unitmult = UnitMultiplier::all();
                foreach ($unitmult as $multiplier) {
                    $xml->startElement('Code');
                    $xml->writeAttribute('id', $multiplier->um_code);
                    $xml->writeAttribute('urn', 'urn:sdmx:org.sdmx.infomodel.codelist.Code=KI:CL_UNIT_MULT_ADB(1.0).'.$multiplier->um_code);
                        $xml->startElement('Name');
                        $xml->writeAttribute('xml:lang', 'en');
                        $xml->writeAttribute('xmlns', 'http://www.sdmx.org/resources/sdmxml/schemas/v2_1/common');
                        $xml->writeAttribute('text', $multiplier->um_name);
                        $xml->endElement();
                    $xml->endElement();
                }
                /*end unit multiplier codes*/
            $xml->endElement();

        $this->xmlFooter();
        $content = $xml->outputMemory();
        $xml = null;

        $format = $request->input('format');
        if ($format == "json") {
            return response()->json($this->returnJson($content));
        } else if ($format == "xml") {
            return response($content)->withHeaders(['Content-Type' => 'text/xml']);
        } else {
            return response($content)->withHeaders(['Content-Type' => 'text/xml','Content-Disposition' => 'attachment; filename="sampledata.xml"']);
        }
    }

}
