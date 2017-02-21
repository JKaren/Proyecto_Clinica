@extends('sancion.Mantenimiento')

@section('estilos')
      <script src={{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}></script>
      <script src={{ URL::asset('bower_components/datatables-responsive/css/dataTables.responsive.css') }}></script>
@endsection

@section('Titulo')
      <i class="fa fa-gear fa-fw"></i>
      <a1>Mantenimiento de Sancion<a1>
@endsection

@section('Contenido')

      <div class="panel-body">
          <div class="dataTable_wrapper">
              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                      <tr>
                          <th>DNI</th>
                          <th>Telefono</th>
                          <th>Email</th>
                          <th>Dirección</th>
                          <th>Estado</th>
                          <th>ID_Historial</th>
                          <th>Operaciones</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($sancion as $sancio)
                      <tr class="odd gradeX">
                          <td>{{ $sancio->dni }}</td>
                          <td>{{ $sancio->telefono }}</td>
                          <td>{{ $sancio->correo }}</td>
                          <td>{{ $sancio->direccion }}</td>
                        @if($sancio->habilitado=="1")
                          <td>Habilitado</td>
                        @else
                          <td>Deshabilitado</td>
                        @endif
                          <td>{{ $sancio->historiales_medicos_id }}</td>

                          <td align="center">
                            <button type="button" class="btn btn-success btn-xs"
                            onClick="location.href='/sancion/{{ $sancio->dni }}/edit'">
                            Editar</button>
                               <form action="/sancion/{{ $sancio->dni }}" method="post">
                                 {{ csrf_field() }}
                                 {{ method_field('DELETE')}}
                                 <button class="btn btn-danger btn-xs">Eliminar</button>
                               </form>

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
