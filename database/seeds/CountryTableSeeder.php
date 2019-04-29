<?php

use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('countries')->truncate();
		DB::table('countries')->insert(array(
			array("country_code"=>"AFG","country_name"=>"Afghanistan","country_alias"=>"Afghanistan","country_sdmx"=>"AF"),
			array("country_code"=>"AFN","country_name"=>"Africa n.s.","country_alias"=>"","country_sdmx"=>"2"),
			array("country_code"=>"ALB","country_name"=>"Albania","country_alias"=>"Albania","country_sdmx"=>"AL"),
			array("country_code"=>"ALG","country_name"=>"Algeria","country_alias"=>"Algeria","country_sdmx"=>"DZ"),
			array("country_code"=>"ASM","country_name"=>"American Samoa","country_alias"=>"American Samoa","country_sdmx"=>"AS"),
			array("country_code"=>"AND","country_name"=>"Andorra","country_alias"=>"Andorra","country_sdmx"=>"AD"),
			array("country_code"=>"ANG","country_name"=>"Angola","country_alias"=>"Angola","country_sdmx"=>"AO"),
			array("country_code"=>"ANT","country_name"=>"Antigua and Barbuda","country_alias"=>"Antigua and Barbuda","country_sdmx"=>"AG"),
			array("country_code"=>"ARG","country_name"=>"Argentina","country_alias"=>"Argentina","country_sdmx"=>"AR"),
			array("country_code"=>"ARM","country_name"=>"Armenia","country_alias"=>"Armenia","country_sdmx"=>"AM"),
			array("country_code"=>"ARU","country_name"=>"Aruba","country_alias"=>"Aruba","country_sdmx"=>"AW"),
			array("country_code"=>"ASN","country_name"=>"Asia n.s.","country_alias"=>"","country_sdmx"=>"142"),
			array("country_code"=>"AUS","country_name"=>"Australia","country_alias"=>"Australia","country_sdmx"=>"AU"),
			array("country_code"=>"AUT","country_name"=>"Austria","country_alias"=>"Austria","country_sdmx"=>"AT"),
			array("country_code"=>"AZE","country_name"=>"Azerbaijan","country_alias"=>"Azerbaijan","country_sdmx"=>"AZ"),
			array("country_code"=>"BHM","country_name"=>"Bahamas, The","country_alias"=>"Bahamas","country_sdmx"=>"BS"),
			array("country_code"=>"BHR","country_name"=>"Bahrain","country_alias"=>"Bahrain","country_sdmx"=>"BH"),
			array("country_code"=>"BAN","country_name"=>"Bangladesh","country_alias"=>"Bangladesh","country_sdmx"=>"BD"),
			array("country_code"=>"BAR","country_name"=>"Barbados","country_alias"=>"Barbados","country_sdmx"=>"BB"),
			array("country_code"=>"BLR","country_name"=>"Belarus","country_alias"=>"Belarus","country_sdmx"=>"BY"),
			array("country_code"=>"BEL","country_name"=>"Belgium","country_alias"=>"Belgium","country_sdmx"=>"BE"),
			array("country_code"=>"BLX","country_name"=>"Belgium-Luxembourg","country_alias"=>"Belgium-Luxembourg","country_sdmx"=>"BE"),
			array("country_code"=>"BLN","country_name"=>"Belguim-Lexumbourg n.s.","country_alias"=>"","country_sdmx"=>"BE"),
			array("country_code"=>"BLZ","country_name"=>"Belize","country_alias"=>"Belize","country_sdmx"=>"BZ"),
			array("country_code"=>"BEN","country_name"=>"Benin","country_alias"=>"Benin","country_sdmx"=>"BJ"),
			array("country_code"=>"BER","country_name"=>"Bermuda","country_alias"=>"Bermuda","country_sdmx"=>"BM"),
			array("country_code"=>"BHU","country_name"=>"Bhutan","country_alias"=>"Bhutan","country_sdmx"=>"BT"),
			array("country_code"=>"BOL","country_name"=>"Bolivia","country_alias"=>"Bolivia","country_sdmx"=>"BO"),
			array("country_code"=>"BIH","country_name"=>"Bosnia and Herzegovina","country_alias"=>"Bosnia-Herzegovina","country_sdmx"=>"BA"),
			array("country_code"=>"BOT","country_name"=>"Botswana","country_alias"=>"Botswana","country_sdmx"=>"BW"),
			array("country_code"=>"BRA","country_name"=>"Brazil","country_alias"=>"Brazil","country_sdmx"=>"BR"),
			array("country_code"=>"BRU","country_name"=>"Brunei Darussalam","country_alias"=>"Brunei","country_sdmx"=>"BN"),
			array("country_code"=>"BUL","country_name"=>"Bulgaria","country_alias"=>"Bulgaria","country_sdmx"=>"BG"),
			array("country_code"=>"BUF","country_name"=>"Burkina Faso","country_alias"=>"Burkina Faso","country_sdmx"=>"BF"),
			array("country_code"=>"BDI","country_name"=>"Burundi","country_alias"=>"Burundi","country_sdmx"=>"BI"),
			array("country_code"=>"CAM","country_name"=>"Cambodia","country_alias"=>"Cambodia","country_sdmx"=>"KH"),
			array("country_code"=>"CMR","country_name"=>"Cameroon","country_alias"=>"Cameroon","country_sdmx"=>"CM"),
			array("country_code"=>"CAN","country_name"=>"Canada","country_alias"=>"Canada","country_sdmx"=>"CA"),
			array("country_code"=>"CPV","country_name"=>"Cape Verde","country_alias"=>"Cape Verde","country_sdmx"=>"CV"),
			array("country_code"=>"CAY","country_name"=>"Cayman Islands","country_alias"=>"Cayman Is.","country_sdmx"=>"KY"),
			array("country_code"=>"CAR","country_name"=>"Central African Republic","country_alias"=>"Central African Rep.","country_sdmx"=>"CF"),
			array("country_code"=>"CHA","country_name"=>"Chad","country_alias"=>"Chad","country_sdmx"=>"TD"),
			array("country_code"=>"CHI","country_name"=>"Channel Islands","country_alias"=>"Channel Islands","country_sdmx"=>"CHI"),
			array("country_code"=>"CHL","country_name"=>"Chile","country_alias"=>"Chile","country_sdmx"=>"CL"),
			array("country_code"=>"PRC","country_name"=>"China, People's Rep. of","country_alias"=>"China, People's Rep. of","country_sdmx"=>"CN"),
			array("country_code"=>"COL","country_name"=>"Colombia","country_alias"=>"Colombia","country_sdmx"=>"CO"),
			array("country_code"=>"COM","country_name"=>"Comoros","country_alias"=>"Comoros","country_sdmx"=>"KM"),
			array("country_code"=>"ZAI","country_name"=>"Congo, Democratic Republic of","country_alias"=>"Congo, Dem. Rep. of","country_sdmx"=>"CD"),
			array("country_code"=>"CON","country_name"=>"Congo, Republic of the","country_alias"=>"Congo, Rep. of the","country_sdmx"=>"CG"),
			array("country_code"=>"COO","country_name"=>"Cook Islands","country_alias"=>"Cook Islands","country_sdmx"=>"CK"),
			array("country_code"=>"COS","country_name"=>"Costa Rica","country_alias"=>"Costa Rica","country_sdmx"=>"CR"),
			array("country_code"=>"IVC","country_name"=>"Cote d'Ivoire","country_alias"=>"Ivory Coast","country_sdmx"=>"CI"),
			array("country_code"=>"CRO","country_name"=>"Croatia","country_alias"=>"Croatia","country_sdmx"=>"HR"),
			array("country_code"=>"CUB","country_name"=>"Cuba","country_alias"=>"Cuba","country_sdmx"=>"CU"),
			array("country_code"=>"CYP","country_name"=>"Cyprus","country_alias"=>"Cyprus","country_sdmx"=>"CY"),
			array("country_code"=>"CZR","country_name"=>"Czech Republic","country_alias"=>"Czech Republic","country_sdmx"=>"CZ"),
			array("country_code"=>"CZN","country_name"=>"Czechchoslovakia n.s.","country_alias"=>"","country_sdmx"=>"CZ"),
			array("country_code"=>"CZE","country_name"=>"Czechoslovakia","country_alias"=>"Czechoslovakia","country_sdmx"=>"CZ"),
			array("country_code"=>"DEN","country_name"=>"Denmark","country_alias"=>"Denmark","country_sdmx"=>"DK"),
			array("country_code"=>"DJI","country_name"=>"Djibouti","country_alias"=>"Djibouti","country_sdmx"=>"DJ"),
			array("country_code"=>"DOM","country_name"=>"Dominica","country_alias"=>"Dominica","country_sdmx"=>"DM"),
			array("country_code"=>"DOR","country_name"=>"Dominican Republic","country_alias"=>"Dominican Republic","country_sdmx"=>"DO"),
			array("country_code"=>"ECU","country_name"=>"Ecuador","country_alias"=>"Ecuador","country_sdmx"=>"EC"),
			array("country_code"=>"EGY","country_name"=>"Egypt","country_alias"=>"Egypt","country_sdmx"=>"EG"),
			array("country_code"=>"ELS","country_name"=>"El Salvador","country_alias"=>"El Salvador","country_sdmx"=>"SV"),
			array("country_code"=>"EQG","country_name"=>"Equatorial Guinea","country_alias"=>"Equatorial Guinea","country_sdmx"=>"GQ"),
			array("country_code"=>"ERI","country_name"=>"Eritrea","country_alias"=>"Eritrea","country_sdmx"=>"ER"),
			array("country_code"=>"EST","country_name"=>"Estonia","country_alias"=>"Estonia","country_sdmx"=>"EE"),
			array("country_code"=>"ETH","country_name"=>"Ethiopia","country_alias"=>"Ethiopia","country_sdmx"=>"ET"),
			array("country_code"=>"EUA","country_name"=>"Euro Area","country_alias"=>"Euro Zone","country_sdmx"=>"EUA"),
			array("country_code"=>"ENS","country_name"=>"Europe n.s.","country_alias"=>"","country_sdmx"=>"150"),
			array("country_code"=>"FAE","country_name"=>"Faeroe Islands","country_alias"=>"Faeroe Islands","country_sdmx"=>"FO"),
			array("country_code"=>"FAL","country_name"=>"Falklands Islands","country_alias"=>"Falklands Islands","country_sdmx"=>"FK"),
			array("country_code"=>"FIJ","country_name"=>"Fiji","country_alias"=>"Fiji","country_sdmx"=>"FJ"),
			array("country_code"=>"FIN","country_name"=>"Finland","country_alias"=>"Finland","country_sdmx"=>"FI"),
			array("country_code"=>"FRA","country_name"=>"France","country_alias"=>"France","country_sdmx"=>"FR"),
			array("country_code"=>"FPO","country_name"=>"French Polynesia","country_alias"=>"French Polynesia","country_sdmx"=>"PF"),
			array("country_code"=>"GAB","country_name"=>"Gabon","country_alias"=>"Gabon","country_sdmx"=>"GA"),
			array("country_code"=>"GAM","country_name"=>"Gambia, The","country_alias"=>"Gambia","country_sdmx"=>"GM"),
			array("country_code"=>"GEO","country_name"=>"Georgia","country_alias"=>"Georgia","country_sdmx"=>"GE"),
			array("country_code"=>"GER","country_name"=>"Germany","country_alias"=>"Germany","country_sdmx"=>"DE"),
			array("country_code"=>"GDR","country_name"=>"Germany, Eastern","country_alias"=>"Eastern Germany","country_sdmx"=>"DE"),
			array("country_code"=>"GHA","country_name"=>"Ghana","country_alias"=>"Ghana","country_sdmx"=>"GH"),
			array("country_code"=>"GIB","country_name"=>"Gibraltar","country_alias"=>"Gibraltar","country_sdmx"=>"GI"),
			array("country_code"=>"GRC","country_name"=>"Greece","country_alias"=>"Greece","country_sdmx"=>"GR"),
			array("country_code"=>"GRN","country_name"=>"Greenland","country_alias"=>"Greenland","country_sdmx"=>"GL"),
			array("country_code"=>"GRD","country_name"=>"Grenada","country_alias"=>"Grenada","country_sdmx"=>"GD"),
			array("country_code"=>"GDL","country_name"=>"Guadeloupe","country_alias"=>"Guadeloupe","country_sdmx"=>"GP"),
			array("country_code"=>"GUA","country_name"=>"Guam","country_alias"=>"Guam","country_sdmx"=>"GU"),
			array("country_code"=>"GTM","country_name"=>"Guatemala","country_alias"=>"Guatemala","country_sdmx"=>"GT"),
			array("country_code"=>"GUF","country_name"=>"Guiana, French","country_alias"=>"Guiana, French","country_sdmx"=>"GF"),
			array("country_code"=>"GUI","country_name"=>"Guinea","country_alias"=>"Guinea","country_sdmx"=>"GN"),
			array("country_code"=>"GUB","country_name"=>"Guinea-Bissau","country_alias"=>"Guinea-Bissau","country_sdmx"=>"GW"),
			array("country_code"=>"GUY","country_name"=>"Guyana","country_alias"=>"Guyana","country_sdmx"=>"GY"),
			array("country_code"=>"HAI","country_name"=>"Haiti","country_alias"=>"Haiti","country_sdmx"=>"HT"),
			array("country_code"=>"HND","country_name"=>"Honduras","country_alias"=>"Honduras","country_sdmx"=>"HN"),
			array("country_code"=>"HKG","country_name"=>"Hong Kong, China","country_alias"=>"Hong Kong, China","country_sdmx"=>"HK"),
			array("country_code"=>"HUN","country_name"=>"Hungary","country_alias"=>"Hungary","country_sdmx"=>"HU"),
			array("country_code"=>"ICE","country_name"=>"Iceland","country_alias"=>"Iceland","country_sdmx"=>"IS"),
			array("country_code"=>"IND","country_name"=>"India","country_alias"=>"India","country_sdmx"=>"IN"),
			array("country_code"=>"INO","country_name"=>"Indonesia","country_alias"=>"Indonesia","country_sdmx"=>"ID"),
			array("country_code"=>"IRN","country_name"=>"Iran","country_alias"=>"Iran","country_sdmx"=>"IR"),
			array("country_code"=>"IRQ","country_name"=>"Iraq","country_alias"=>"Iraq","country_sdmx"=>"IQ"),
			array("country_code"=>"IRE","country_name"=>"Ireland","country_alias"=>"Ireland","country_sdmx"=>"IE"),
			array("country_code"=>"IMY","country_name"=>"Isle of Man","country_alias"=>"Isle of Man","country_sdmx"=>"IM"),
			array("country_code"=>"ISR","country_name"=>"Israel","country_alias"=>"Israel","country_sdmx"=>"IL"),
			array("country_code"=>"ITA","country_name"=>"Italy","country_alias"=>"Italy","country_sdmx"=>"IT"),
			array("country_code"=>"JAM","country_name"=>"Jamaica","country_alias"=>"Jamaica","country_sdmx"=>"JM"),
			array("country_code"=>"JPN","country_name"=>"Japan","country_alias"=>"Japan","country_sdmx"=>"JP"),
			array("country_code"=>"JOR","country_name"=>"Jordan","country_alias"=>"Jordan","country_sdmx"=>"JO"),
			array("country_code"=>"KAZ","country_name"=>"Kazakhstan","country_alias"=>"Kazakhstan","country_sdmx"=>"KZ"),
			array("country_code"=>"KEN","country_name"=>"Kenya","country_alias"=>"Kenya","country_sdmx"=>"KE"),
			array("country_code"=>"KIR","country_name"=>"Kiribati","country_alias"=>"Kiribati","country_sdmx"=>"KI"),
			array("country_code"=>"KOD","country_name"=>"Korea, Democratic Republic","country_alias"=>"North Korea","country_sdmx"=>"KP"),
			array("country_code"=>"KOR","country_name"=>"Korea, Rep. of","country_alias"=>"Korea, Rep. of","country_sdmx"=>"KR"),
			array("country_code"=>"KOS","country_name"=>"Kosovo","country_alias"=>"","country_sdmx"=>"RS"),
			array("country_code"=>"KUW","country_name"=>"Kuwait","country_alias"=>"Kuwait","country_sdmx"=>"KW"),
			array("country_code"=>"KGZ","country_name"=>"Kyrgyz Republic","country_alias"=>"Kyrgyz Republic","country_sdmx"=>"KG"),
			array("country_code"=>"LAO","country_name"=>"Lao PDR","country_alias"=>"Lao PDR","country_sdmx"=>"LA"),
			array("country_code"=>"LAT","country_name"=>"Latvia","country_alias"=>"Latvia","country_sdmx"=>"LV"),
			array("country_code"=>"LEB","country_name"=>"Lebanon","country_alias"=>"Lebanon","country_sdmx"=>"LB"),
			array("country_code"=>"LES","country_name"=>"Lesotho","country_alias"=>"Lesotho","country_sdmx"=>"LS"),
			array("country_code"=>"LIB","country_name"=>"Liberia","country_alias"=>"Liberia","country_sdmx"=>"LR"),
			array("country_code"=>"LBY","country_name"=>"Libya","country_alias"=>"Libya","country_sdmx"=>"LY"),
			array("country_code"=>"LIE","country_name"=>"Liechtenstein","country_alias"=>"Liechtenstein","country_sdmx"=>"LI"),
			array("country_code"=>"LTU","country_name"=>"Lithuania","country_alias"=>"Lithuania","country_sdmx"=>"LT"),
			array("country_code"=>"LUX","country_name"=>"Luxembourg","country_alias"=>"Luxembourg","country_sdmx"=>"LU"),
			array("country_code"=>"MAC","country_name"=>"Macao, China","country_alias"=>"Macao, China","country_sdmx"=>"MO"),
			array("country_code"=>"MKD","country_name"=>"Macedonia FYR","country_alias"=>"Macedonia FYR","country_sdmx"=>"MK"),
			array("country_code"=>"MDG","country_name"=>"Madagascar","country_alias"=>"Madagascar","country_sdmx"=>"MG"),
			array("country_code"=>"MWI","country_name"=>"Malawi","country_alias"=>"Malawi","country_sdmx"=>"MW"),
			array("country_code"=>"MAL","country_name"=>"Malaysia","country_alias"=>"Malaysia","country_sdmx"=>"MY"),
			array("country_code"=>"MLD","country_name"=>"Maldives","country_alias"=>"Maldives","country_sdmx"=>"MV"),
			array("country_code"=>"MLI","country_name"=>"Mali","country_alias"=>"Mali","country_sdmx"=>"ML"),
			array("country_code"=>"MLT","country_name"=>"Malta","country_alias"=>"Malta","country_sdmx"=>"MT"),
			array("country_code"=>"RMI","country_name"=>"Marshall Islands, Republic of the","country_alias"=>"Marshall Islands, Republic of the","country_sdmx"=>"MH"),
			array("country_code"=>"MTQ","country_name"=>"Martinique","country_alias"=>"Martinique","country_sdmx"=>"MQ"),
			array("country_code"=>"MRT","country_name"=>"Mauritania","country_alias"=>"Mauritania","country_sdmx"=>"MR"),
			array("country_code"=>"MUS","country_name"=>"Mauritius","country_alias"=>"Mauritius","country_sdmx"=>"MU"),
			array("country_code"=>"MYT","country_name"=>"Mayotte","country_alias"=>"Mayotte","country_sdmx"=>"YT"),
			array("country_code"=>"MEX","country_name"=>"Mexico","country_alias"=>"Mexico","country_sdmx"=>"MX"),
			array("country_code"=>"FSM","country_name"=>"Micronesia, Fed. States of","country_alias"=>"Micronesia, Fed. States of","country_sdmx"=>"FM"),
			array("country_code"=>"MEN","country_name"=>"Middle east n.s.","country_alias"=>"","country_sdmx"=>"145"),
			array("country_code"=>"MOL","country_name"=>"Moldova","country_alias"=>"Moldova","country_sdmx"=>"MD"),
			array("country_code"=>"MCO","country_name"=>"Monaco","country_alias"=>"Monaco","country_sdmx"=>"MC"),
			array("country_code"=>"MON","country_name"=>"Mongolia","country_alias"=>"Mongolia","country_sdmx"=>"MN"),
			array("country_code"=>"MNT","country_name"=>"Montenegro","country_alias"=>"","country_sdmx"=>"ME"),
			array("country_code"=>"MOR","country_name"=>"Morocco","country_alias"=>"Morocco","country_sdmx"=>"MA"),
			array("country_code"=>"MOZ","country_name"=>"Mozambique","country_alias"=>"Mozambique","country_sdmx"=>"MZ"),
			array("country_code"=>"MYA","country_name"=>"Myanmar","country_alias"=>"Myanmar","country_sdmx"=>"MM"),
			array("country_code"=>"NAM","country_name"=>"Namibia","country_alias"=>"Namibia","country_sdmx"=>"NA"),
			array("country_code"=>"NAU","country_name"=>"Nauru","country_alias"=>"Nauru, Republic of","country_sdmx"=>"NR"),
			array("country_code"=>"NEP","country_name"=>"Nepal","country_alias"=>"Nepal","country_sdmx"=>"NP"),
			array("country_code"=>"NET","country_name"=>"Netherlands","country_alias"=>"Netherlands","country_sdmx"=>"NL"),
			array("country_code"=>"NEA","country_name"=>"Netherlands Antilles","country_alias"=>"Netherlands Antilles","country_sdmx"=>"NL"),
			array("country_code"=>"NCA","country_name"=>"New Caledonia","country_alias"=>"New Caledonia","country_sdmx"=>"NC"),
			array("country_code"=>"NZL","country_name"=>"New Zealand","country_alias"=>"New Zealand","country_sdmx"=>"NZ"),
			array("country_code"=>"NIC","country_name"=>"Nicaragua","country_alias"=>"Nicaragua","country_sdmx"=>"NI"),
			array("country_code"=>"NGR","country_name"=>"Niger","country_alias"=>"Niger","country_sdmx"=>"NE"),
			array("country_code"=>"NGA","country_name"=>"Nigeria","country_alias"=>"Nigeria","country_sdmx"=>"NG"),
			array("country_code"=>"NIU","country_name"=>"Niue","country_alias"=>"Niue","country_sdmx"=>"NU"),
			array("country_code"=>"MNP","country_name"=>"Northern Mariana Islands","country_alias"=>"Northern Mariana Is.","country_sdmx"=>"MP"),
			array("country_code"=>"NOR","country_name"=>"Norway","country_alias"=>"Norway","country_sdmx"=>"NO"),
			array("country_code"=>"OPT","country_name"=>"Occupied Palestinian Territory","country_alias"=>"","country_sdmx"=>"PS"),
			array("country_code"=>"ONS","country_name"=>"Oceania n.s.","country_alias"=>"","country_sdmx"=>"9"),
			array("country_code"=>"OMA","country_name"=>"Oman","country_alias"=>"Oman","country_sdmx"=>"OM"),
			array("country_code"=>"PAK","country_name"=>"Pakistan","country_alias"=>"Pakistan","country_sdmx"=>"PK"),
			array("country_code"=>"PLW","country_name"=>"Palau","country_alias"=>"Palau","country_sdmx"=>"PW"),
			array("country_code"=>"PAN","country_name"=>"Panama","country_alias"=>"Panama","country_sdmx"=>"PA"),
			array("country_code"=>"PNG","country_name"=>"Papua New Guinea","country_alias"=>"Papua New Guinea","country_sdmx"=>"PG"),
			array("country_code"=>"PRY","country_name"=>"Paraguay","country_alias"=>"Paraguay","country_sdmx"=>"PY"),
			array("country_code"=>"PER","country_name"=>"Peru","country_alias"=>"Peru","country_sdmx"=>"PE"),
			array("country_code"=>"PHI","country_name"=>"Philippines","country_alias"=>"Philippines","country_sdmx"=>"PH"),
			array("country_code"=>"POL","country_name"=>"Poland","country_alias"=>"Poland","country_sdmx"=>"PL"),
			array("country_code"=>"PRT","country_name"=>"Portugal","country_alias"=>"Portugal","country_sdmx"=>"PT"),
			array("country_code"=>"PUE","country_name"=>"Puerto Rico","country_alias"=>"Puerto Rico","country_sdmx"=>"PR"),
			array("country_code"=>"QAT","country_name"=>"Qatar","country_alias"=>"Qatar","country_sdmx"=>"QA"),
			array("country_code"=>"REU","country_name"=>"Reunion","country_alias"=>"Reunion","country_sdmx"=>"RE"),
			array("country_code"=>"ROM","country_name"=>"Romania","country_alias"=>"Romania","country_sdmx"=>"RO"),
			array("country_code"=>"RUS","country_name"=>"Russian Federation","country_alias"=>"Russia","country_sdmx"=>"RU"),
			array("country_code"=>"RWA","country_name"=>"Rwanda","country_alias"=>"Rwanda","country_sdmx"=>"RW"),
			array("country_code"=>"STH","country_name"=>"Saint Helena","country_alias"=>"St. Helena","country_sdmx"=>"SH"),
			array("country_code"=>"STK","country_name"=>"Saint Kitts-Nevis","country_alias"=>"St. Kitts-Nevis","country_sdmx"=>"KN"),
			array("country_code"=>"STL","country_name"=>"Saint Lucia","country_alias"=>"St. Lucia","country_sdmx"=>"LC"),
			array("country_code"=>"SPM","country_name"=>"Saint Pierre-Miquelon","country_alias"=>"St. Pierre-Miquelon","country_sdmx"=>"PM"),
			array("country_code"=>"STV","country_name"=>"Saint Vincent and the Grenadines","country_alias"=>"St. Vincent & Grens.","country_sdmx"=>"VC"),
			array("country_code"=>"SAM","country_name"=>"Samoa","country_alias"=>"Samoa","country_sdmx"=>"WS"),
			array("country_code"=>"SMR","country_name"=>"San Marino","country_alias"=>"San Marino","country_sdmx"=>"SM"),
			array("country_code"=>"STP","country_name"=>"Sao Tome and Principe","country_alias"=>"Sao Tome e Principe","country_sdmx"=>"ST"),
			array("country_code"=>"SAU","country_name"=>"Saudi Arabia","country_alias"=>"Saudi Arabia","country_sdmx"=>"SA"),
			array("country_code"=>"SEN","country_name"=>"Senegal","country_alias"=>"Senegal","country_sdmx"=>"SN"),
			array("country_code"=>"SNM","country_name"=>"Serbia and Montenegro","country_alias"=>"","country_sdmx"=>"RS"),
			array("country_code"=>"SNE","country_name"=>"Serbia and Montenegro n.s.","country_alias"=>"","country_sdmx"=>"RS"),
			array("country_code"=>"SER","country_name"=>"Serbia, Republic of","country_alias"=>"","country_sdmx"=>"RS"),
			array("country_code"=>"SEY","country_name"=>"Seychelles","country_alias"=>"Seychelles","country_sdmx"=>"SC"),
			array("country_code"=>"SIE","country_name"=>"Sierra Leone","country_alias"=>"Sierra Leone","country_sdmx"=>"SL"),
			array("country_code"=>"SIN","country_name"=>"Singapore","country_alias"=>"Singapore","country_sdmx"=>"SG"),
			array("country_code"=>"SLR","country_name"=>"Slovak Republic","country_alias"=>"Slovak Republic","country_sdmx"=>"SK"),
			array("country_code"=>"SLO","country_name"=>"Slovenia","country_alias"=>"Slovenia","country_sdmx"=>"SI"),
			array("country_code"=>"SOL","country_name"=>"Solomon Islands","country_alias"=>"Solomon Islands","country_sdmx"=>"SB"),
			array("country_code"=>"SOM","country_name"=>"Somalia","country_alias"=>"Somalia","country_sdmx"=>"SO"),
			array("country_code"=>"SOA","country_name"=>"South Africa","country_alias"=>"South Africa","country_sdmx"=>"ZA"),
			array("country_code"=>"SPA","country_name"=>"Spain","country_alias"=>"Spain","country_sdmx"=>"ES"),
			array("country_code"=>"SSH","country_name"=>"Spanish Sahara","country_alias"=>"Spanish Sahara","country_sdmx"=>"EH"),
			array("country_code"=>"SRI","country_name"=>"Sri Lanka","country_alias"=>"Sri Lanka","country_sdmx"=>"LK"),
			array("country_code"=>"SUD","country_name"=>"Sudan","country_alias"=>"Sudan","country_sdmx"=>"SD"),
			array("country_code"=>"SUR","country_name"=>"Suriname","country_alias"=>"Suriname","country_sdmx"=>"SR"),
			array("country_code"=>"SWA","country_name"=>"Swaziland","country_alias"=>"Swaziland","country_sdmx"=>"SZ"),
			array("country_code"=>"SWE","country_name"=>"Sweden","country_alias"=>"Sweden","country_sdmx"=>"SE"),
			array("country_code"=>"SWI","country_name"=>"Switzerland","country_alias"=>"Switzerland","country_sdmx"=>"CH"),
			array("country_code"=>"SAR","country_name"=>"Syrian Arab Republic","country_alias"=>"Syrian Arab Republic","country_sdmx"=>"SY"),
			array("country_code"=>"TAP","country_name"=>"Taipei,China","country_alias"=>"Taipei,China","country_sdmx"=>"TW"),
			array("country_code"=>"TAJ","country_name"=>"Tajikistan","country_alias"=>"Tajikistan","country_sdmx"=>"TJ"),
			array("country_code"=>"TNZ","country_name"=>"Tanzania, United Republic of","country_alias"=>"Tanzania, United Rep","country_sdmx"=>"TZ"),
			array("country_code"=>"THA","country_name"=>"Thailand","country_alias"=>"Thailand","country_sdmx"=>"TH"),
			array("country_code"=>"YUS","country_name"=>"The former Yugoslavia Republic","country_alias"=>"Yugoslavia SFR","country_sdmx"=>"YU"),
			array("country_code"=>"TIM","country_name"=>"Timor-Leste","country_alias"=>"Timor-Leste","country_sdmx"=>"TL"),
			array("country_code"=>"TOG","country_name"=>"Togo","country_alias"=>"Togo","country_sdmx"=>"TG"),
			array("country_code"=>"TON","country_name"=>"Tonga","country_alias"=>"Tonga","country_sdmx"=>"TO"),
			array("country_code"=>"TTO","country_name"=>"Trinidad and Tobago","country_alias"=>"Trinidad and Tobago","country_sdmx"=>"TT"),
			array("country_code"=>"TUN","country_name"=>"Tunisia","country_alias"=>"Tunisia","country_sdmx"=>"TN"),
			array("country_code"=>"TUR","country_name"=>"Turkey","country_alias"=>"Turkey","country_sdmx"=>"TR"),
			array("country_code"=>"TKM","country_name"=>"Turkmenistan","country_alias"=>"Turkmenistan","country_sdmx"=>"TM"),
			array("country_code"=>"TUV","country_name"=>"Tuvalu","country_alias"=>"Tuvalu","country_sdmx"=>"TV"),
			array("country_code"=>"USV","country_name"=>"U.S. Virgin Islands","country_alias"=>"Virgin Islands U.S.","country_sdmx"=>"VI"),
			array("country_code"=>"UGA","country_name"=>"Uganda","country_alias"=>"Uganda","country_sdmx"=>"UG"),
			array("country_code"=>"UKR","country_name"=>"Ukraine","country_alias"=>"Ukraine","country_sdmx"=>"UA"),
			array("country_code"=>"USR","country_name"=>"Union of Soviet Socialist Republics","country_alias"=>"U.S.S.R.","country_sdmx"=>"USR"),
			array("country_code"=>"UAE","country_name"=>"United Arab Emirates","country_alias"=>"United Arab Emirates","country_sdmx"=>"AE"),
			array("country_code"=>"UKG","country_name"=>"United Kingdom","country_alias"=>"United Kingdom","country_sdmx"=>"GB"),
			array("country_code"=>"USA","country_name"=>"United States","country_alias"=>"United States","country_sdmx"=>"US"),
			array("country_code"=>"URU","country_name"=>"Uruguay","country_alias"=>"Uruguay","country_sdmx"=>"UY"),
			array("country_code"=>"USN","country_name"=>"USSR n.s.","country_alias"=>"","country_sdmx"=>"USN"),
			array("country_code"=>"UZB","country_name"=>"Uzbekistan","country_alias"=>"Uzbekistan","country_sdmx"=>"UZ"),
			array("country_code"=>"VAN","country_name"=>"Vanuatu","country_alias"=>"Vanuatu","country_sdmx"=>"VU"),
			array("country_code"=>"VEN","country_name"=>"Venezuela, Bolivarian Republic of","country_alias"=>"Venezuela, Bol. Rep.","country_sdmx"=>"VE"),
			array("country_code"=>"VIE","country_name"=>"Viet Nam","country_alias"=>"Viet Nam","country_sdmx"=>"VN"),
			array("country_code"=>"WAS","country_name"=>"Wake Islands","country_alias"=>"Wake Islands","country_sdmx"=>"UM"),
			array("country_code"=>"WFI","country_name"=>"Wallis and Futuna","country_alias"=>"Wallis-Futuna","country_sdmx"=>"WF"),
			array("country_code"=>"WBG","country_name"=>"West Bank and Gaza","country_alias"=>"West Bank and Gaza","country_sdmx"=>"WBG"),
			array("country_code"=>"YAR","country_name"=>"Yemen, Arab Republic of","country_alias"=>"Yemen, Arab Rep. Of","country_sdmx"=>"YE"),
			array("country_code"=>"YPR","country_name"=>"Yemen, People's Democratic Republic of","country_alias"=>"Yemen, PDR","country_sdmx"=>"YE"),
			array("country_code"=>"YEM","country_name"=>"Yemen, Republic of","country_alias"=>"Yemen, Republic of","country_sdmx"=>"YE"),
			array("country_code"=>"YUN","country_name"=>"Yugoslavia n.s.","country_alias"=>"","country_sdmx"=>"YUN"),
			array("country_code"=>"YUG","country_name"=>"Yugoslavia, Federal Republic of","country_alias"=>"Yugoslavia Fed. Rep.","country_sdmx"=>"YUG"),
			array("country_code"=>"ZAM","country_name"=>"Zambia","country_alias"=>"Zambia","country_sdmx"=>"ZM"),
			array("country_code"=>"ZIM","country_name"=>"Zimbabwe","country_alias"=>"Zimbabwe","country_sdmx"=>"ZW"),
			array("country_code"=>"WLD","country_name"=>"ZZ0-World","country_alias"=>"World","country_sdmx"=>"WLD"),
			array("country_code"=>"ACW","country_name"=>"ZZA-Central and West Asia","country_alias"=>"A-Central and West Asia","country_sdmx"=>"ACW"),
			array("country_code"=>"AEA","country_name"=>"ZZA-East Asia","country_alias"=>"A-East Asia","country_sdmx"=>"AEA"),
			array("country_code"=>"ASO","country_name"=>"ZZA-South Asia","country_alias"=>"A-South Asia","country_sdmx"=>"ASO"),
			array("country_code"=>"AST","country_name"=>"ZZA-Southeast Asia","country_alias"=>"A-Southeast Asia","country_sdmx"=>"AST"),
			array("country_code"=>"ATP","country_name"=>"ZZA-The Pacific","country_alias"=>"A-The Pacific","country_sdmx"=>"ATP"),
			array("country_code"=>"ASA","country_name"=>"ZZF-AC Southeast Asia","country_alias"=>"Southeast Asia","country_sdmx"=>"ASA"),
			array("country_code"=>"ASE","country_name"=>"ZZF-Asia","country_alias"=>"Asia","country_sdmx"=>"ASE"),
			array("country_code"=>"ASJ","country_name"=>"ZZF-Asia excluding Japan","country_alias"=>"Asia excluding Japan","country_sdmx"=>"ASJ"),
			array("country_code"=>"APA","country_name"=>"ZZF-Asia Pacific","country_alias"=>"Asia Pacific","country_sdmx"=>"APA"),
			array("country_code"=>"APJ","country_name"=>"ZZF-Asia Pacific excluding Japan","country_alias"=>"Asia Pacific excluding Japan","country_sdmx"=>"APJ"),
			array("country_code"=>"FET","country_name"=>"ZZF-Far East","country_alias"=>"Far East","country_sdmx"=>"FET"),
			array("country_code"=>"FEJ","country_name"=>"ZZF-Far East excluding Japan","country_alias"=>"Far East excluding Japan","country_sdmx"=>"FEJ"),
			array("country_code"=>"PAC","country_name"=>"ZZF-Pacific","country_alias"=>"Pacific","country_sdmx"=>"PAC"),
			array("country_code"=>"AFR","country_name"=>"ZZI-IMFDeveloping Africa","country_alias"=>"Dev Africa","country_sdmx"=>"AFR"),
			array("country_code"=>"ASI","country_name"=>"ZZI-IMFDeveloping Asia","country_alias"=>"Dev Asia","country_sdmx"=>"ASI"),
			array("country_code"=>"DCT","country_name"=>"ZZI-IMFDeveloping Countries","country_alias"=>"Dev Countries","country_sdmx"=>"DCT"),
			array("country_code"=>"DEU","country_name"=>"ZZI-IMFDeveloping Europe","country_alias"=>"Dev Europe","country_sdmx"=>"DEU"),
			array("country_code"=>"DME","country_name"=>"ZZI-IMFDeveloping Middle East","country_alias"=>"Dev Middle East","country_sdmx"=>"DME"),
			array("country_code"=>"DWH","country_name"=>"ZZI-IMFDeveloping Western Hemisphere","country_alias"=>"Dev West Hemisphere","country_sdmx"=>"DWH"),
			array("country_code"=>"IDC","country_name"=>"ZZI-IMFIndustrial Countries","country_alias"=>"Industrial Countries","country_sdmx"=>"IDC"),
			array("country_code"=>"KCW","country_name"=>"ZZK-Central and West Asia","country_alias"=>"K-Central and West Asia","country_sdmx"=>"KCW"),
			array("country_code"=>"KDD","country_name"=>"ZZK-Developed Member Economy","country_alias"=>"K-Developed Member Economy","country_sdmx"=>"KDD"),
			array("country_code"=>"KDE","country_name"=>"ZZK-Developing Member Economy","country_alias"=>"K-Developing Member Economy","country_sdmx"=>"KDE"),
			array("country_code"=>"KEA","country_name"=>"ZZK-East Asia","country_alias"=>"K-East Asia","country_sdmx"=>"KEA"),
			array("country_code"=>"KRM","country_name"=>"ZZK-Regional Members","country_alias"=>"K-Regional Members","country_sdmx"=>"KRM"),
			array("country_code"=>"KSA","country_name"=>"ZZK-South Asia","country_alias"=>"K-South Asia","country_sdmx"=>"KSA"),
			array("country_code"=>"KSE","country_name"=>"ZZK-Southeast Asia","country_alias"=>"K-Southeast Asia","country_sdmx"=>"KSE"),
			array("country_code"=>"KTP","country_name"=>"ZZK-The Pacific","country_alias"=>"K-The Pacific","country_sdmx"=>"KTP"),
			array("country_code"=>"EAP","country_name"=>"ZZW-WBEast Asia and Pacific (Asia)","country_alias"=>"East Asia & Pacific","country_sdmx"=>"EAP"),
			array("country_code"=>"ECA","country_name"=>"ZZW-WBEurope and Central Asia","country_alias"=>"Europe & Cent Asia","country_sdmx"=>"ECA"),
			array("country_code"=>"LAC","country_name"=>"ZZW-WBLatin America and Caribbean (Americas)","country_alias"=>"Lat Amer & Caribbean","country_sdmx"=>"LAC"),
			array("country_code"=>"MNA","country_name"=>"ZZW-WBMiddle East and North Africa","country_alias"=>"MEast & North Africa","country_sdmx"=>"MNA"),
			array("country_code"=>"NOA","country_name"=>"ZZW-WBNorth America (Americas)","country_alias"=>"North America","country_sdmx"=>"NOA"),
			array("country_code"=>"SAS","country_name"=>"ZZW-WBSouth Asia (Asia)","country_alias"=>"South Asia","country_sdmx"=>"SAS"),
			array("country_code"=>"SSA","country_name"=>"ZZW-WBSub-Saharan Africa","country_alias"=>"Sub-Saharan Africa","country_sdmx"=>"SSA")
		));
    }
}
