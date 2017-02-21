@extends('sanciones.mantenimiento_sanciones')

@section('estilos')
      <script src={{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}></script>
      <script src={{ URL::asset('bower_components/datatables-responsive/css/dataTables.responsive.css') }}></script>
@endsection

@section('Titulo')
      <i class="fa fa-gear fa-fw"></i>
      <a1>Mantenimiento de Sanciones<a1>
@endsection

@section('Contenido')
      <div class="panel-body">
          <div class="dataTable_wrapper">
              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                      <tr bgcolor="26b99a">
                        <th><font color="white">Código Sanción</font></th>
                        <th><font color="white">Código Cita</font></th>
                        <th><font color="white">Fecha Sanción</font></th>
                        <th><font color="white">Operaciones</font></th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($sanciones as $sancion)
                      <tr class="odd gradeX">
                          <td>{{ $sancion->id_sancion }}</td>
                          <td>{{ $sancion->id_cita }}</td>
                          <td>{{ $sancion->fecha_sancion }}</td>
                          <td align="center">
                            <button type="button" class="btn btn-success btn-sm"
                            onClick="location.href='/sanciones/{{ $sancion->id_sancion }}/edit'">
                            Editar</button>

                           </td>
                      </tr>
                    @endforeach
                  </tbody>
              </table>
          </div
      </div>
@endsection

@section('js')
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
