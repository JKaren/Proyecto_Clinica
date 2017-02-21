@extends('principal')
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
                <div class="text-center"><h1 align="center">REPORTES DEL ADMINISTRADOR DEL  SISTEMA</h1>
            </div></br>
                <div class="clearfix"></div>

              <td >
                  <div ><h2 >VER REPORTE -- Pacientes Atendidos Por Especialidad : <a href="/PacientesAtendidosEspecialida" class="btn btn-success btn-xx">VER REPORTE</a></h2>
              </td>
              <td >
                  <div ><h2 >VER REPORTE -- Citas Por Médico : <a href="/CitasPorMedico" class="btn btn-success btn-xx">VER REPORTE</a></h2>
              </td>
              <td >
                  <div><h2>VER REPORTE -- Citas  Por Consultorio y Por Especialidad : <a href="/CitasConsulEspeci" class="btn btn-success btn-xx">VER REPORTE</a></h2>
              </td>
              <td >
                  <div><h2>VER REPORTE -- Citas  Canceladas : <a href="/CitasCanceladas" class="btn btn-success btn-xx">VER REPORTE</a></h2>
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
