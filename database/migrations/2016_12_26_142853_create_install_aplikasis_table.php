<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstallAplikasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('install_aplikasis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_aplikasi');
            $table->string('lokasi_aplikasi');
            $table->string('folder_aplikasi');
            $table->string('alamat_git');
               $table->integer('user_id');

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
        Schema::dropIfExists('install_aplikasis');
    }
}
