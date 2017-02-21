<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class HistorialesMedicosDetallesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $historiales_medicos_detalles = DB::table('historiales_medicos_detalles')->get();
      return view('historiales_medicos_detalles.index',['historiales_medicos_detalles' =>$historiales_medicos_detalles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $historial_medico = DB::table('historial_medico')->get();
      $medicos = DB::table('medicos')->get();
      $citas = DB::table('citas')->get();
        return view('historiales_medicos_detalles.create',['historial_medico'=>$historial_medico,'citas'=>$citas]);

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
          'id_historial_medico_detalle'=>['required','unique:historiales_medicos_detalles'],
          'Id_Historial'=>['required','max:20'],
          'Estatura'=>['required','max:2000','regex:/^[0-9.]+$/'],
          'Peso'=>['required','max:2000','regex:/^[0-9.]+$/'],
          'Presion'=>['required','max:200','regex:/^[0-9.]+$/'],
          'Descripcion'=>['required','max:4000','regex:/^[0-9A-Za-z ]+$/'],
          'IdCita'=>['required']
        ]);

        $id_historial_medico = $request->input('id_historial_medico_detalle');
        $id_historial = $request->input('Id_Historial');
        $estatura = $request->input('Estatura');
        $peso = $request->input('Peso');
        $presion = $request->input('Presion');
        $descripcion = $request->input('Descripcion');
        $id_cita = $request->input('IdCita');


      DB::table('historiales_medicos_detalles')->insert([
      'id_historial_medico'=> $id_historial_medico,
      'id_historial'=> $id_historial,
      'estatura'=>$estatura,
      'peso'=>$peso,
      'presion'=>$presion,
      'descripcion'=>$descripcion,
      'id_cita'=>$id_cita

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
        return $this->index();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      $historiales_medicos_detalles = DB::table('historiales_medicos_detalles')->where('id_cita',$id)->first();
      $historial_medico= DB::table('historial_medico')->get();
      $medicos = DB::table('medicos')->get();
      return view('historiales_medicos_detalles.edit',['historiales_medicos_detalles'=>$historiales_medicos_detalles,'historial_medico'=>$historial_medico,'medicos'=>$medicos]);


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
        'Estatura'=>['required','regex:/^[0-9.]+$/'],
        'Peso'=>['required','regex:/^[0-9.]+$/'],
        'Presion'=>['required','regex:/^[0-9.]+$/'],
        'Descripcion'=>['required','regex:/^[0-9A-Za-z ]+$/']
      ]);
      $estatura = $request->input('Estatura');
      $peso = $request->input('Peso');
      $presion = $request->input('Presion');
      $detalle = $request->input('Descripcion');
      $historial_medico = DB::table('historial_medico')->get();
      $id_historial_medico = $request->input('Id_Historial');


      DB::table('historiales_medicos_detalles')->where('id_cita',$id)
        ->update([
      'estatura'=>$estatura,
      'peso'=>$peso,
      'presion'=>$presion,
      'descripcion'=>$detalle,
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
      DB::table('historiales_medicos_detalles')->where('id_historial_medico',$id)->delete();
      return redirect('historiales_medicos_detalles');
    }
}
