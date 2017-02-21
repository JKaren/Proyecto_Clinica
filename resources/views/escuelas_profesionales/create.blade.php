@extends('escuelas_profesionales.mantenimiento_escuelas_profesionales')

@section('Titulo')
<i class="fa fa-gear fa-fw"></i>
<a1>Mantenimiento de escuelas_profesionales<a1>
@endsection
@section('Contenido')
      <form role="form" method="post" action="/escuelas_profesionales" autocomplete="off">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <fieldset>

            <div class="text-center"><h2 align="center">Agregar Escuela Profesional</h2>
            </div>
            @include('partials/errores')
            </br>

            <div class="input-group col-md-12 col-xs-12">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-mortar-board bigicon"></i></span>
                <span align="center" class="col-md-6 col-xs-10 has-float-label">
                  <div align="center" class="group-control">
                    <input id="id" name="id" placeholder="Código de Escuela Profesional" class="form-control" value="{{old('id')}}" required maxlength="2" size="2">
                    <label>Código de Escuela Profesional</label>
                  </div>
            </div></br>

            <div class="input-group col-md-12 col-xs-12">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-university bigicon"></i></span>
                <span align="center" class="col-md-6 col-xs-10 has-float-label">
                  <div align="center" class="group-control">
                    <input id="nombre" name="nombre" placeholder="Nombre de Escuela Profesional" value="{{old('nombre')}}" class="form-control" required>
                    <label>Nombre de Escuela Profesional</label>
                  </div>
            </div></br>

            <div class="input-group col-md-12 col-xs-12">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-cog bigicon"></i></span>
                <span align="center" class="col-md-6 col-xs-10 has-float-label">
                  <div align="center" class="group-control">
                      <select id="Estado" name="estado" placeholder="Estado" class="form-control" value="{{old('estado')}}">
                          <option>HABILITADO</option>
                          <option>INHABILITADO</option>
                      </select>
                      <label>Estado de Escuela Profesional</label>

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
                      <h3 class="modal-title">Agregar Escuela Profesional</h3>
                    </div>
                    <div class="modal-body">
                      <p>¿ Esta seguro si desea agregar los datos del al escuela profesional ?</p>
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
