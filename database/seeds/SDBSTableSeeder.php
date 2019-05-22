<?php

use Illuminate\Database\Seeder;

class SDBSTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        	DB::table('sdbs_data')->truncate();
		DB::table('sdbs_data')->insert(array(
			array("metadata_id"=>"1","data_year"=>"2017","data_value"=>"29708008"),
			array("metadata_id"=>"1","data_year"=>"2016","data_value"=>"29207007"),
			array("metadata_id"=>"1","data_year"=>"2015","data_value"=>"28606006"),
			array("metadata_id"=>"1","data_year"=>"2014","data_value"=>"28101005"),
			array("metadata_id"=>"1","data_year"=>"2013","data_value"=>"27502004"),
			array("metadata_id"=>"1","data_year"=>"2012","data_value"=>"26503003"),
			array("metadata_id"=>"1","data_year"=>"2011","data_value"=>"25004002"),
			array("metadata_id"=>"1","data_year"=>"2010","data_value"=>"24505001"),

			array("metadata_id"=>"2","data_year"=>"2017","data_value"=>"19707980"),
			array("metadata_id"=>"2","data_year"=>"2016","data_value"=>"19200099"),
			array("metadata_id"=>"2","data_year"=>"2015","data_value"=>"18600221"),
			array("metadata_id"=>"2","data_year"=>"2014","data_value"=>"18156500"),
			array("metadata_id"=>"2","data_year"=>"2013","data_value"=>"17500760"),
			array("metadata_id"=>"2","data_year"=>"2012","data_value"=>"16505400"),
			array("metadata_id"=>"2","data_year"=>"2011","data_value"=>"15100430"),
			array("metadata_id"=>"2","data_year"=>"2010","data_value"=>"14502300"),

			array("metadata_id"=>"1","data_year"=>"2017","data_value"=>"29708008"),
			array("metadata_id"=>"1","data_year"=>"2016","data_value"=>"29207007"),
			array("metadata_id"=>"1","data_year"=>"2015","data_value"=>"28606006"),
			array("metadata_id"=>"1","data_year"=>"2014","data_value"=>"28101005"),
			array("metadata_id"=>"1","data_year"=>"2013","data_value"=>"27502004"),
			array("metadata_id"=>"1","data_year"=>"2012","data_value"=>"26503003"),
			array("metadata_id"=>"1","data_year"=>"2011","data_value"=>"25004002"),
			array("metadata_id"=>"1","data_year"=>"2010","data_value"=>"24505001"),

			array("metadata_id"=>"2","data_year"=>"2017","data_value"=>"19707980"),
			array("metadata_id"=>"2","data_year"=>"2016","data_value"=>"19200099"),
			array("metadata_id"=>"2","data_year"=>"2015","data_value"=>"18600221"),
			array("metadata_id"=>"2","data_year"=>"2014","data_value"=>"18156500"),
			array("metadata_id"=>"2","data_year"=>"2013","data_value"=>"17500760"),
			array("metadata_id"=>"2","data_year"=>"2012","data_value"=>"16505400"),
			array("metadata_id"=>"2","data_year"=>"2011","data_value"=>"15100430"),
			array("metadata_id"=>"2","data_year"=>"2010","data_value"=>"14502300")

		));
    }
}
