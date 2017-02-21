<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\pacientes;
use App\User;
use PDF;
class PDFControllerPacientes extends Controller
{
  public  function PDFPaciente()
  {
    $pacientes= \DB::table('citas')
    ->select('citas.id','citas.fecha_cita','pacientes.dni','pacientes.apellidos as apellido','pacientes.nombres as nombre','medicos.dni as dni1','medicos.nombres','medicos.apellidos')
    ->join('pacientes', 'citas.pacientes_dni', '=', 'pacientes.dni')
    ->join('bloques', 'bloques.idbloques', '=', 'citas.bloques_idbloques')
    ->join('medicos', 'bloques.medicos_dni', '=', 'medicos.dni')
    ->get();

    $pdf=\PDF::loadView('pdfAministrador.vistapacientes',['pacientes'=>$pacientes]);
    return $pdf->stream('archivo_pacientes.pdf');
  }
}
