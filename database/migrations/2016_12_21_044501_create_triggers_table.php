<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('triggers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_trigger')->unique();
            $table->string('waktu_trigger');
            $table->string('event_trigger');
            $table->integer('id_table');
             $table->integer('id_database');
            $table->text('isi_trigger');
             $table->integer('id_user');
              $table->date('tanggal');
               $table->string('keterangan')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('triggers');
    }
}
