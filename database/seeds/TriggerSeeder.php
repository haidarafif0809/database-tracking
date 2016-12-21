<?php

use Illuminate\Database\Seeder;
use App\Trigger;
class TriggerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $trigger = new Trigger();
        $trigger->nama_trigger = "Trigger coba";
        $trigger->waktu_trigger = "BEFORE";
        $trigger->event_trigger = "DELETE";
        $trigger->id_table = 1;
        $trigger->id_database = 1;
        $trigger->isi_trigger = "DELETE FROM table_kedua WHERE id = 3;";
         $trigger->id_user = 1;
          $trigger->tanggal= "2016-02-02";
          $trigger->save();
    }
}
