@extends('historiales_medicos_detalles.mantenimiento_historiales_medicos_detalles')

@section('estilos')

<!-- DataTables CSS -->

    <script src={{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}></script>
    <!-- DataTables Responsive CSS -->

    <script src={{ URL::asset('bower_components/datatables-responsive/css/dataTables.responsive.css') }}></script>
@endsection

@section('Titulo')
<i class="fa fa-gear fa-fw"></i>
<a1>Mantenimiento de Historiales Médicos Detalles<a1>
@endsection

@section('Contenido')
        <div class="dataTable_wrapper table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Id Historial Medico Detalle</th>
                                            <th>Id Historial</th>
                                            <th>Estatura</th>
                                            <th>Peso</th>
                                            <th>Presión</th>
                                            <th>Fecha</th>
                                            <th>DNI Medicos</th>
                                            <th>Operaciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($historiales_medicos_detalles as $historial_medico_detalle)

                                        <tr class="odd gradeA" rol="row">
                                            <td>{{ $historial_medico_detalle-> id_historial_medico}}</td>
                                            <td>{{ $historial_medico_detalle-> id_historial}}</td>
                                            <td>{{ $historial_medico_detalle-> estatura }}</td>
                                            <td>{{ $historial_medico_detalle-> peso }}</td>
                                            <td>{{ $historial_medico_detalle-> presion }}</td>
                                            <td>{{ $historial_medico_detalle-> fecha}}</td>
                                            <td>{{ $historial_medico_detalle-> medicos_dni }}</td>


                                            <td align="center">
                                                <button type="button" class="btn btn-success btn-xs"
                                                onClick="location.href='/historiales_medicos_detalles/{{ $historial_medico_detalle-> id_historial_medico }}/edit'">
                                                Editar</button>


                                                  <form action="/historiales_medicos_detalles/{{ $historial_medico_detalle-> id_historial_medico }}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE')}}
                                                    <button class="btn btn-danger btn-xs">Eliminar</button>
                                                  </form>

                                            </td>
                                        </tr>

                                    @endforeach



                                    </tbody>
                                </table>
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
