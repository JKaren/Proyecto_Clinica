<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\sancion;
use App\User;
use PDF;
class PDFControllerSancion extends Controller
{
  public  function PDFSancion()
  {
    $sanciones= \DB::table('citas')
   ->select('citas.id','citas.fecha_cita','pacientes.dni','especialidades.nombre','consultorios.id')
   ->join('pacientes', 'citas.pacientes_dni', '=', 'pacientes.dni')
   ->join('bloques', 'bloques.idbloques', '=', 'citas.bloques_idbloques')
   ->join('medicos', 'bloques.medicos_dni', '=', 'medicos.dni')
   ->join('especialidades', 'medicos.especialidades_codigo', '=', 'especialidades.codigo')
   ->join('consultorios', 'especialidades.consultorios_id', '=', 'consultorios.id')

->get();
    $pdf=\PDF::loadView('pdfAministrador.vistaSancion',['sanciones'=>$sanciones]);
    return $pdf->stream('archivoSancion.pdf');
  }
}
