<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Backup extends Model
{
    //


    protected $fillable = ['user_id','isi_backup'];


	  public function user()
	{
	return $this->belongsTo('App\User','user_id');
	}

}
