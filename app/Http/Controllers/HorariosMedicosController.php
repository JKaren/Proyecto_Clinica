<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HorariosMedicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $item_id = 'idbloques';
    public $item    = [
        'idbloques',
        'hora_inicio',
        'dia',
        'medicos_dni',
        'estado',
    ];

    public $tabla = 'bloques';

    public function index()
    {
        $t = DB::table('medicos')->get();
        return view('horarios_medico.escogerMedico', ['t' => $t]);
    }

    public function resaltar($idbloque, $medDNI)
    {
        $t = DB::table($this->tabla)->where($this->item_id, $idbloque)->get();
        foreach ($t as $ts) {
            $dni = $ts->medicos_dni;
        }

        if (is_null($dni)) {
            DB::table($this->tabla)->where($this->item_id, $idbloque)
                ->update(['medicos_dni' => $medDNI, 'estado' => 0]);
        } elseif ($medDNI == $dni) {
            DB::table($this->tabla)->where($this->item_id, $idbloque)
                ->update(['medicos_dni' => null, 'estado' => 1]);
        }

        $url = 'medhorarios/' . $medDNI . '/horario';
        return redirect($url);
    }

    public function mostrar($id)
    {
        $t = DB::table('medicos')->where('dni', $id)->get();
        foreach ($t as $ts) {
            $especialidad = $ts->especialidades_codigo;
        }

        $dias   = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");
        $fecha  = date('Y-m-j');
        $estado = [];
        for ($i = 0; $i < 7; $i++) {
            $estado[$i] = DB::select("SELECT B.idbloques as'idbloques',
                                       B.hora_inicio as 'Horainicio',
                                       B.estado as 'estado',
                                       B.medicos_dni as 'dnimed'   FROM `bloques` B WHERE B.especialidades_codigo=?
                                       and B.dia=? AND B.hora_inicio>13 ORDER BY hora_inicio", [$especialidad, $dias[$i]]);
        }

        $res = [];
        for ($i = 0; $i < 7; $i++) {
            $aux = $estado[$i];
            for ($j = 0; $j < 34; $j++) {
                $test = $aux[$j];
                if (is_null($test->dnimed)) {
                    $test->dnimed = 'd';
                    $aux[$j]      = $test;
                }
                $res[$i . '-' . $j] = $aux[$j];
            }
        }
        //print_r($res);
        $horas   = [];
        $horaI   = 7;
        $bandera = 1;
        for ($i = 0; $i < 50; $i++) {
            if ($bandera == 1) {
                if ($horaI < 9) {
                    $horas[$i] = '0' . $horaI . ':00 - 0' . $horaI . ':30';
                } elseif ($horaI == 9) {
                    $horas[$i] = '0' . $horaI . ':00 - 0' . $horaI . ':30';
                } else {
                    $horas[$i] = '' . $horaI . ':00 - ' . $horaI . ':30';
                }
                $bandera = 2;
            } else {
                $horaI = $horaI + 1;
                if ($horaI < 9) {
                    $horas[$i] = '0' . ($horaI - 1) . ':30 - 0' . $horaI . ':00';
                } elseif ($horaI == 9) {
                    $horas[$i] = '0' . ($horaI - 1) . ':30 - 0' . $horaI . ':00';
                } else {
                    $horas[$i] = '' . ($horaI - 1) . ':30 - ' . $horaI . ':00';
                }
                $bandera = 1;
            }
        }

        return view('horarios_medico.horario', ['estado' => $estado, 'dias' => $dias, 'res' => $res, 'dni' => $id, 'especialidad' => $especialidad, 'horas' => $horas]);
    }

}
