<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\User;

class MedicosController extends Controller
{
    public $item_id='dni';
    public $item=[
     'contraseña',
     'codigo',
     'nombres',
     'apellidos',
     'fecha_nacimiento',
     'sexo',
     'telefono',
     'correo',
     'direccion',
     'especialidades_codigo',
     'estado'
   ];

     public $tabla='medicos';
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
        'dni'=>['required','unique:medicos','size:8','regex:/^[0-9]+$/'],
        'contraseña'=>['required','max:30','min:6'],
        'codigo'=>['required','size:6','regex:/^[0-9A-Z]+$/'],
        'nombres'=>['required','max:100','min:3','regex:/^[A-Z ]+$/'],
        'apellidos'=>['required','max:100','min:3','regex:/^[A-Z ]+$/'],
        'fecha_nacimiento'=>['required','date'],
        'sexo'=>['required','in:MASCULINO,FEMENINO'],
        'telefono'=>['required','size:9','regex:/^[0-9]+$/'],
        'correo'=>['required','max:50','email'],
        'direccion'=>['required','max:100'],
        'estado'=>['required','in:HABILITADO,INHABILITADO']
      ]);
        $aux[$this->item_id]=$request->input($this->item_id);
        foreach ($this->item as $it) {
          if(!is_null($it))
          $aux[$it]=$request->input($it);
        }
        $aux['contraseña']=bcrypt($aux['contraseña']);

        User::create([
            'dni' => $aux['dni'],
            'password' =>$aux['contraseña'],
            'tipo' => 'Medico',
        ]);
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
        'codigo'=>['required','size:6','regex:/^[0-9A-Z]+$/'],
        'nombres'=>['required','max:100','min:3','regex:/^[A-Z ]+$/'],
        'apellidos'=>['required','max:100','min:3','regex:/^[A-Z ]+$/'],
        'fecha_nacimiento'=>['required','date'],
        'sexo'=>['required','in:MASCULINO,FEMENINO'],
        'telefono'=>['required','size:9','regex:/^[0-9]+$/'],
        'correo'=>['required','max:50','email'],
        'direccion'=>['required','max:100'],
        'estado'=>['required','in:HABILITADO,INHABILITADO']
      ]);
      foreach ($this->item as $it) {
        if(!is_null($it))
        $aux[$it]=$request->input($it);
      }
      $aux['contraseña']=bcrypt($aux['contraseña']);
      if(DB::table('users')->where($this->item_id,$id)->COUNT()==0){
        User::create([
            'dni' => $request->input($this->item_id),
            'password' =>$aux['contraseña'],
            'tipo' => 'Medico',
        ]);
      }else{
        DB::table('users')->where($this->item_id,$id)->update([
            'password' =>$aux['contraseña'],
            'tipo' => 'Medico',
        ]);
      }
      DB::table($this->tabla)->where($this->item_id,$id)->update($aux);
      return redirect($this->tabla);
    }

    public function destroy($id)    {
      $medico = DB::table($this->tabla)->where($this->item_id,$id)->first();
      $estado = 'INHABILITADO';
      if($medico->estado == 'INHABILITADO'){
        $estado = 'HABILITADO';
      }
      DB::table($this->tabla)->where($this->item_id,$id)->update(['estado'=>$estado]);
      return redirect($this->tabla);
    }
}
