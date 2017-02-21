@extends('citas.mantenimiento_citas')
@section('Contenido')
        <form method="POST" action="/citas/{{$citas->id}}" autocomplete="off">
          {{csrf_field()}}
          {{method_field('PUT')}}

            <fieldset>

            <div class="text-center"><h2 align="center">Modificar citas</h2>
            </div>
            @include('partials/errores')
            </br>


            <div class="input-group col-md-12 col-xs-12">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-tasks bigicon"></i></span>
                <span align="center" class="col-md-6 col-xs-10 has-float-label">
                      <input id="id" name="id" placeholder="id" class="form-control" value="{{$citas->id}}" required disabled="true">
                      <label>Código de la Cita</label>
                  </div>
            </div>
            <div class="input-group col-md-12 col-xs-12">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-calendar bigicon"></i></span>
                <span align="center" class="col-md-6 col-xs-10 has-float-label">
                      <input id="fecha_cita" name="fecha_cita" placeholder="Fecha Cita " class="form-control" value="{{$citas->fecha_cita}}" required>
                      <label>Fecha de la Cita</label>
                  </div>


            <div class="input-group col-md-12 col-xs-12">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-calendar bigicon"></i></span>
                <span align="center" class="col-md-6 col-xs-10 has-float-label">
                    <input id="fecha_reserva" name="fecha_reserva" placeholder="Fecha Reserva" class="form-control" value="{{$citas->fecha_reserva}}" required>
                    <label>Fecha de reserva de la Cita</label>
                </div>

              <div class="input-group col-md-12 col-xs-12">
              <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-cog bigicon"></i></span>
              <span align="center" class="col-md-6 col-xs-10 has-float-label">
                      <select id="estado" name="estado" placeholder="Estado" class="form-control" value="{{$citas->estado}}" required>
                            <option value="PENDIENTE">PENDIENTE</option>
                            <option value ="CONCLUIDO">CONCLUIDO</option>
                            <option value ="CANCELADO">CANCELADO</option>
                            <option value ="SANCIONADO">SANCIONADO</option>
                        </select>
                      <label>Estado de la Cita</label>
                  </div>

                  <div class="input-group col-md-12 col-xs-12">
                      <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                      <span align="center" class="col-md-6 col-xs-10 has-float-label">
                    <select id="pacientes_dni" name="pacientes_dni"  class="form-control" value="{{$citas->pacientes_dni}}" required>
                      @foreach($pacientes as $paciente)
                        @if($paciente->dni == $citas->pacientes_dni)
                          <option selected>{{$paciente->dni}}</option>
                        @else
                          <option >{{$paciente->dni}}</option>
                        @endif
                      @endforeach
                </select>
                <label>DNI del Paciente</label>
                </div>

        <div class="input-group col-md-12 col-xs-12">
            <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-square bigicon"></i></span>
            <span align="center" class="col-md-6 col-xs-10 has-float-label">
              <select id="bloques_idbloques" name="bloques_idbloques"  class="form-control" value="{{$citas->bloques_idbloques}}">
                @foreach($bloques as $bloque)
                  @if($bloque->idbloques == $citas->bloques_idbloques)
                    <option selected>{{$bloque->idbloques}}</option>
                  @else
                    <option>{{$bloque->idbloques}}</option>
                  @endif
                @endforeach
              </select>
                <label>Bloque de la Cita</label>
          </div>

  </div></br></br>

            <div class="form-group">
                  <div class="col-md-12 text-center">
                      <input type="submit" style="width:80px" class="btn btn-success" align="center" class="form-control" value="Guardar">
                      <button type="reset" style="width:80px" class="btn btn-primary" align="center" class="form-control" >Limpiar</button>

                  </div>
            </div></br></br>

            </fieldset>


       </form>
@endsection
