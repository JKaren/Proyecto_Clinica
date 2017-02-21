@extends('escuelas_profesionales.mantenimiento_escuelas_profesionales')

@section('Titulo')
<i class="fa fa-gear fa-fw"></i>
<a1>Mantenimiento de Escuelas Profesionales<a1>
@endsection
@section('Contenido')
        <form method="POST" action="/escuelas_profesionales/{{ $escuela_profesional->id }}" autocomplete="off">
          {{csrf_field()}}
          {{method_field('PUT')}}

            <fieldset>

            <div class="text-center"><h2 align="center">Modificar Escuela Profesional</h2>
            </div>
              @include('partials/errores')
            </br>


            <div class="input-group col-md-12 col-xs-12">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-mortar-board bigicon"></i></span>
                <span align="center" class="col-md-6 col-xs-10 has-float-label">
                  <div align="center" class="group-control">
                    <input id="id" name="id" placeholder="Código de Escuela Profesional" class="form-control" value="{{$escuela_profesional->id}}" required maxlength="2" size="2" readonly>
                    <label>Código de Escuela Profesional</label>
                  </div>
            </div></br>

            <div class="input-group col-md-12 col-xs-12">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-university bigicon"></i></span>
                <span align="center" class="col-md-6 col-xs-10 has-float-label">
                  <div align="center" class="group-control">
                    <input id="nombre" name="nombre" placeholder="Nombre de Escuela Profesional" class="form-control" value="{{$escuela_profesional->nombre}}"required>
                    <label>Nombre de Escuela Profesional</label>
                  </div>
            </div></br>

            <div class="input-group col-md-12 col-xs-12">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-cog bigicon"></i></span>
                <span align="center" class="col-md-6 col-xs-10 has-float-label">
                  <div align="center" class="group-control">
                      <select id="Estado" name="estado" placeholder="Estado" class="form-control" value="{{$escuela_profesional->estado}}">

                        @if($escuela_profesional->estado == 'HABILITADO')
                          <option selected value="HABILITADO" >HABILITADO</option>
                          <option value="INHABILITADO">INHABILITADO</option>
                        @else
                          <option selected value="INHABILITADO" >INHABILITADO</option>
                          <option  value="HABILITADO" >HABILITADO</option>
                        @endif
                      </select>
                      <label>Estado de Escuela Profesional</label>
                  </div>
            </div></br></br>


            <div class="form-group">
                  <div class="col-md-12 text-center">
                    <a data-target="#confirmar-{{ $escuela_profesional->id }}" data-toggle="modal" style="width:80px" class="btn btn-success" align="center" class="form-control" value="Guardar" >Guardar</a>
                    <button type="reset" style="width:80px" class="btn btn-primary" align="center" class="form-control" >Limpiar</button>

                  </div>
            </div></br></br>

            <div class="modal fade modal-slide-in-rigth" aria-hidden="true"
              role="dialog" tabindex="-1" id="confirmar-{{$escuela_profesional->id}}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-Label="Close">
                        <span aria-hidden="true">X</span>
                      </button>
                      <h3 class="modal-title">Modificar Escuela Profesional</h3>
                    </div>
                    <div class="modal-body">
                      <p>Esta seguro si desea modificar los datos de la escuela profesional ?</p>
                      <p>Codigo:        {{$escuela_profesional->id}}</p>
                      <p>Nombre:       {{$escuela_profesional->nombre}}</p>
                      <p>Estado:        {{$escuela_profesional->estado}}</p>
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
