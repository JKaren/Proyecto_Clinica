<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class HistorialMedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $historial_medico = DB::table('historial_medico')->get();
         return view('historial_medico.index',['historial_medico' =>$historial_medico]);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $pacientes = DB::table('pacientes')->get();
        return view('historial_medico.create',['pacientes'=>$pacientes]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $this->validate($request,[
        'Id'=>['required','unique:historial_medico','max:20'],
        'Cirugias'=>['required','max:2000','regex:/^[0-9A-Za-z ]+$/'],
        'Alergias'=>['required','max:2000','regex:/^[0-9A-Za-z ]+$/'],
        'Antecedentes'=>['required','max:200','regex:/^[0-9A-Za-z ]+$/'],
        'Fecha_Apertura'=>['required','date']
      ]);

      $id = $request->input('Id');
      $cirugias = $request->input('Cirugias');
      $alergias = $request->input('Alergias');
      $antecedentes = $request->input('Antecedentes');
      $tipo_sangre = $request->input('Tipo_Sangre');
      $pacientes_dni = $request->input('Pacientes_DNI');
      $fecha_apertura = $request->input('Fecha_Apertura');



          DB::table('historial_medico')->insert([
        'id_historial_medico'=> $id,
        'cirugias'=>$cirugias,
        'alergias'=>$alergias,
        'antecedentes'=>$antecedentes,
        'tipo_sangre'=>$tipo_sangre,
        'pacientes_dni'=>$pacientes_dni,
        'fecha_apertura'=>$fecha_apertura
          ]);

      return redirect('historial_medico');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            $historial_medico = DB::table('historial_medico')->where('id_historial_medico',$id)->first();
            $historial_medico_detalle = DB::table('historiales_medicos_detalles')->get();
            return view('historial_medico.show',['historial_medico'=>$historial_medico,'historial_medico_detalle'=>$historial_medico_detalle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


      $historial_medico = DB::table('historial_medico')->where('id_historial_medico',$id)->first();

          $pacientes = DB::table('pacientes')->get();
          return view('historial_medico.edit',['historial_medico'=>$historial_medico,'pacientes'=>$pacientes]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {



      $this->validate($request,[
        'Cirugias'=>['required','max:2000','regex:/^[0-9A-Za-z ]+$/'],
        'Alergias'=>['required','max:2000','regex:/^[0-9A-Za-z ]+$/'],
        'Antecedentes'=>['required','max:200','regex:/^[0-9A-Za-z ]+$/'],
        'Fecha_Apertura'=>['required','date']
      ]);
      $cirugias = $request->input('Cirugias');
      $alergias = $request->input('Alergias');
      $antecedentes = $request->input('Antecedentes');
      $tipo_sangre = $request->input('Tipo_Sangre');
      $fecha_apertura = $request->input('Fecha_Apertura');




      DB::table('historial_medico')->where('id_historial_medico',$id)
        ->update([
          'cirugias'=>$cirugias,
          'alergias'=>$alergias,
          'antecedentes'=>$antecedentes,
          'tipo_sangre'=>$tipo_sangre,
          'fecha_apertura'=>$fecha_apertura
      ]);

      return redirect('historial_medico');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      DB::table('historial_medico')->where('id_historial_medico',$id)->delete();
      return redirect('historial_medico');
    }
}
