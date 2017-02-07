<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bugs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pengadu' );
           $table->integer('debugger')->nullable();
            $table->integer('aplikasi_id');
                $table->string('judul');
            $table->string('deskripsi');
            $table->string('gambar')->nullable();
             $table->string('jenis_masalah')->nullable();
            $table->integer('status_bug')->default('0');



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
        Schema::dropIfExists('bugs');
    }
}
