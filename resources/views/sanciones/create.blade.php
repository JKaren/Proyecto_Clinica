@extends('sanciones.mantenimiento_sanciones')

@section('estilos')

@endsection

@section('Titulo')
    <i class="fa fa-gear fa-fw"></i>
    <a1>Agregar Sanciones<a1>
@endsection

@section('Contenido')

    <form role="form" method="post" action="/sanciones">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
            <fieldset>
            <div class="text-center"><h2 align="center">Agregar Sanciones</h2>
            </div>
            @include('partials/errores')
            </br>

            <div class="input-group col-md-12 col-xs-12">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-slack bigicon"></i></span>
                <span align="center" class="col-md-6 col-xs-10 has-float-label">
                  <div align="center" class="group-control">
                      <select id="id_sancion" name="id_sancion" class="form-control" value="{{old('id_sancion')}}">
                        @foreach ($tipo_sancion as $tp)
                          @if($tp->estado == "HABILITADO")
                            <option value={{$tp->id_tipo_sancion}}>{{$tp->id_tipo_sancion}}</option>
                          @endif
                        @endforeach
                      </select>
                        <label>Código Sanción</label>
                    </div>
              </div>
              <div class="input-group col-md-12 col-xs-12">
                    <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-th bigicon"></i></span>
                    <span align="center" class="col-md-6 col-xs-10 has-float-label">
                      <div align="center" class="group-control">
                          <select id="id_cita" name="id_cita" class="form-control" value="{{old('id_cita')}}">
                            @foreach($citas as $cita)
                              <option value={{$cita->id}}>{{$cita->id}}</option>
                            @endforeach
                          </select>
                          <label>Código Cita</label>
                    </div>
              </div></div>
              <div class="input-group col-md-12 col-xs-12">
                  <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-calendar bigicon"></i></span>
                  <span align="center" class="col-md-6 col-xs-10 has-float-label">
                    <div align="center" class="group-control">
                        <input id="fecha_sancion" name="fecha_sancion" type ="date" class="form-control" value="{{old('fecha_sancion')}}">
                          <label>Fecha de la Sancion</label>
                    </div>
              </div>

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
                        <h3 class="modal-title">Agregar Sanción</h3>
                      </div>
                      <div class="modal-body">
                        <p>Esta seguro si desea agregar la sancion ?</p>
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

@section('js')

@endsection

@section('js_scripts')

@endsection
