<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;

use App\Http\Requests;

class HorariosController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function index()
  {

    $horarios = DB::table('horarios')->get();

    return view('horarios.index',['horarios'=>$horarios]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('horarios.Agregarhorario');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $id = $request->input('id');
      $pas = $request->input('Password');
      $tel = $request->input('Telefono');
      $ema = $request->input('E_mail');
      $dir = $request->input('Direccion');
      $est = $request->input('Estado');
      $his = $request->input('Historiales');
      if($request->input('Estado')=='Habilitado'){
        $est = 1;
      }
      else {
        $est = 0;
      }

      DB::table('horarios')->insert([
        'id'=> $id,
        'contraseña'=>$pas,
        'telefono'=>$tel,
        'correo'=>$ema,
        'direccion'=>$dir,
        'habilitado'=>$est,
        'historiales_medicos_id'=>$his
      ]);

      return redirect('horarios');
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
    $horarios = DB::table('horarios')->where('id',$id)->first();
    return view('horarios.edit',['horarios'=>$horarios]);
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
       $contraseña = $request->input('Password');
       $telefono = $request->input('telefono');
       $correo = $request->input('correo');
       $direccion = $request->input('direccion');
       $estado = $request->input('Estado');
       $historial_medicos_id = $request->input('historial_medicos_id');

       if($request->input('Estado')=='Habilitado'){
         $estado = 1;
       }
       else {
         $estado = 0;
       }



       DB::table('horarios')->where('id',$id)
         ->update([
         'contraseña'=>$contraseña,
         'telefono'=>$telefono,
         'correo'=>$correo,
         'direccion'=>$direccion,
         'habilitado'=>$estado,
         'historiales_medicos_id'=>$historial_medicos_id,
       ]);
       return redirect('horarios');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    DB::table('horarios')->where('id',$id)->delete();
    return redirect('horarios');
  }
}
