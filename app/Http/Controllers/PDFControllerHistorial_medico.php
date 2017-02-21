<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\historial_medico;
use App\User;
use PDF;
class PDFControllerHistorial_medico extends Controller
{
  public  function PDFHistorialmedico()
  {
    $historial_medicos= \DB::table('citas')
    ->select('pacientes.dni','pacientes.apellidos','pacientes.nombres','especialidades.nombre')
    ->join('pacientes', 'citas.pacientes_dni', '=', 'pacientes.dni')
    ->join('bloques', 'bloques.idbloques', '=', 'citas.bloques_idbloques')
    ->join('medicos', 'bloques.medicos_dni', '=', 'medicos.dni')
    ->join('especialidades', 'medicos.especialidades_codigo', '=', 'especialidades.codigo')
    ->get();
    $pdf=\PDF::loadView('pdfAministrador.vistahistorial_medico',['historial_medicos'=>$historial_medicos]);
    return $pdf->stream('archivo_historial_medico.pdf');
  }
}
