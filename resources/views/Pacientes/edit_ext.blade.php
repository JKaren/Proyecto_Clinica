@extends('pacientes.mantenimiento_pacientes')


@section('Contenido')
        <form method="POST" action="/pacientes/{{ $pacientes->dni }}/balba" autocomplete="off">
          {{csrf_field()}}
          {{method_field('PUT')}}

            <fieldset>

            <div class="text-center"><h2 align="center">Modificar pacientes</h2>
            </div>

            @include('partials/errores')
            </br>
            <div class="input-group col-md-12 col-xs-12">
                  <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                  <span align="center" class="col-md-6 col-xs-10 has-float-label">
                    <div align="center" class="group-control">
                      <select onclick="MostrarFormulario()" id="Tipo_pacientes" name="tipo_paciente" placeholder="Tipo pacientes" class="form-control" required>
                        <option value="PERSONA EXTERNA" >PERSONA EXTERNA</option>
                      </select>
                        <label>Tipo de Paciente</label>
                  </div>
            </div>



            <div id="Seccion_General">
              <div class="input-group col-md-12 col-xs-12">
                  <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-list-alt bigicon"></i></span>
                  <span align="center" class="col-md-6 col-xs-10 has-float-label">
                    <div align="center" class="group-control">
                          <input id="dni" name="dni" placeholder="DNI" class="form-control"  value="{{$pacientes->dni}}"required maxlength="8" size="8" readonly>
                            <label>DNI</label>
                      </div>
                </div>
                </div>

                <div class="input-group col-md-12 col-xs-12">
                    <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-lock bigicon"></i></span>
                    <span align="center" class="col-md-6 col-xs-10 has-float-label">
                      <div align="center" class="group-control">
                          <input id="Password" type="Password" name="contraseña" placeholder="Contraseña" class="form-control" value="" required>
                          <label>Contraseña</label>
                      </div>
                </div>

                <div class="input-group col-md-12 col-xs-12">
                    <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                    <span align="center" class="col-md-6 col-xs-10 has-float-label">
                      <div align="center" class="group-control">
                          <input id="Nombres" name="nombres" placeholder="Nombres" class="form-control" value="{{$pacientes->nombres}}" required>
                          <label>Nombres</label>
                      </div>
                </div>

                <div class="input-group col-md-12 col-xs-12">
                    <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                    <span align="center" class="col-md-6 col-xs-10 has-float-label">
                      <div align="center" class="group-control">
                          <input id="Apellidos" name="apellidos" placeholder="Apellidos" class="form-control" value="{{$pacientes->apellidos}}"required>
                          <label>Apellidos</label>
                      </div>
                </div>

                <div class="input-group col-md-12 col-xs-12">
                    <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-calendar bigicon"></i></span>
                    <span align="center" class="col-md-6 col-xs-10 has-float-label">
                      <div align="center" class="group-control">
                          <input id="Fecha_Nacimiento" type ="date" name="fecha_nacimiento" placeholder="Fecha de Nacimiento" class="form-control" value="{{$pacientes->fecha_nacimiento}}" required >
                          <label>Fecha de Nacimiento</label>
                      </div>
                </div>

                <div class="input-group col-md-12 col-xs-12">
                  <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-female bigicon"></i></span>
                  <span align="center" class="col-md-6 col-xs-10 has-float-label">
                  <div align="center" class="group-control">
                    <select class="form-control" id="sexo" name="sexo">
                      @if($pacientes->sexo =="MASCULINO")
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
                        <input id="Telefono" name="telefono"  placeholder="Teléfono" class="form-control" value="{{$pacientes->telefono}}" maxlength="9" size="9" required>
                        <label>Teléfono</label>
                    </div>
              </div>
              <div class="input-group col-md-12 col-xs-12">
                  <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-envelope bigicon"></i></span>
                  <span align="center" class="col-md-6 col-xs-10 has-float-label">
                    <div align="center" class="group-control">
                          <input id="E_mail" name="correo" placeholder="E-Mail" class="form-control" value="{{$pacientes->correo}}"required>
                          <label>E-Mail</label>
                      </div>
                </div>
                <div class="input-group col-md-12 col-xs-12">
                    <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-home bigicon"></i></span>
                    <span align="center" class="col-md-6 col-xs-10 has-float-label">
                      <div align="center" class="group-control">
                          <input id="Direccion" name="direccion" placeholder="Dirección" class="form-control" value="{{$pacientes->direccion}}"required>
                          <label>Dirección</label>
                      </div>
                </div>
                <div class="input-group col-md-12 col-xs-12">
                    <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-cog bigicon"></i></span>
                    <span align="center" class="col-md-6 col-xs-10 has-float-label">
                      <div align="center" class="group-control">
                          <select id="Estado" name="estado" placeholder="Estado" class="form-control" value="{{$pacientes->estado}}">

                            @if($pacientes->estado == 'HABILITADO')
                              <option selected value="HABILITADO" >HABILITADO</option>
                              <option value="INHABILITADO">INHABILITADO</option>
                            @else
                              <option selected value="INHABILITADO" >INHABILITADO</option>
                              <option  value="HABILITADO" >HABILITADO</option>
                            @endif
                          </select>
                          <label>Estado de Paciente</label>
                      </div>
                </div></br></br>


                <div class="form-group">
                      <div class="col-md-12 text-center">
                          <a data-target="#confirmar-{{ $pacientes->dni }}" data-toggle="modal" style="width:80px" class="btn btn-success" align="center" class="form-control" value="Guardar">Guardar</a>
                          <button type="reset" style="width:80px" class="btn btn-primary" align="center" class="form-control" >Limpiar</button>

                      </div>

                </div></br></br>
            </div>


            <div class="modal fade modal-slide-in-rigth" aria-hidden="true"
              role="dialog" tabindex="-1" id="confirmar-{{$pacientes->dni}}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-Label="Close">
                        <span aria-hidden="true">X</span>
                      </button>
                      <h3 class="modal-title">Modificar Paciente</h3>
                    </div>
                    <div class="modal-body">
                      <p>Esta seguro si desea modificar los datos del paciente ?</p>
                      <p>DNI:           {{$pacientes->dni}}</p>
                      <p>Codigo:        {{$pacientes->codigo}}</p>
                      <p>Nombres:       {{$pacientes->nombres}}</p>
                      <p>Apellidos:     {{$pacientes->apellidos}}</p>
                      <p>Teléfono:      {{$pacientes->telefono}}</p>
                      <p>Correo:        {{$pacientes->correo}}</p>
                      <p>Dirección:     {{$pacientes->direccion}}</p>
                      <p>Escuela Profesional:  {{$pacientes->escuelas_profesionales_id}}</p>
                      <p>Estado:        {{$pacientes->estado}}</p>
                      <p>Tipo:        {{$pacientes->tipo_paciente}}</p>
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
@section('js_scripts')

<script>
  function MostrarFormulario()
  {
    var Seleccionado = document.getElementById('Tipo_pacientes').value;


    if(Seleccionado=='ESTUDIANTE')
    {
      document.getElementById('Seccion_Estudiante').style="display:visible";
    }
    else
    {
      document.getElementById('Seccion_Estudiante').style="display:none";
    }
  }
</script>


@endsection
