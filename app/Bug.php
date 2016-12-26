<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bug extends Model
{
    //

    protected $fillable = ['pengadu','debugger','aplikasi_id','deskripsi','gambar','jenis_masalah','status_bug','judul'];

    public function aplikasi()
	{
	return $this->belongsTo('App\Aplikasi','aplikasi_id');
	}

	  public function user()
	{
	return $this->belongsTo('App\User','pengadu');
	}

}
