<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    //
    protected $fillable = ['id','id_petugas','judul','deskripsi','deadline','waktu_selesai','foto_tugas','status_tugas'];
 
	  public function user()
	{
	return $this->belongsTo('App\User','id_petugas');
	}

}
