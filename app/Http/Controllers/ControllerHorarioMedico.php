<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\horarios;
use App\User;
use PDF;
class ControllerHorarioMedico extends Controller
{

  public  function pdfhorarios()
  {
      $horarios= \DB::table('citas')
    ->select('bloques.hora_inicio','bloques.dia','medicos.nombres','medicos.apellidos','especialidades.nombre')
    ->join('bloques', 'citas.bloques_idbloques', '=', 'bloques.idbloques')
    ->join('medicos', 'bloques.medicos_dni', '=', 'medicos.dni')
    ->join('especialidades', 'medicos.especialidades_codigo', '=', 'especialidades.codigo')
    ->get();
    $pdf=\PDF::loadView('PDFMedico.vistahorariomedico',['horarios'=>$horarios]);
    return $pdf->stream('archivoHorariosMedico.pdf');
  }
}
