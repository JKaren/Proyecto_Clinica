@extends('historial_medico.mantenimiento_historial_medico')

@section('Contenido')
        <form method="POST" action="/historial_medico/{{$historial_medico->id_historial_medico }}" autocomplete="off">
          {{csrf_field()}}
          {{method_field('PUT')}}

            <fieldset>

            <div class="text-center"><h2 align="center">Modificar Historial Médico</h2>
            </div>
              @include('partials/errores')
            </br>
            <div class="input-group col-md-12 col-xs-12">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-qrcode bigicon"></i></span>
                <span align="center" class="col-md-6 col-xs-10 has-float-label">
                  <div align="center" class="group-control">
                    <input id="Id" name="Id" placeholder="Código de Historial Médico" class="form-control" value="{{$historial_medico->id_historial_medico}}" required readonly>
                    <label>Código de Historial Médico</label>
                  </div>
            </div>
            <div class="input-group col-md-12 col-xs-12">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                <span align="center" class="col-md-6 col-xs-10 has-float-label">
                    <select id="Pacientes_DNI" name="Pacientes_DNI" placeholder="DNI Pacientes" class="form-control" required readonly disabled="true">
                      @foreach($pacientes as $paciente)
                          @if($paciente->dni==$historial_medico->pacientes_dni)
                              <option selected>{{$paciente->dni}}</option>

                          @else
                              <option>{{$paciente->dni}}</option>
                          @endif
                      @endforeach
                    </select>
                    <label>DNI de Pacientes</label>

            </div>

            <div class="input-group col-md-12 col-xs-12">
              <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-bitbucket bigicon"></i></span>
              <span align="center" class="col-md-6 col-xs-10 has-float-label">
              <select id="Tipo_Sangre" name="Tipo_Sangre" placeholder="Tipo_Sangre" class="form-control">
                <option>A+</option>
                <option>A-</option>
                <option>B+</option>
                <option>B-</option>
                <option>O+</option>
                <option>O-</option>
                <option>AB+</option>
                <option>AB-</option>
                <option selected>{{$historial_medico->tipo_sangre}}</option>
              </select>
              <label>Tipo Sangre<label>
            </div>


            <div class="input-group col-md-12 col-xs-12">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-calendar bigicon"></i></span>
                <span align="center" class="col-md-6 col-xs-10 has-float-label">
                     <input id="Fecha_Apertura" type="date" name="Fecha_Apertura" placeholder="Fecha de Apertura" class="form-control" value="{{$historial_medico->fecha_apertura}}" required>
                       <label>Fecha de Apertura</label>
            </div>

            <div class="input-group col-md-12 col-xs-12">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-th-list bigicon"></i></span>
                <span align="center" class="col-md-6 col-xs-10 has-float-label">
                  <div align="center" class="group-control">
                    <input id="Cirugias" name="Cirugias" placeholder="Cirugías" class="form-control" value="{{$historial_medico->cirugias}}" required>
                    <label>Cirugías</label>
                  </div>
                </div>
                <div class="input-group col-md-12 col-xs-12">
                    <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-th-list bigicon"></i></span>
                    <span align="center" class="col-md-6 col-xs-10 has-float-label">
                      <div align="center" class="group-control">
                        <input id="Alergias" name="Alergias" placeholder="Alergias" class="form-control" value="{{$historial_medico->alergias}}" required>
                        <label>Alergias</label>
                      </div>
                </div>
                <div class="input-group col-md-12 col-xs-12">
                    <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-th-list bigicon"></i></span>
                    <span align="center" class="col-md-6 col-xs-10 has-float-label">
                      <div align="center" class="group-control">
                        <input id="Antecedentes" name="Antecedentes" placeholder="Antecedentes" class="form-control" value="{{$historial_medico->antecedentes}}" required>
                        <label>Antecedentes</label>
                      </div>
                </div>


                <div class="form-group">
                      <div class="col-md-12 text-center">
                        <a data-target="#confirmar-{{ $historial_medico->id_historial_medico }}" data-toggle="modal" style="width:80px" class="btn btn-success" align="center" class="form-control" value="Guardar" >Guardar</a>
                        <button type="reset" style="width:80px" class="btn btn-primary" align="center" class="form-control" >Limpiar</button>

                      </div>
                </div></br></br>

                <div class="modal fade modal-slide-in-rigth" aria-hidden="true"
                  role="dialog" tabindex="-1" id="confirmar-{{$historial_medico->id_historial_medico}}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-Label="Close">
                            <span aria-hidden="true">X</span>
                          </button>
                          <h3 class="modal-title">Modificar Hsitorial Medico</h3>
                        </div>
                        <div class="modal-body">
                          <p>Esta seguro si desea modificar los datos del historial medico ?</p>
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
