<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    //

    protected $fillable = ['komentar','user_id','bug_id'];


	  public function user()
	{
	return $this->belongsTo('App\User','user_id');
	}

}
