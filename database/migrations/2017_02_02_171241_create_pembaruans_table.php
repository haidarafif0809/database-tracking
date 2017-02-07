<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembaruansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembaruans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_aplikasi');
            $table->integer('id_user');
            $table->string('judul');
            $table->string('pemasalahan');
            $table->string('pemecahan');
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('pembaruans');
    }
}
