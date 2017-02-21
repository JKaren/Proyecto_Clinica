@extends('Pacientes.mantenimiento_pacientes')

@section('estilos')

<!-- DataTables CSS -->

    <script src={{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}></script>
    <!-- DataTables Responsive CSS -->

    <script src={{ URL::asset('bower_components/datatables-responsive/css/dataTables.responsive.css') }}></script>
@endsection



@section('Contenido')
        <div class="dataTable_wrapper table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr bgcolor="26b99a">
                        <th><font color="white">DNI</font></th>
                        <th><font color="white">Tipo Paciente</font></th>
                        <th><font color="white">Código</font></th>
                        <th><font color="white">Nombres</font></th>
                        <th><font color="white">Apellidos</font></th>
                        <th><font color="white">Telefono</font></th>
                        <th><font color="white">Dirección</font></th>
                        <th><font color="white">Email</font></th>
                        <th><font color="white">Carrera Profecional</font></th>
                        <th><font color="white">Estado</font></th>
                        <th><font color="white">Operaciones</font></th>
                    </tr>
                </thead>
                <tbody>

                @foreach($pacientes as $paciente)

                    <tr class="odd gradeA" rol="row">
                        <td>{{ $paciente-> dni }}</td>
                        <td>{{ $paciente-> tipo_paciente }}</td>
                        <td>{{ $paciente-> codigo }}</td>
                        <td>{{ $paciente-> nombres }}</td>
                        <td>{{ $paciente-> apellidos }}</td>
                        <td>{{ $paciente-> telefono }}</td>
                        <td>{{ $paciente-> direccion }}</td>
                        <td>{{ $paciente-> correo }}</td>
                        <td>{{ $paciente-> escuelas_profesionales_id }}</td>
                        <td>{{ $paciente-> estado }}</td>

                        <td align="center">
                            <button style="width:77px"  type="button" class="btn btn-success btn-sm"
                            onClick="location.href='#confirmar-/pacientes/{{ $paciente->dni }}/edit'">   Editar   </button>
                            <br>
                            @if($paciente->estado =='HABILITADO')
                                <button data-target="{{$paciente->dni }}"  data-toggle="modal" class="btn btn-danger btn-sm"
                                onClick="location.href='/pacientes/{{ $paciente->dni }}/inhabilitar'">   Inhabilitar   </button>
                            @else
                                <button data-target="{{$paciente->dni }}"  style="width:80px"data-toggle="modal" class="btn btn-warning btn-sm"
                                onClick="location.href='/pacientes/{{ $paciente->dni }}/habilitar'">   Habilitar   </button>

                            @endif

                        </td>
                    </tr>
                    <div class="modal fade modal-slide-in-rigth" aria-hidden="true"
                      role="dialog" tabindex="-1" id="confirmar-{{$paciente->dni}}">
                      <form action="/pacientes/{{ $paciente->dni }}" method="post">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-Label="Close">
                                <span aria-hidden="true">X</span>
                              </button>
                              <h3 class="modal-title">Estado del Paciente</h3>
                            </div>

                            <div class="modal-body">
                              @if($paciente->estado == 'HABILITADO')
                                <p>Esta seguro que desea INHABILITAR el Paciente</p>
                              @else
                                <p>Esta seguro que desea HABILITAR el Paciente</p>
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

                </div>
                @endforeach
                </tbody>
            </table>



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
