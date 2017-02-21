<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class EspecialidadesController extends Controller
{
    public $item_id='codigo';
    public $item=['nombre','habilitado','consultorios_id'];

     public $tabla='especialidades';
     public $tabla1='consultorios';

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
        'codigo'=>['required','unique:especialidades','size:3','regex:/^[A-Z]+$/'],
        'nombre'=>['required','max:100','min:3','regex:/^[A-Z]+$/'],
        'habilitado'=>['required','in:HABILITADO,INHABILITADO']
      ]);
        $aux[$this->item_id]=$request->input($this->item_id);
        foreach ($this->item as $it) {
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
        'nombre'=>['required','max:100','min:3','regex:/^[A-Z ]+$/'],
        'habilitado'=>['required','in:HABILITADO,INHABILITADO']
      ]);
      foreach ($this->item as $it) {
        if(!is_null($it))
        $aux[$it]=$request->input($it);
      }
      DB::table($this->tabla)->where($this->item_id,$id)->update($aux);
      return redirect($this->tabla);
    }

    public function destroy($id)    {
        $especialidad = DB::table($this->tabla)->where($this->item_id,$id)->first();
        $habilitado = 'INHABILITADO';
        if($especialidad->habilitado == 'INHABILITADO'){
          $habilitado = 'HABILITADO';
        }
        DB::table($this->tabla)->where($this->item_id,$id)->update(['habilitado'=>$habilitado]);
        return redirect($this->tabla);
    }
}
