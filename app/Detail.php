<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    //
    protected $fillable = ['id','id_pembaruan','id_user','detail'];

        public function pembaruan()
	{
	return $this->belongsTo('App\Pembaruan','id_pembaruan');
	}

	  public function user()
	{
	return $this->belongsTo('App\User','id_user');
	}

}
