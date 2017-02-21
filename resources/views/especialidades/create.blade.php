@extends('Especialidades.MantenimientoEspecialidades')

@section('estilos')
<style>
#codigo{
  text-transform: uppercase;
}
#nombre{
  text-transform: uppercase;
}
</style>
@endsection

@section('Contenido')
<form role="form" method="post" action="/especialidades">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <fieldset>
    <div class="text-center"><h2 align="center">NUEVA ESPECIALIDAD</h2>
    </div>
    @include('partials/errores')
    </br>

    <div class="input-group col-md-12 col-xs-12">
      <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-h-square bigicon"></i></span>
      <span align="center" class="col-md-6 col-xs-10 has-float-label">
      <div align="center" class="group-control">
        <input id="codigo" name="codigo"  placeholder="Ejm. CAR" class="form-control"
          value="{{old('codigo')}}"  onkeyup="this.value= this.value.toUpperCase();">
        <label>Código de Especialidad</label>
      </div>
    </div>
    <div class="input-group col-md-12 col-xs-12">
      <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-list-alt bigicon"></i></span>
      <span align="center" class="col-md-6 col-xs-10 has-float-label">
      <div align="center" class="group-control">
        <input id="nombre" name="nombre" placeholder="Ejm. Cardiología" class="form-control"
            value="{{old('nombre')}}" onkeyup="this.value= this.value.toUpperCase();">
        <label>Nombre de Especialidad</label>
      </div>
    </div>
    <div class="input-group col-md-12 col-xs-12">
      <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-bitbucket bigicon"></i></span>
      <span align="center" class="col-md-6 col-xs-10 has-float-label">
      <div align="center" class="group-control">
        <select id="habilitado" name="habilitado" placeholder="Estado" class="form-control" >
          <option value = "HABILITADO">HABILITAR</option>
          <option value = "INHABILITADO">INHABILITAR</option>
        </select>
        <label>Estado de Especialidad</label>
      </div>
     </div>
    <div class="input-group col-md-12 col-xs-12">
      <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa  fa-medkit bigicon"></i></span>
      <span align="center" class="col-md-6 col-xs-10 has-float-label">
      <div align="center" class="group-control">
        <select id="consultorios_id" name="consultorios_id"  placeholder = "Código del Consultorio" class="form-control" required="">
          @foreach($consultorios as $consultorio)
            @if($consultorio->estado == "HABILITADO")
              <option>{{$consultorio->id}}</option>
            @endif
          @endforeach
        </select>
        <label>Código del Consultorio</label>
      </div>
      </div>
        <div class="form-group">
          <div class="col-md-12 text-center">
            <a data-target="#confirmar" data-toggle="modal" style="width:80px" class="btn btn-success" align="center" class="form-control" value="Guardar">Guardar</a>
            <button type="reset" style="width:80px" class="btn btn-primary" align="center" class="form-control" >Limpiar</button>
          </div>
        </div></br></br>

        <div class="modal fade modal-slide-in-rigth" aria-hidden="true" role="dialog" tabindex="-1" id="confirmar">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-Label="Close">
                  <span aria-hidden="true">X</span>
                </button>
                <h3 class="modal-title">Agregar Especialidad</h3>
              </div>
              <div class="modal-body">
                <p>¿Desea agregar este especialidad?</p>
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
