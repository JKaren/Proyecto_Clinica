<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ConsultoriosController extends Controller
{
    public $item_id='id';
    public $item=['ubicacion', 'estado'];

    public $tabla='consultorios';
    public $tabla1='especialidades';

    public function index(){
        $t = DB::table($this->tabla)->get();
        return view($this->tabla.'.index',[$this->tabla => $t]);
    }

    public function create(){
        $t1 = DB::table($this->tabla1)->get();
        return view($this->tabla.'.create',[$this->tabla1=>$t1]);
    }

    public function store(Request $request){
      $this->validate($request,[
        'id'=>['required','unique:consultorios','size:3'],
        'ubicacion'=>['required','max:20','regex:/^[A-Z ]{3,}$/'],
        'estado'=>['required','in:HABILITADO,INHABILITADO']
      ]);
      $aux[$this->item_id]=$request->input($this->item_id);
      foreach ($this->item as $it){
        if(!is_null($it))
          $aux[$it]=$request->input($it);
      }
      DB::table($this->tabla)->insert($aux);
      return redirect($this->tabla);
    }

    public function show($id){
        return $this->index();
    }

    public function edit($id){
      $t = DB::table($this->tabla)->where($this->item_id,$id)->first();
      $t1 = DB::table($this->tabla1)->get();

      return view($this->tabla.'.edit',[
        $this->tabla=>$t,
        $this->tabla1=>$t1
      ]);
    }

    public function update(Request $request, $id){
      $this->validate($request,[
        'ubicacion'=>['required','max:20','regex:/^[A-Z ]{3,}$/'],
        'estado'=>['required','in:HABILITADO,INHABILITADO']
      ]);
      foreach ($this->item as $it) {
        if(!is_null($it))
        $aux[$it]=$request->input($it);
      }
      DB::table($this->tabla)->where($this->item_id,$id)->update($aux);
      return redirect($this->tabla);
    }

    public function destroy($id)    {
      $consultorio = DB::table($this->tabla)->where($this->item_id,$id)->first();
      $habilitado = 'INHABILITADO';
      if($consultorio->estado == 'INHABILITADO'){
        $habilitado = 'HABILITADO';
      }
      DB::table($this->tabla)->where($this->item_id,$id)->update(['estado'=>$habilitado]);
      return redirect($this->tabla);
    }
}
