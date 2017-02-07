<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembaruan extends Model
{
    //
    protected $fillable = ['id','id_aplikasi','id_user','judul','pemasalahan','pemecahan','foto'];

        public function aplikasi()
	{
	return $this->belongsTo('App\Aplikasi','id_aplikasi');
	}

	  public function user()
	{
	return $this->belongsTo('App\User','id_user');
	}

}
