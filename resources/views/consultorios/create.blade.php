@extends('Consultorios.MantenimientoConsultorios')

@section('estilos')
@endsection

@section('Contenido')
<form role="form" method="post" action="/consultorios">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <fieldset>
    <div class="text-center"><h2 align="center">NUEVO CONSULTORIO</h2>
    </div>
    @include('partials/errores')</br>

    <div class="input-group col-md-12 col-xs-12">
      <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-plus-square bigicon"></i></span>
      <span align="center" class="col-md-6 col-xs-10 has-float-label">
      <div align="center" class="group-control">
        <input id="id" name="id" placeholder="Ejm. 101" class="form-control" value="{{old('id')}}">
        <label>Código del Consultorio</label>
      </div>
    </div>

    <div class="input-group col-md-12 col-xs-12">
      <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-h-square bigicon"></i></span>
      <span align="center" class="col-md-6 col-xs-10 has-float-label">
      <div align="center" class="group-control">
        <input id="ubicacion" name="ubicacion" placeholder="Ejm. Primer Piso "  class="form-control"
        value="{{old('ubicacion')}}" onKeyUp="this.value = this.value.toUpperCase();">
        <label>Ubicación del Consultorio</label>
      </div>
    </div>

    <div class="input-group col-md-12 col-xs-12">
      <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-bitbucket bigicon"></i></span>
      <span align="center" class="col-md-6 col-xs-10 has-float-label">
      <div align="center" class="group-control">
        <select id="estado" name="estado"  class="form-control" >
          <option>HABILITADO</option>
          <option>INHABILITADO</option>
        </select>
        <label>Estado</label>
      </div>
    </div></br>

    <div class="form-group">
      <div class="col-md-12 text-center">
        <a data-target="#confirmar" data-toggle="modal" style="width:80px" class="btn btn-success"
          align="center" class="form-control" value="Guardar">Guardar</a>
        <button type="reset" style="width:80px" class="btn btn-primary" align="center"
          class="form-control" >Limpiar</button>
      </div>
    </div></br></br>

    <div class="modal fade modal-slide-in-rigth" aria-hidden="true" role="dialog" tabindex="-1" id="confirmar">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-Label="Close">
              <span aria-hidden="true">X</span>
            </button>
            <h3 class="modal-title">Agregar Consultorio</h3>
          </div>
          <div class="modal-body">
            <p>¿Desea agregar este consultorio?</p>
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
