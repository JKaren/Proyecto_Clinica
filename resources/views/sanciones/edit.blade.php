@extends('sanciones.mantenimiento_sanciones')

@section('Titulo')
<i class="fa fa-gear fa-fw"></i>
<a1>Mantenimiento de Sanciones<a1>
@endsection
@section('Contenido')
        <form method="POST" action="/sanciones/{{ $sanciones->id_sancion }}" autocomplete="off">
          {{csrf_field()}}
          {{method_field('PUT')}}
            <fieldset>
            <div class="text-center"><h2 align="center">Modificar sanciones</h2>
            </div>
            @include('partials/errores')
            </br>

            <div class="input-group col-md-12 col-xs-12">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-th bigicon"></i></span>
                <span align="center" class="col-md-6 col-xs-10 has-float-label">
                  <div align="center" class="group-control">
                    <input class = "form-control"type="text" name="id_cita" value="{{$sanciones->id_cita}}" readonly="">
                    <label>Código Cita</label>
                  </div>
            </div></br>
            <div class="input-group col-md-12 col-xs-12">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-slack bigicon"></i></span>
                <span align="center" class="col-md-6 col-xs-10 has-float-label">
                  <div align="center" class="group-control">
                    <input type="text" name="id_sancion" value="{{$sanciones->id_sancion}}" readonly="" class="form-control">
                    <label>Código Sanción</label>
                  </div>
            </div></br>
            <div class="input-group col-md-12 col-xs-12">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-calendar bigicon"></i></span>
                <span align="center" class="col-md-6 col-xs-10 has-float-label">
                  <div align="center" class="group-control">
                      <input id="fecha_sancion" type ="date" name="fecha_sancion" placeholder="Fecha de la sancion" class="form-control" value="{{$sanciones->fecha_sancion}}" required >
                      <label>Fecha de la Sancion</label>
                  </div>
            </div>

            <div class="form-group">
                  <div class="col-md-12 text-center">
                      <a data-target="#confirmar-{{ $sanciones->id_sancion }}" data-toggle="modal" style="width:80px" class="btn btn-success" align="center" class="form-control" value="Guardar">Guardar</a>
                      <button type="reset" style="width:80px" class="btn btn-primary" align="center" class="form-control" >Limpiar</button>

                  </div>

            </div></br></br>
            <div class="modal fade modal-slide-in-rigth" aria-hidden="true"
              role="dialog" tabindex="-1" id="confirmar-{{$sanciones->id_sancion}}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-Label="Close">
                        <span aria-hidden="true">X</span>
                      </button>
                      <h3 class="modal-title">Modificar Sancion</h3>
                    </div>
                    <div class="modal-body">
                      <p>Esta seguro si desea modificar la sancion ?</p>
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
