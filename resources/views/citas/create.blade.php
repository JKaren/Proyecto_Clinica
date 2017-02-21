@extends('citas.mantenimiento_citas')


@section('Contenido')
      <form role="form" method="post" action="/citas" autocomplete="off">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <fieldset>

            <div class="text-center"><h2 align="center">Agregar Cita</h2>
            </div>
            @include('partials/errores')
            </br>

            <div class="input-group col-md-12 col-xs-12">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-tasks bigicon"></i></span>
                <span align="center" class="col-md-6 col-xs-10 has-float-label">
                      <input id="id" name="id" placeholder="Ejm. 0123" class="form-control" value="{{old('id')}}">
                      <label>Código de la Cita</label>
                  </div>
            </div>
            <div class="input-group col-md-12 col-xs-12">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-calendar bigicon"></i></span>
                <span align="center" class="col-md-6 col-xs-10 has-float-label">
                      <input id="Fecha Cita" name="fecha_cita" type="date" class="form-control" value="{{old('fecha_cita')}}">
                      <label>Fecha de la Cita</label>
                  </div>


            <div class="input-group col-md-12 col-xs-12">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-calendar bigicon"></i></span>
                <span align="center" class="col-md-6 col-xs-10 has-float-label">
                    <input id="Fecha Reserva" name="fecha_reserva" type="date" class="form-control" value="{{old('fecha_reserva')}}">
                    <label>Fecha de reserva de la cita</label>
                </div>


          <div class="input-group col-md-12 col-xs-12">
              <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-cog bigicon"></i></span>
              <span align="center" class="col-md-6 col-xs-10 has-float-label">
                      <select id="Estado" name="estado"  class="form-control" value ="{{old('estado')}}" >
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
                    <select id="Pacientes" name="pacientes_dni"  class="form-control">
                      @foreach($pacientes as $paciente)
                        <option>{{$paciente->dni}}</option>
                      @endforeach
                </select>
                <label>DNI del Paciente</label>
                </div>

                <div class="input-group col-md-12 col-xs-12">
                    <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                    <span align="center" class="col-md-6 col-xs-10 has-float-label">
                  <select id="Bloques" name="bloques_idbloques"  class="form-control">
                    @foreach($bloques as $bloque)
                      <option>{{$bloque->idbloques}}</option>
                    @endforeach
              </select>
              <label>ID bloques</label>
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
