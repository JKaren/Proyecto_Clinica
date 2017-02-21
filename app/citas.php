<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class citas extends Model
{
     protected $table = 'citas';
      public function users()
      {
        return $this->hasMany('App\User', 'id', 'fecha_citas','fecha_reserva','estado','pacientes');
      }
}
