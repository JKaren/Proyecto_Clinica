@extends('tipo_sancion.mantenimiento_tipo_sancion')

@section('Contenido')
<form method="POST" action="/tipo_sancion/{{ $tipo_sancio->id_tipo_sancion }}" autocomplete="off">
{{csrf_field()}}
{{method_field('PUT')}}
  <fieldset>
    <div class="text-center"><h2 align="center">MODIFICAR TIPO SANCIÓN</h2>
    </div>
    @include('partials/errores')
    </br>

    <div class="input-group col-md-12 col-xs-12">
      <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-plus-square bigicon"></i></span>
      <span align="center" class="col-md-6 col-xs-10 has-float-label">
      <div align="center" class="group-control">
        <input id="id_tipo_sancion" name="id_tipo_sancion" placeholder="Código del tipo Sancion" class="form-control" value="{{$tipo_sancio->id_tipo_sancion}}" required disabled="true">
        <label>Código del Tipo Sancion</label>
      </div>
    </div>

    <div class="input-group col-md-12 col-xs-12">
      <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-h-square bigicon"></i></span>
      <span align="center" class="col-md-6 col-xs-10 has-float-label">
      <div align="center" class="group-control">
        <input id="descripcion" name="descripcion" placeholder="descripcion de tipo sancion" class="form-control" value="{{$tipo_sancio->descripcion}}" required>
        <label>Descripcion</label>
      </div>
    </div>

    <div class="input-group col-md-12 col-xs-12">
      <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-h-square bigicon"></i></span>
      <span align="center" class="col-md-6 col-xs-10 has-float-label">
      <div align="center" class="group-control">
        <input id="tiempo" name="tiempo" placeholder="tiempo de la Sancion" class="form-control" value="{{$tipo_sancio->tiempo}}" required>
        <label>tiempo</label>
      </div>
    </div>

    <div class="input-group col-md-12 col-xs-12">
      <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-bitbucket bigicon"></i></span>
      <span align="center" class="col-md-6 col-xs-10 has-float-label">
      <div align="center" class="group-control">
        <select id="estado" name="estado" placeholder="Estado del Tipo Sanción" class="form-control" >
          @if($tipo_sancio->estado == "HABILITADO")
            <option selected value = "HABILITADO">HABILITADO</option>
            <option value="INHABILITADO">INHABILITADO</option>
          @else
            <option value="HABILITADO">HABILITADO</option>
            <option selected value = "INHABILITADO">INHABILITADO</option>
          @endif
        </select>
         <label>Estado del Tipo Sanción</label>
      </div>
    </div></br>

    <div class="form-group">
      <div class="col-md-12 text-center">
        <a data-target="#confirmar-{{ $tipo_sancio->id_tipo_sancion }}" data-toggle="modal" style="width:80px"
          class="btn btn-success" align="center" class="form-control" value="Guardar" >Guardar</a>
        <button type="reset" style="width:80px" class="btn btn-primary" align="center" class="form-control" >Limpiar</button>
      </div>
    </div></br>

    <div class="modal fade modal-slide-in-rigth" aria-hidden="true" role="dialog" tabindex="-1" id="confirmar-{{$tipo_sancio->id_tipo_sancion}}">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-Label="Close">
              <span aria-hidden="true">X</span>
            </button>
            <h3 class="modal-title">Modificar Tipo Sancion</h3>
          </div>
          <div class="modal-body">
            <p>¿Desea guardar los cambios efectuados en este tipo sancion?</p>
            <p>Id_tipo_sancion: {{$tipo_sancio->id_tipo_sancion}}</p>
            <p>Descipcion: {{$tipo_sancio->descripcion}}</p>
            <p>Tiempo: {{$tipo_sancio->tiempo}}</p>
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
