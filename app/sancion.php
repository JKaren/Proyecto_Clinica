<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sancion extends Model
{
     protected $table = 'sancion';
      public function users()
      {
        return $this->hasMany('App\User', 'id_sancion','id_cita','tipo_sancion');
      }
}
