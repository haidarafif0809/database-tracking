<?php

use Illuminate\Database\Seeder;
use App\SampleData;

class SampleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        $SampelData = SampleData::create(['id_induk' => 1 ,'id_table' => 1 ,'id_database' => 1,'id_column' => 1,'data' => 'contoh data']);
    }
}
