@extends('Principal')

@section('estilos')

<!-- DataTables CSS -->

    <script src={{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}></script>
    <!-- DataTables Responsive CSS -->

    <script src={{ URL::asset('bower_components/datatables-responsive/css/dataTables.responsive.css') }}></script>
@endsection

@section('Mantenimiento')
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">

              <i class="fa fa-gear fa-fw"></i>
              <a1><font size=5>Seleccionar Medicos</font><a1>
        </div>
        <div class="panel-body">
            <div >
                @yield('Contenido')
        <div class="dataTable_wrapper table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr bgcolor="#D9534F">
                                          <th><font color="white">DNI</font></th>
                                          <th><font color="white">Código</font></th>
                                          <th><font color="white">Nombres</font></th>
                                          <th><font color="white">Apellidos</font></th>
                                          <th><font color="white">Especialidad</font></th>
                                          <th><font color="white">Operaciones</font></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($t as $medico)

                                        <tr class="odd gradeA" rol="row">
                                            <td>{{ $medico-> dni }}</td>
                                            <td>{{ $medico-> codigo }}</td>
                                            <td>{{ $medico-> nombres }}</td>
                                            <td>{{ $medico->apellidos }}</td>
                                            <td>{{ $medico->especialidades_codigo }}</td>
                                            <td align="center">
                                                <button type="button" class="btn btn-success btn-xs"
                                                onClick="location.href='/medhorarios/{{ $medico->dni }}/horario'">
                                                Continuar</button>

                                            </td>
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
