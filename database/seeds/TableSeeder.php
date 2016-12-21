<?php

use Illuminate\Database\Seeder;
use App\Table;
class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
               $table = new Table();
        $table->nama_table = "Contoh_table";
        $table->id_user = 1;
        $table->tanggal = "2016-02-02";
        $table->id_database = 1;
        $table->keterangan = "Contoh Keterangan";
        $table->save();
    }
}
