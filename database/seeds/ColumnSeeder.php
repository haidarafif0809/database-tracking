<?php

use Illuminate\Database\Seeder;

use App\Column;

class ColumnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $column = new column();
        $column->nama_column = "id";
         $column->id_table = 1;
         $column->length = 10;
         $column->status_increment = 1;
          $column->status_null = 0;
          $column->status_unique = 1;
          $column->tipe_data = 'integer';

        $column->id_user = 1;
        $column->tanggal = "2016-02-02";
        $column->keterangan = "Contoh Keterangan";
        $column->save();

         //
        $column1 = new column();
        $column1->nama_column = "username";
         $column1->id_table = 1;
         $column1->length = 100;
         $column1->status_increment = 0;
          $column1->status_null = 1;
          $column1->status_unique = 1;
          $column1->tipe_data = 'varchar';

        $column1->id_user = 1;
        $column1->tanggal = "2016-02-02";
        $column1->keterangan = "Contoh Keterangan";
        $column1->save();
    }
}
