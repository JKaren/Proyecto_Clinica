<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class tipo_sancionController extends Controller
{
  public $tabla='tipo_sancion';
  public $item_id='id_tipo_sancion';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo_sancion = DB::table('tipo_sancion')->get();
      return view('tipo_sancion.index',['tipo_sancion' => $tipo_sancion]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $tipo_sancion = DB::table('tipo_sancion')->get();
            return view('tipo_sancion.create',['tipo_sancion' => $tipo_sancion]);
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
        'id_tipo_sancion'=>['required','unique:tipo_sancion','size:10'],
        'descripcion'=>['required','max:45'],
        'tiempo'=>['required','numeric'],
        'estado'=>['required','in:HABILITADO,INHABILITADO']
      ]);
    $id_tipo_sancion = $request->input('id_tipo_sancion');
    $descripcion = $request->input('descripcion');
    $tiempo = $request->input('tiempo');
    $estado =$request->input('estado');

    DB::table('tipo_sancion')->insert([
      'id_tipo_sancion'=> $id_tipo_sancion,
      'descripcion'=>$descripcion,
      'tiempo'=>$tiempo,
      'estado'=>$estado

      ]);

     // return $this->index();

      return redirect('tipo_sancion');
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
      $tipo_sancio = DB::table('tipo_sancion')->where('id_tipo_sancion',$id)->first();

    return view('tipo_sancion.edit',['tipo_sancio'=>$tipo_sancio]);
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
        'descripcion'=>['required','max:45'],
        'tiempo'=>['required','numeric'],
        'estado'=>['required','in:HABILITADO,INHABILITADO']
      ]);
      $id_tipo_sancion = $request->input('id_tipo_sancion');
      $descripcion = $request->input('descripcion');
      $tiempo = $request->input('tiempo');
      $estado = $request->input('estado');

  DB::table('tipo_sancion')->where('id_tipo_sancion',$id_tipo_sancion)
    ->update([
    'id_tipo_sancion'=> $id_tipo_sancion,
    'descripcion'=>$descripcion,
    'tiempo'=>$tiempo,
    'estado' =>$estado
  ]);
  return redirect('tipo_sancion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $tipo_sancion = DB::table($this->tabla)->where($this->item_id,$id)->first();
      $habilitado = 'INHABILITADO';
      if($tipo_sancion->estado == 'INHABILITADO'){
        $habilitado = 'HABILITADO';
      }
      DB::table($this->tabla)->where($this->item_id,$id)->update(['estado'=>$habilitado]);
      return redirect($this->tabla);
    }
}
