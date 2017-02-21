@extends('medicos.mantenimiento_medicos')

@section('estilos')
  <style>
    #Nombres{
      text-transform: uppercase;
    }
    #Apellidos{
      text-transform: uppercase;
    }
    #direccion{
      text-transform: uppercase;
    }
  </style>
@endsection

@section('Contenido')
<form method="POST" action="/medicos/{{ $medicos->dni }}" autocomplete="off">
{{csrf_field()}}
{{method_field('PUT')}}
  <fieldset>
    <div class="text-center"><h2 align="center">MODIFICAR MÉDICO</h2>
    </div>
    @include('partials/errores')
    </br>

    <div class="input-group col-md-12 col-xs-12">
      <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-list-alt bigicon"></i></span>
      <span align="center" class="col-md-6 col-xs-10 has-float-label">
      <div align="center" class="group-control">
        <input id="dni" name="dni" placeholder="DNI" class="form-control" value="{{$medicos->dni}}"  readonly="">
        <label>DNI</label>
      </div>
    </div>

    <div class="input-group col-md-12 col-xs-12">
      <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-list-alt bigicon"></i></span>
      <span align="center" class="col-md-6 col-xs-10 has-float-label">
      <div align="center" class="group-control">
        <input id="contraseña" name="contraseña" placeholder="******" class="form-control" type = "password"value="{{$medicos->contraseña}}"  >
        <label>Contraseña</label>
      </div>
    </div>

    <div class="input-group col-md-12 col-xs-12">
      <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-user-md bigicon"></i></span>
      <span align="center" class="col-md-6 col-xs-10 has-float-label">
        <div align="center" class="group-control">
          <input id="codigo" name="codigo" placeholder="Código Médico" class="form-control"
            value="{{$medicos->codigo}}">
          <label>Código Médico</label>
        </div>
    </div>

    <div class="input-group col-md-12 col-xs-12">
      <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
      <span align="center" class="col-md-6 col-xs-10 has-float-label">
      <div align="center" class="group-control">
        <input id="nombres" name="nombres" placeholder="Nombres" class="form-control" value="{{$medicos->nombres}}" >
        <label>Nombres</label>
      </div>
    </div>

    <div class="input-group col-md-12 col-xs-12">
      <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
      <span align="center" class="col-md-6 col-xs-10 has-float-label">
      <div align="center" class="group-control">
        <input id="apellidos" name="apellidos" placeholder="Apellidos" class="form-control"
          value="{{$medicos->apellidos}}">
        <label>Apellidos</label>
      </div>
    </div>

    <div class="input-group col-md-12 col-xs-12">
      <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-calendar bigicon"></i></span>
      <span align="center" class="col-md-6 col-xs-10 has-float-label">
      <div align="center" class="group-control">
        <input id="fecha_nacimiento" name="fecha_nacimiento" type="date"placeholder="Fecha de Nacimiento"
          class="form-control" value="{{$medicos->fecha_nacimiento}}" required>
        <label>Fecha de Nacimiento</label>
      </div>
    </div>

    <div class="input-group col-md-12 col-xs-12">
      <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-female bigicon"></i></span>
      <span align="center" class="col-md-6 col-xs-10 has-float-label">
      <div align="center" class="group-control">
        <select class="form-control" id="sexo" name="sexo">
          @if($medicos->sexo =="MASCULINO")
            <option selected>MASCULINO</option>
            <option>FEMENINO</option>
          @else
            <option>MASCULINO</option>
            <option selected>FEMENINO</option>
          @endif
        </select>
        <label>Sexo</label>
      </div>
    </div>

    <div class="input-group col-md-12 col-xs-12">
      <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-phone bigicon"></i></span>
      <span align="center" class="col-md-6 col-xs-10 has-float-label">
      <div align="center" class="group-control">
        <input id="telefono" name="telefono" placeholder="Teléfono" class="form-control"
        value="{{$medicos->telefono}}" >
        <label>Teléfono</label>
      </div>
    </div>

    <div class="input-group col-md-12 col-xs-12">
      <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-envelope bigicon"></i></span>
      <span align="center" class="col-md-6 col-xs-10 has-float-label">
      <div align="center" class="group-control">
        <input id="correo" name="correo" type="email"placeholder="E-Mail" class="form-control"
          value="{{$medicos->correo}}">
        <label>E-Mail</label>
      </div>
    </div>

    <div class="input-group col-md-12 col-xs-12">
      <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-home bigicon"></i></span>
      <span align="center" class="col-md-6 col-xs-10 has-float-label">
      <div align="center" class="group-control">
        <input id="direccion" name="direccion" placeholder="Dirección" class="form-control"
          value="{{$medicos->direccion}}">
        <label>Dirección</label>
      </div>
    </div>

    <div class="input-group col-md-12 col-xs-12">
      <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-bitbucket bigicon"></i></span>
      <span align="center" class="col-md-6 col-xs-10 has-float-label">
      <select id="estado" name="estado" placeholder="Estado" class="form-control">
      @if($medicos->estado=="HABILITADO")
        <option selected >HABILITADO</option>
        <option>INHABILITADO</option>
      @else
        <option>HABILITADO</option>
        <option selected>INHABILITADO</option>
      @endif
      </select>
      <label>Estado<label>
    </div>

    <div class="input-group col-md-12 col-xs-12">
      <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-heartbeat bigicon"></i></span>
      <span align="center" class="col-md-6 col-xs-10 has-float-label">
      <select id="especialidades_codigo" name="especialidades_codigo" placeholder="Especialidad" class="form-control">
      @foreach($especialidades as $especialidad)
        @if($especialidad->codigo==$medicos->especialidades_codigo)
          <option selected value="{{$especialidad->codigo}}">{{$especialidad->nombre}}</option>
        @else
          @if($especialidad->habilitado == "HABILITADO")
            <option value="{{$especialidad->codigo}}">{{$especialidad->nombre}}</option>
          @endif
        @endif
      @endforeach
      </select>
      <label>Especialidad<label>
    </div></br></br>

    <div class="form-group">
      <div class="col-md-12 text-center">
        <a data-target="#confirmar-{{ $medicos->dni }}" data-toggle="modal" style="width:80px"
          class="btn btn-success" align="center" class="form-control" value="Guardar" >Guardar</a>
        <button type="reset" style="width:80px" class="btn btn-primary" align="center"
          class="form-control" >Limpiar</button>
      </div>
    </div></br></br>

    <div class="modal fade modal-slide-in-rigth" aria-hidden="true" role="dialog" tabindex="-1"
      id="confirmar-{{$medicos->dni}}">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-Label="Close">
              <span aria-hidden="true">X</span>
            </button>
            <h3 class="modal-title">Modificar Datos del Médico</h3>
          </div>
          <div class="modal-body">
            <p>¿Desea guardar los cambios efectuados en el médico?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" style="width:80px" class="btn btn-success">Guardar</button>
          </div>
        </div>
      </div>
    </div>
  </fieldset>
</form>
@endsection
