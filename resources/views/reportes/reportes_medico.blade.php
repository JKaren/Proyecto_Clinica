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
              <i class="fa fa-gear fa-fw"></i>
              <a1>Reportes <a1>
        </div>
        <div class="panel-body">
          <div >
                @yield('Contenido')
                <div class="text-center"><h1 align="center">REPORTES DEL MEDICO</h1>
            </div></br>
                <div class="clearfix"></div>

              <td align="center">
                  <div class="text-center"><h2 align="center">VER REPORTE -- Citas Por medico<a href="/CitasPorMedico1" class="btn btn-success btn-xx">Ver Reporte</a></h2>
              </td>
              <td align="center">
                  <div class="text-center"><h2 align="center">VER REPORTE-- Horario Medicos : <a href="/HoraMedico" class="btn btn-success btn-xx">Ver Reporte</a></h2>
              </td>
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
