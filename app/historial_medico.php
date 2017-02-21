<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class historial_medico extends Model
{
     protected $table = 'historial_medico';
      public function users()
      {
        return $this->hasMany('App\User', 'id_historial_medico','cirugias','alergias','antecedentes','tipo_sangre','pacientes_dni','fecha_apertura');
      }
}
