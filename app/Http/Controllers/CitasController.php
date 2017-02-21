<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class CitasController extends Controller
{
    public $item_id='id';
     public $item=[
    'fecha_cita',
     'fecha_reserva',
     'estado',
     'pacientes_dni',
     'bloques_idbloques'
     ];

     public $tabla='citas';
     public $tabla1='medicos';
     public $tabla2='pacientes';
     public $tabla3 = 'bloques';

    public function index(){
        $t = DB::table($this->tabla)->get();
        return view($this->tabla.'.index',[$this->tabla => $t]);
    }

    public function create(){
      $t1 = DB::table($this->tabla1)->get();
      $t2 = DB::table($this->tabla2)->get();
      $t3 = DB::table($this->tabla3)->get();
        return view($this->tabla.'.create',
        [$this->tabla1=>$t1,
        $this->tabla2=>$t2,
        $this->tabla3=>$t3]);
    }

    public function store(Request $request){
      $this->validate($request,[
        'id'=>['required','unique:citas','numeric'],
        'fecha_cita'=>['required','date'],
        'fecha_reserva'=>['required','date'],
        'estado'=>['required','in:HABILITADO,INHABILITADO'],
        'pacientes_dni'=>['required'],
        'bloques_idbloques'=>['required']
      ]);
        $aux[$this->item_id]=$request->input($this->item_id);
        foreach ($this->item as $it)
          if(!is_null($it))
            $aux[$it]=$request->input($it);
        DB::table($this->tabla)->insert($aux);
        return redirect($this->tabla);
    }

    public function show($id){
        return $this->index();
    }

    public function edit($id){
      $t = DB::table($this->tabla)->where($this->item_id,$id)->first();
      $t1 = DB::table($this->tabla1)->get();
      $t2 =DB::table($this->tabla2)->get();
      $t3 =DB::table($this->tabla3)->get();
      return view($this->tabla.'.edit',[
        $this->tabla=>$t,
        $this->tabla1=>$t1,
        $this->tabla2=>$t2,
        $this->tabla3=>$t3
      ]);
    }

    public function update(Request $request, $id){
      $this->validate($request,[
        'fecha_cita'=>['required','date'],
        'fecha_reserva'=>['required','date'],
        'estado'=>['required','in:HABILITADO,INHABILITADO'],
        'pacientes_dni'=>['required'],
        'bloques_idbloques'=>['required']
      ]);
      foreach ($this->item as $value=>$it) {
        if(!is_null($it))
        $aux[$it]=$request->input($it);
      }
      DB::table($this->tabla)->where($this->item_id,$id)->update($aux);
      return redirect($this->tabla);
    }

    public function destroy($id)    {
      $cita = DB::table($this->tabla)->where($this->item_id,$id)->first();
      $habilitado = 'INHABILITADO';
      if($cita->estado == 'INHABILITADO'){
        $habilitado = 'HABILITADO';
      }
      DB::table($this->tabla)->where($this->item_id,$id)->update(['estado'=>$habilitado]);
      return redirect($this->tabla);
    }

    public function Recuperar_Citas()
    {

        $idPaciente = Input::get("idPaciente");
        $cita = DB::table('citas')->where('pacientes_dni',$idPaciente)->orderBy('fecha_cita','desc')->get();

        return $cita;
    }

    public function Actualizar_Cancelacion()
   {
     $idcita=Input::get("idcita");
     $fecha=DB::table('citas')->where('id',$idcita)->first();

     DB::table('citas')->where('id',$idcita)
       ->update([
       'estado'=>"CANCELADO"
     ]);
     DB::table('sancion')->insert([
            'id_cita'=>$idcita,
          'id_sancion'=>'3',
          'fecha_sancion'=>$fecha->fecha_cita
     ]);

     return "";
   }

}
