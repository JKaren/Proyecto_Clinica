<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class horarios extends Model
{
     protected $table = 'horarios';
      public function users()
      {
        return $this->hasMany('App\User', citas.fecha_cita','pacientes.dni','pacientes.apellidos ','pacientes.nombres ','medicos.dni ','medicos.nombres','medicos.apellidos);
      }
}
