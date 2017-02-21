@extends('Citas_heredar')

@section('Titulo')
<i class="fa fa-gear fa-fw"></i>
<a1>Sancionar<a1>
@endsection
@section('Mantenimiento')
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">

              <i class="fa fa-gear fa-fw"></i>
              <a1>Sancion<a1>
        </div>
        <div class="panel-body">
        <div >
        @yield('Contenido')

        <form role="form" method="post" action="/medcitas/cita/citSancion/{{$tablas->id}}">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
            <fieldset>
              <div class="text-center"><h2 align="center">Crear sanciones</h2>
              </div></br>

            <div class="input-group col-md-12 col-xs-12">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-user-md bigicon"></i></span>
                <span align="center" class="col-md-6 col-xs-10 has-float-label">
                  <div align="center" class="group-control">
                    <input id="Id_tipo_sancion" name="Id_tipo_sancion" placeholder="tipo Sancion" class="form-control" readonly="readonly" required>
                    <label>tipo Sancion</label>
                  </div>
            </div>
            <div class="input-group col-md-12 col-xs-12">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-user-md bigicon"></i></span>
                <span align="center" class="col-md-6 col-xs-10 has-float-label">
                  <div align="center" class="group-control">
                    <input id="Duracion" name="Duracion" placeholder="Duracion" class="form-control" disabled="true" required>
                    <label>Duracion</label>
                  </div>
            </div>
            <div class="input-group col-md-12 col-xs-12">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-user-md bigicon"></i></span>
                <span align="center" class="col-md-6 col-xs-10 has-float-label">
                  <div align="center" class="group-control">
                    <input id="Descripcion" name="Descripcion" placeholder="Descripcion" class="form-control" disabled="true" required>
                    <label>Descripcion</label>
                  </div>
            </div>
              <div class="dataTable_wrapper table-responsive">
                                      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                          <thead>
                                              <tr>
                                                <th>Seleccionar</th>
                                                <th>tiempo</th>
                                                <th>descripcion</th>
                                              </tr>
                                          </thead>
                                          <tbody>

                                          @foreach($tablas2 as $t)

                                              <tr class="odd gradeA" rol="row">
                                                <td align="center">
                                                    <button type="button" class="btn btn-success btn-xs"
                                                    onClick="cambiarTexto('{{$t->tiempo}}','{{$t->descripcion}}','{{$t->id_tipo_sancion}}')">
                                                    Elegir</button>

                                                </td>
                                                  <td>{{ $t-> tiempo }} dias</td>
                                                  <td>{{ $t-> descripcion }}</td>


                                              </tr>

                                          @endforeach
                                          </tbody>
                                      </table>
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
<script>
    function cambiarTexto(duracion,descripcion,id) {
     document.getElementById('Descripcion').value = descripcion;
     document.getElementById('Duracion').value = duracion;
     document.getElementById('Id_tipo_sancion').value = id;
}
</script>

@endsection
