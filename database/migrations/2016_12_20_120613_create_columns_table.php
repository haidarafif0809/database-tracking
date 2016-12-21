<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('columns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_column');
            $table->string('tipe_data');
            $table->integer('status_increment');
            $table->integer('status_null');
            $table->integer('status_unique');
            $table->integer('length');
            $table->integer('id_user');
            $table->integer('id_table');
            $table->string('keterangan')->nullable();
            $table->date('tanggal');
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
        Schema::dropIfExists('columns');
    }
}
