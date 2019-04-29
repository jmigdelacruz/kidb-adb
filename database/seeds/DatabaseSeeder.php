<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$this->call('CountryTableSeeder');
		$this->call('MetadataTableSeeder');
		$this->call('IndicatorTableSeeder');
		$this->call('SDBSTableSeeder');
        $this->call('UnitMultiplierSeeder');
    }
}
