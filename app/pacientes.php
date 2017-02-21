<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pacientes extends Model
{
     protected $table = 'pacientes';
      public function users()
      {
        return $this->hasMany('App\User', citas.fecha_cita','pacientes.dni','pacientes.apellidos ','pacientes.nombres ','medicos.dni ','medicos.nombres','medicos.apellidos);
      }
}
