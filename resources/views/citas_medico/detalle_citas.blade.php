@extends('Citas_heredar')

@section('Titulo')
<i class="fa fa-gear fa-fw"></i>
<a1>HISTORIAL DETALLE <a1>
@endsection
@section('Mantenimiento')
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">

              <i class="fa fa-gear fa-fw"></i>
              <a1>HIstorial Detalle<a1>
        </div>
        <div class="panel-body">
        <div >
        @yield('Contenido')

        <form role="form" method="post" action="/medcitas/citadetalle/{{$idcita}}/{{$idhistorial}}/">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
            <fieldset>
                <div class="text-center"><h2 align="center">HISTORIAL </h2>
              </div></br>

            </div>
            <div class="input-group col-md-12 col-xs-12">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-user-md bigicon"></i></span>
                <span align="center" class="col-md-6 col-xs-10 has-float-label">
                  <div align="center" class="group-control">
                    <input id="Estatura" name="Estatura" placeholder="Estatura" class="form-control"  value="{{$estatura}}" required>
                    <label>Estatura</label>
                  </div>
            </div>
            <div class="input-group col-md-12 col-xs-12">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-user-md bigicon"></i></span>
                <span align="center" class="col-md-6 col-xs-10 has-float-label">
                  <div align="center" class="group-control">
                    <input id="Peso" name="Peso" placeholder="Peso" class="form-control" value="{{$peso}}" required>
                    <label>Peso</label>
                  </div>
            </div>
            <div class="input-group col-md-12 col-xs-12">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-user-md bigicon"></i></span>
                <span align="center" class="col-md-6 col-xs-10 has-float-label">
                  <div align="center" class="group-control">
                    <input id="Presion" name="Presion" placeholder="Presion" class="form-control" value="{{$presion}}" required>
                    <label>Presion</label>
                  </div>
            </div>

            <div class="input-group col-md-12 col-xs-12">
              <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-user-md bigicon"></i></span>
              <span align="center" class="col-md-6 col-xs-10 has-float-label">
                <div align="center" class="group-control">
                  <input id="Descripcion" name="Descripcion" placeholder="Descripción" class="form-control" value=""  required>
                  <label>Descripción</label>
                </div>
          </div>

              <div class="form-group">
                    <div class="col-md-12 text-center">
                        <input type="submit" style="width:80px" class="btn btn-success" align="center" class="form-control" value="Guardar">
                        <button type="reset" style="width:80px" class="btn btn-primary" align="center" class="form-control" >Limpiar</button>

                    </div>
              </div></br></br>


            </fieldset>


       </form>
  </div>
  </div>
  </div>
  </div>
@endsection

@section('js')
<!-- DataTables JavaScript -->
    <script src={{ URL::asset('bower_components/DataTables/media/js/jquery.dataTables.min.js') }}></script>

    <script src={{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}></script>

@endsection

@section('js_scripts')
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
</script>



@endsection
