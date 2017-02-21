@extends('Citas_heredar')
@section('estilos')
<!-- DataTables CSS -->

    <script src={{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}></script>
    <!-- DataTables Responsive CSS -->

    <script src={{ URL::asset('bower_components/datatables-responsive/css/dataTables.responsive.css') }}></script>
@section('estilos')

<!-- DataTables CSS -->

    <script src={{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}></script>
    <!-- DataTables Responsive CSS -->

    <script src={{ URL::asset('bower_components/datatables-responsive/css/dataTables.responsive.css') }}></script>
@endsection

@section('Titulo')
<i class="fa fa-gear fa-fw"></i>
<a1>Citas Médicos<a1>
@endsection
@section('Mantenimiento')
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
        </div>
        <div class="panel-body">
          <div >
                @yield('Contenido')
                <div class="text-center"><h1 align="center">Citas del Dia de Hoy</h1>
                </div></br>

                <div class="dataTable_wrapper table-responsive">
                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                      <tr bgcolor="26b99a">
                        <td><font color="white">Hora</td>
                        <td><font color="white">DNI</td>
                        <td><font color="white">Nombres</td>
                        <td><font color="white">Apellidos</td>
                        <td><font color="white">Tipo</td>
                        <td><font color="white">Sancionar</td>
                        <td><font color="white">Historial</td>
                        <td><font color="white">Continuar</td>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($tablas as $tabla)
                      <tr class="odd gradeA" rol="row">
                          <td>{{$tabla-> hora_inicio }}</td>
                          <td>{{$tabla-> dni }}</td>
                          <td>{{$tabla-> nombres }}</td>
                          <td>{{$tabla-> apellidos }}</td>
                          <td>{{$tabla-> tipo_paciente }}</td>
                            @if($tabla->estado=="CONCLUIDO")
                            <td align="center">
                              <a href="" class="btn btn-warning btn-xs" disabled="true">Sancionar</a>
                            </td>
                            <td align="center">
                              <a href="/medcitas/{{ $tabla->dni }}/historial" class="btn btn-warning btn-xs">Historial</a>
                            </td>
                            <td align="center">
                              <a href="" class="btn btn-warning btn-xs" disabled="true">Siguiente</a>
                            </td>
                            @elseif($tabla->estado=="PENDIENTE")
                            <td align="center">
                              <a href="/medcitas/{{ $tabla->id }}/sancionar" class="btn btn-success btn-xs" >Sancionar</a>
                            </td>
                            <td align="center">
                                <a href="/medcitas/{{ $tabla->dni }}/historial" class="btn btn-success btn-xs">Historial</a>
                            </td>
                            <td align="center">
                                <a href="/medcitas/citadetalle/{{$tabla->id}}/" class="btn btn-success btn-xs">Siguiente</a>

                            </td>
                            @elseif($tabla->estado=="SANCIONADO")
                            <td align="center">
                              <a class="btn btn-danger btn-xs" disabled="true">Sancionado</a>
                            </td>
                            <td align="center">
                                <a href="/medcitas/{{ $tabla->dni }}/historial" class="btn btn-danger btn-xs">Historial</a>
                            </td>
                            <td align="center">
                                <a href="/medcitas/citadetalle/{{$tabla->id}}/" class="btn btn-danger btn-xs" >Siguiente</a>
                            </td>
                            @ENDIF
                      </tr>
                  @endforeach
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
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
