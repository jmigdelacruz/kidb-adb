<?php

use Illuminate\Database\Seeder;

class IndicatorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        	DB::table('indicators')->truncate();
		DB::table('indicators')->insert(array(
			array("name"=>"Population, mid_year","level"=>"1","lineage"=>"/001","sdmx_code"=>"POP_MID"),
		));
    }
}
