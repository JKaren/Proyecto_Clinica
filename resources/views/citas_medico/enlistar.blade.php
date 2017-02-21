@extends('principal')

@section('estilos')


@section('estilos')

<!-- DataTables CSS -->

    <script src={{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}></script>
    <!-- DataTables Responsive CSS -->

    <script src={{ URL::asset('bower_components/datatables-responsive/css/dataTables.responsive.css') }}></script>
@endsection

@section('Titulo')
<i class="fa fa-gear fa-fw"></i>
<a1>Historial paciente<a1>
@endsection
@section('Mantenimiento')
        <div class="dataTable_wrapper table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>

                        <td>cirugias</td>
                        <td>alergias</td>
                        <td>antecedentes</td>




                    </tr>
                </thead>
                <tbody>

                  @foreach($tablas as $tabla)

                      <tr class="odd gradeA" rol="row">
                          <td>{{$tabla-> cirugias }}</td>
                          <td>{{$tabla-> alergias }}</td>
                          <td>{{$tabla-> antecedentes }}</td>



                      </tr>

                  @endforeach



                </tbody>
            </table>
            <td align="center">

                <a href="{{ URL::previous() }}" class="btn btn-success btn-xs">Volver</a>

            </td>
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
