<?php

use Illuminate\Database\Seeder;
use App\IndukData;

class IndukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        $induk1 = IndukData::create(['id_table' => '1','id_database' => '1']);

        $induk2 = IndukData::create(['id_table' => '2','id_database' => '2']);
    }
}
