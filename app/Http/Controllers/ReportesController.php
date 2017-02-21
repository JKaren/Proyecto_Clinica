<?php

namespace App\Http\Controllers;

class ReportesController extends Controller
{
    public function medico()
    {
        return view('Reportes.reportes_medico');
    }
    public function admi()
    {
        return view('Reportes.reportes_admi');
    }
}
