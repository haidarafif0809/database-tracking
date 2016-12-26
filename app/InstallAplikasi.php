<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstallAplikasi extends Model
{
    //

    protected $fillable = ['nama_aplikasi','lokasi_aplikasi','folder_aplikasi','alamat_git','user_id'];
      public function user()
	{
	return $this->belongsTo('App\User','user_id');
	}
 
}
