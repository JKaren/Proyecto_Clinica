@extends('historial_medico.mantenimiento_historial_medico')


@section('Contenido')
      <form role="form" method="post" action="/historial_medico" autocomplete="off">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <fieldset>

            <div class="text-center"><h2 align="center">Agregar Historial Médico</h2>
            </div>
              @include('partials/errores')
            </br>

            <div class="input-group col-md-12 col-xs-12">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-qrcode bigicon"></i></span>
                <span align="center" class="col-md-6 col-xs-10 has-float-label">
                  <div align="center" class="group-control">
                    <input id="Id" name="Id" placeholder="Código de Historial Médico" class="form-control" value="{{old('Id')}}" required maxlength="8" size="8">
                    <label>Código de Historial Médico</label>
                  </div>
            </div>
            <div class="input-group col-md-12 col-xs-12">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                <span align="center" class="col-md-6 col-xs-10 has-float-label">
                    <select id="Pacientes_DNI" name="Pacientes_DNI" placeholder="DNI Paciente" class="form-control">
                      @foreach($pacientes as $paciente)
                        @if($paciente->estado == "HABILITADO")
                          <option>{{$paciente->dni}}</option>
                        @endif
                      @endforeach
                    </select>
                    <label>Paciente D.N.I.</label>
             </div>

            <div class="input-group col-md-12 col-xs-12">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-th-list bigicon"></i></span>
                <span align="center" class="col-md-6 col-xs-10 has-float-label">
                  <div align="center" class="group-control">
                    <input id="Cirugias" name="Cirugias" placeholder="Cirugías" class="form-control" value="{{old('Cirugias')}}" required>
                    <label>Cirugías</label>
                  </div>
            </div>
            <div class="input-group col-md-12 col-xs-12">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-th-list bigicon"></i></span>
                <span align="center" class="col-md-6 col-xs-10 has-float-label">
                  <div align="center" class="group-control">
                    <input id="Alergias" name="Alergias" placeholder="Alergias" class="form-control" value="{{old('Alergias')}}" required>
                    <label>Alergias</label>
                  </div>
            </div>
            <div class="input-group col-md-12 col-xs-12">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-th-list bigicon"></i></span>
                <span align="center" class="col-md-6 col-xs-10 has-float-label">
                  <div align="center" class="group-control">
                    <input id="Antecedentes" name="Antecedentes" placeholder="Antecedentes" class="form-control" value="{{old('Antecedentes')}}" required>
                    <label>Antecedentes</label>
                  </div>
            </div>
            <div class="input-group col-md-12 col-xs-12">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-cog bigicon"></i></span>
                <span align="center" class="col-md-6 col-xs-10 has-float-label">
                  <div align="center" class="group-control">
                      <select id="Tipo_Sangre" name="Tipo_Sangre" placeholder="Tipo Sangre" class="form-control" >
                          <option>A+</option>
                          <option>A-</option>
                          <option>B+</option>
                          <option>B-</option>
                          <option>O+</option>
                          <option>O-</option>
                          <option>AB+</option>
                          <option>AB-</option>
                      </select>
                      <label>Tipo de Sangre del Paciente</label>
                  </div>
            </div>
             <div class="input-group col-md-12 col-xs-12">
                 <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-calendar bigicon"></i></span>
                 <span align="center" class="col-md-6 col-xs-10 has-float-label">
                      <input id="Fecha_Apertura" name="Fecha_Apertura"  type ="date" placeholder="Fecha de Apertura" value="{{old('Fecha_Apertura')}}" class="form-control" required>
                        <label>Fecha de Apertura</label>
                  </div>
            </div></br></br>

            <div class="form-group">
                  <div class="col-md-12 text-center">
                      <a data-target="#confirmar" data-toggle="modal" style="width:80px" class="btn btn-success" align="center" class="form-control" value="Guardar">Guardar</a>
                      <button type="reset" style="width:80px" class="btn btn-primary" align="center" class="form-control" >Limpiar</button>

                  </div>
            </div></br></br>

            <div class="modal fade modal-slide-in-rigth" aria-hidden="true"
              role="dialog" tabindex="-1" id="confirmar">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-Label="Close">
                        <span aria-hidden="true">X</span>
                      </button>
                      <h3 class="modal-title">Agregar Historial Paciente</h3>
                    </div>
                    <div class="modal-body">
                      <p>¿ Esta seguro si desea agregar los datos del al historial médico del paciente ?</p>
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
