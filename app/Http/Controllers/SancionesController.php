<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;


class SancionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $sanciones = DB::table('sancion')->get();
      return view('sanciones.index',['sanciones'=>$sanciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $t1 = DB::table('citas')->get();
        $t2 = DB::table('tipo_sancion')->get();
        return view('sanciones.create',['citas'=>$t1,'tipo_sancion'=>$t2]);
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
        'id_cita'=>['required','unique:sanciones','numeric'],
        'id_sancion'=>['required'],
        'fecha_sancion'=>['required','date']
      ]);
      $id_sancion = $request->input('id_sancion');
      $id_cita = $request->input('id_cita');
      $fecha_sancion = $request->input('fecha_sancion');

      DB::table('sancion')->insert([
        'id_sancion'=> $id_sancion,
        'id_cita'=> $id_cita,
        'fecha_sancion'=>$fecha_sancion,
      ]);

      return redirect('sanciones');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $t1 = DB::table('citas')->get();
      $t2 = DB::table('tipo_sancion')->get();
      $sanciones = DB::table('sancion')->where('id_sancion',$id)->first();
      return view('sanciones.edit',['sanciones'=>$sanciones,'citas'=>$t1,'tipo_sancion'=>$t2]);
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
        'id_cita'=>['required'],
        'id_sancion'=>['required'],
        'fecha_sancion'=>['required','date']
      ]);
      $fecha_sancion= $request->input('fecha_sancion');
      DB::table('sancion')->where('id_sancion',$id)
        ->update([
      'fecha_sancion'=>$fecha_sancion,
      ]);

      return redirect('sanciones');

    }
}
