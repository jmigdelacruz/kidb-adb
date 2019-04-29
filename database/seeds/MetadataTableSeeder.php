<?php

use Illuminate\Database\Seeder;

class MetadataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('metadata')->truncate();
		DB::table('metadata')->insert(array(
			array("indicator_id"=>"1","country_id"=>"1"),
            array("indicator_id"=>"1","country_id"=>"3"),
		));
    }
}
