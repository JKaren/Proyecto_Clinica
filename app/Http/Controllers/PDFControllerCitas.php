<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\citas;
use App\User;
use PDF;
class PDFControllerCitas extends Controller
{
      public  function pdfcitas()
      {
        $citas=citas::all();
        $pdf=\PDF::loadView('pdfAministrador.vistacitas',['citas'=>$citas]);
        return $pdf->stream('archivocitas.pdf');
      }
}
