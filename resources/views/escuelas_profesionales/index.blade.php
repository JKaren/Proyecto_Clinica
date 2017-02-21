@extends('escuelas_profesionales.mantenimiento_escuelas_profesionales')

@section('estilos')

<!-- DataTables CSS -->

    <script src={{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}></script>
    <!-- DataTables Responsive CSS -->

    <script src={{ URL::asset('bower_components/datatables-responsive/css/dataTables.responsive.css') }}></script>
@endsection

@section('Titulo')
<i class="fa fa-gear fa-fw"></i>
<a1><font size=5>Mantenimiento de Escuelas Profesionales</font><a1>
@endsection

@section('Contenido')
        <div class="dataTable_wrapper table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr bgcolor="26b99a">
                                            <th><font color="white">ID</font></th>
                                            <th><font color="white">Nombre</font></th>
                                            <th><font color="white">Estado</font></th>
                                            <th><font color="white">Operaciones</font></th>
                                            </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($escuelas_profesionales as $escuela_profesional)

                                        <tr class="odd gradeA" rol="row">
                                            <td>{{$escuela_profesional-> id }}</td>
                                            <td>{{$escuela_profesional-> nombre }}</td>
                                            <td>{{$escuela_profesional-> estado }}</td>
                                            <td align="center">
                                                <button type="button" class="btn btn-success btn-sm"
                                                onClick="location.href='/escuelas_profesionales/{{ $escuela_profesional->id }}/edit'">
                                                Editar</button>
                                                @if($escuela_profesional->estado =='HABILITADO')
                                                    <button data-target="#confirmar-{{ $escuela_profesional->id }}"data-toggle="modal" class="btn btn-danger btn-sm">Inhabilitar</button>
                                                @else
                                                    <button data-target="#confirmar-{{ $escuela_profesional->id }}" style="width:80px"data-toggle="modal" class="btn btn-warning btn-sm">Habilitar</button>

                                                @endif

                                            </td>
                                        </tr>
                                        <div class="modal fade modal-slide-in-rigth" aria-hidden="true"
                                          role="dialog" tabindex="-1" id="confirmar-{{$escuela_profesional->id}}">
                                          <form action="/escuelas_profesionales/{{ $escuela_profesional->id }}" method="post">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-Label="Close">
                                                    <span aria-hidden="true">X</span>
                                                  </button>
                                                  <h3 class="modal-title">Estado del Escuela Profesional</h3>
                                                </div>
                                                <div class="modal-body">
                                                  @if($escuela_profesional->estado == 'HABILITADO')
                                                    <p>Esta seguro que desea INHABILITAR la escuela profesional</p>
                                                  @else
                                                    <p>Esta seguro que desea HABILITAR la escuela profesional</p>
                                                  @endif

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                                      {{ csrf_field() }}
                                                      {{ method_field('DELETE')}}
                                                    <button type="submit" style="width:80px" class="btn btn-success">Si</button>
                                                </div>
                                              </div>
                                            </div>
                                            </form>
                                        </div>

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
