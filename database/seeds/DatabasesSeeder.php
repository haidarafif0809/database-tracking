<?php

use Illuminate\Database\Seeder;
use App\Database;
class DatabasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $database = new Database();
        $database->nama_database = "Contoh Database";
        $database->id_user = 1;
        $database->tanggal = "2016-02-02";
        $database->keterangan = "Contoh Keterangan";
        $database->save();
    }
}
