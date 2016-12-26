<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aplikasi extends Model
{
    //

    protected $fillable = ['nama_aplikasi','url_aplikasi'];


      public function bug()
    {
    return $this->hasMany('App\Bug');
    }
    
}
