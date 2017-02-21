@extends('tipo_sancion.mantenimiento_tipo_sancion')

@section('estilos')

@endsection

@section('Titulo')
    <i class="fa fa-gear fa-fw"></i>
    <a1>Agregar Tipo Sancion<a1>
@endsection

@section('Contenido')

    <form role="form" method="post" action="/tipo_sancion">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
            <fieldset>
            <div class="text-center"><h2 align="center">Agregar Tipo Sancion</h2>
            </div>
            @include('partials/errores')
            </br>

            <div class="input-group col-md-12 col-xs-12">
              <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-plus-square bigicon"></i></span>
              <span align="center" class="col-md-6 col-xs-10 has-float-label">
                      <div class="col-md-6 col-xs-10">
                      <input id="id_tipo_sancion" name="id_tipo_sancion" placeholder="Id_tipo_sancion" class="form-control" value="{{old('id_tipo_sancion')}}">
                      <label>Id Tipo Sanción</label>
                  </div>
            </div>

            <div class="input-group col-md-12 col-xs-12">
              <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-plus-square bigicon"></i></span>
              <span align="center" class="col-md-6 col-xs-10 has-float-label">
                  <div class="col-md-6 col-xs-10">
                      <input id="descripcion" name="descripcion" placeholder="descripcion" class="form-control" value="{{old('descripcion')}}">
                      <label>Descripción</label>
                  </div>
                 </div>
             <div class="input-group col-md-12 col-xs-12">
               <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-plus-square bigicon"></i></span>
               <span align="center" class="col-md-6 col-xs-10 has-float-label">
                  <div class="col-md-6 col-xs-10">
                      <input id="tiempo" name="tiempo" placeholder="tiempo" class="form-control" value={{old('tiempo')}}>
                      <label>Tiempo</label>
                  </div>
            </div>

            <div class="input-group col-md-12 col-xs-12">
              <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-bitbucket bigicon"></i></span>
              <span align="center" class="col-md-6 col-xs-10 has-float-label">
              <div align="center" class="group-control">
                <select id="estado" name="estado"  class="form-control" value="{{old('estado')}}" >
                  <option>HABILITADO</option>
                  <option>INHABILITADO</option>
                </select>
                <label>Estado</label>
              </div>
            </div></br>

            <div class="form-group">
                  <div class="col-md-12 text-center">
                      <input type="submit" style="width:80px" class="btn btn-success" align="center" class="form-control" value="Agregar">
                      <button type="reset" style="width:80px" class="btn btn-primary" align="center" class="form-control" >Limpiar</button>

                  </div>
            </div></br></br>

            </fieldset>

       </form>

@endsection

@section('js')

@endsection

@section('js_scripts')

@endsection
