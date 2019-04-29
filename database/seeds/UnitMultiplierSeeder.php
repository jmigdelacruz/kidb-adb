<?php

use Illuminate\Database\Seeder;

class UnitMultiplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        	DB::table('unit_multiplier')->truncate();
		DB::table('unit_multiplier')->insert(array(
			array("um_code"=>"0",	"um_name"=>"Units",		"um_desc"=>"In scientific notation, expressed as ten raised to the power of zero (10^0)"),
			array("um_code"=>"1",	"um_name"=>"Tens",		"um_desc"=>"In scientific notation, expressed as ten raised to the power of one (10^1)"),
			array("um_code"=>"2",	"um_name"=>"Hundreds",		"um_desc"=>"In scientific notation, expressed as ten raised to the power of two (10^2)"),
			array("um_code"=>"3",	"um_name"=>"Thousands",		"um_desc"=>"In scientific notation, expressed as ten raised to the power of three (10^3)"),
			array("um_code"=>"4",	"um_name"=>"Tens of Thousands",		"um_desc"=>"In scientific notation, expressed as ten raised to the power of four (10^4)"),
			array("um_code"=>"5",	"um_name"=>"Hundreds of Thousands",		"um_desc"=>"In scientific notation, expressed as ten raised to the power of five (10^5)"),
			array("um_code"=>"6",	"um_name"=>"Millions",		"um_desc"=>"In scientific notation, expressed as ten raised to the power of six (10^6)"),
			array("um_code"=>"7",	"um_name"=>"Tens of Millions",		"um_desc"=>"In scientific notation, expressed as ten raised to the power of seven (10^7)"),
			array("um_code"=>"8",	"um_name"=>"Hundreds of Millions",		"um_desc"=>"In scientific notation, expressed as ten raised to the power of eight (10^9)"),
			array("um_code"=>"9",	"um_name"=>"Billions",		"um_desc"=>"In scientific notation, expressed as ten raised to the power of nine (10^9)"),
			array("um_code"=>"10",	"um_name"=>"Tens of Billions",		"um_desc"=>"In scientific notation, expressed as ten raised to the power of ten (10^10)"),
			array("um_code"=>"11",	"um_name"=>"Hundreds of Billions",		"um_desc"=>"In scientific notation, expressed as ten raised to the power of eleven (10^11)"),
			array("um_code"=>"12",	"um_name"=>"Trillions",		"um_desc"=>"In scientific notation, expressed as ten raised to the power of twelve (10^12)"),
			array("um_code"=>"13",	"um_name"=>"Tens of Trillions",		"um_desc"=>"In scientific notation, expressed as ten raised to the power of thirteen (10^13)"),
			array("um_code"=>"14",	"um_name"=>"Hundreds of Trillions",		"um_desc"=>"In scientific notation, expressed as ten raised to the power of fourteen (10^14)"),
			array("um_code"=>"15",	"um_name"=>"Quadrillions",		"um_desc"=>"In scientific notation, expressed as ten raised to the power of fifteen (10^15)"),
			array("um_code"=>"-1",	"um_name"=>"Tens",		"um_desc"=>"In scientific notation, expressed as ten raised to the power of minus one (10^1)"),
			array("um_code"=>"-2",	"um_name"=>"Hundreds",		"um_desc"=>"In scientific notation, expressed as ten raised to the power of minus two (10^2)"),
			array("um_code"=>"-3",	"um_name"=>"Thousands",		"um_desc"=>"In scientific notation, expressed as ten raised to the power of minus three (10^3)"),
			array("um_code"=>"-4",	"um_name"=>"Tens of Thousands",		"um_desc"=>"In scientific notation, expressed as ten raised to the power of minus four (10^4)"),
			array("um_code"=>"-5",	"um_name"=>"Hundreds of Thousands",		"um_desc"=>"In scientific notation, expressed as ten raised to the power of minus five (10^5)"),
			array("um_code"=>"-6",	"um_name"=>"Millions",		"um_desc"=>"In scientific notation, expressed as ten raised to the power of minus six (10^6)"),
			array("um_code"=>"-7",	"um_name"=>"Tens of Millions",		"um_desc"=>"In scientific notation, expressed as ten raised to the power of minus seven (10^7)"),
			array("um_code"=>"-8",	"um_name"=>"Hundreds of Millions",		"um_desc"=>"In scientific notation, expressed as ten raised to the power of minus eight (10^9)"),
			array("um_code"=>"-9",	"um_name"=>"Billions",		"um_desc"=>"In scientific notation, expressed as ten raised to the power of minus nine (10^9)"),
			array("um_code"=>"-10",	"um_name"=>"Tens of Billions",		"um_desc"=>"In scientific notation, expressed as ten raised to the power of minus ten (10^10)"),
			array("um_code"=>"-11",	"um_name"=>"Hundreds of Billions",		"um_desc"=>"In scientific notation, expressed as ten raised to the power of minus eleven (10^11)"),
			array("um_code"=>"-12",	"um_name"=>"Trillions",		"um_desc"=>"In scientific notation, expressed as ten raised to the power of minus twelve (10^12)"),
			array("um_code"=>"-13",	"um_name"=>"Tens of Trillions",		"um_desc"=>"In scientific notation, expressed as ten raised to the power of minus thirteen (10^13)"),
			array("um_code"=>"-14",	"um_name"=>"Hundreds of Trillions",		"um_desc"=>"In scientific notation, expressed as ten raised to the power of minus fourteen (10^14)"),
			array("um_code"=>"-15",	"um_name"=>"Quadrillions",		"um_desc"=>"In scientific notation, expressed as ten raised to the power of minus fifteen (10^15)"),
		));
    }
}
