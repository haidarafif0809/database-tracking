<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komen extends Model
{
    //
    protected $fillable = ['id','id_tugas','id_user','komentar'];

        public function pembaruan()
	{
	return $this->belongsTo('App\Tugas','id_tugas');
	}

	  public function user()
	{
	return $this->belongsTo('App\User','id_user');
	}
}
