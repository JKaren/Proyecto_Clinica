<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class EscuelasProfesionalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $escuelas_profesionales = DB::table('escuelas_profesionales')->get();
      return view('escuelas_profesionales.index',['escuelas_profesionales' => $escuelas_profesionales]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $escuelas_profesionales = DB::table('escuelas_profesionales')->get();
            return view('escuelas_profesionales.create',['escuelas_profesionales' => $escuelas_profesionales]);
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
          'id'=>['required','unique:escuelas_profesionales','size:2','regex:/^[A-Z]+$/'],
          'nombre'=>['required','max:50','min:3','regex:/^[A-Za-z ]+$/']
        ]);
        $id = $request->input('id');
        $nombre = $request->input('nombre');
        $estado = $request->input('estado');

        DB::table('escuelas_profesionales')->insert([
        'id'=> $id,
        'nombre'=>$nombre,
        'estado'=>$estado
        ]);

        //return $this->index();

        return redirect('escuelas_profesionales');
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
      $escuela_profesional = DB::table('escuelas_profesionales')->where('id',$id)->first();

    return view('escuelas_profesionales.edit',['escuela_profesional'=>$escuela_profesional]);
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
        'nombre'=>['required','max:50','min:3','regex:/^[A-Za-z ]+$/']
      ]);
      $nombre = $request->input('nombre');
      $estado = $request->input('estado');

      DB::table('escuelas_profesionales')->where('id',$id)
        ->update([
        'nombre'=>$nombre,
        'estado'=>$estado
      ]);
      return redirect('escuelas_profesionales');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $escuela_profesional = DB::table('escuelas_profesionales')->where('id',$id)->first();
      $estado = 'INHABILITADO';
      if($escuela_profesional->estado == 'INHABILITADO'){
        $estado = 'HABILITADO';
      }
      DB::table('escuelas_profesionales')->where('id',$id)->update(['estado'=>$estado]);
      return redirect('escuelas_profesionales');
    }
}
