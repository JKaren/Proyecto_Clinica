@extends('citas.Mantenimiento_citas')

@section('estilos')
      <script src={{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}></script>
      <script src={{ URL::asset('bower_components/datatables-responsive/css/dataTables.responsive.css') }}></script>
@endsection


@section('Contenido')
      <div class="panel-body">
          <div class="dataTable_wrapper">
              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                      <tr bgcolor="26b99a">
                        <th><font color="white">Codigo de Cita</font></th>
                          <th><font color="white">Fecha de Cita</font></th>
                          <th><font color="white">Fecha de Reserva</font></th>
                          <th><font color="white">DNI del Paciente</font></th>
                          <th><font color="white">ID de Bloques</font></th>
                          <th><font color="white">Operaciones</font></th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($citas as $cita)
                      <tr class="odd gradeX">
                        <td>{{ $cita->id}}</td>
                        <td>{{ $cita->fecha_cita}}</td>
                        <td>{{ $cita->fecha_reserva}}</td>
                        <td>{{ $cita->pacientes_dni}}</td>
                        <td>{{ $cita->bloques_idbloques}}</td>
                        <td align="center" width="25%">
                          <button type="button" class="btn btn-success btn-md"
                          onClick="location.href='/citas/{{ $cita->id }}/edit'">EDITAR</button>
                          @if($cita->estado == "INHABILITADO")
                              <button data-target="#confirmar-{{ $cita->id}}" data-toggle="modal" class="btn btn-warning btn-sm">HABILITAR</button>
                          @else
                              <button data-target="#confirmar-{{ $cita->id}}" data-toggle="modal" class="btn btn-danger btn-sm">INHABILITAR</button>
                          @endif
                        </td>
                      </tr>
                      <div class="modal fade modal-slide-in-rigth" aria-hidden="true"
                        role="dialog" tabindex="-1" id="confirmar-{{$cita->id}}">
                        <form action="/citas/{{ $cita->id }}" method="post">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-Label="Close">
                                  <span aria-hidden="true">X</span>
                                </button>
                                <h3 class="modal-title">Estado de la Cita</h3>
                              </div>
                              <div class="modal-body">
                                @if($cita->estado == 'HABILITADO')
                                  <p>¿Esta seguro de que desea modificar el estado a INHABILITADO de la cita?</p>
                                @else
                                  <p>¿Esta seguro de que desea modificar el estado a HABILITADO de la cita?</p>
                                @endif
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE')}}
                                  <button type="submit" class="btn btn-success">Si</button>
                              </div>
                            </div>
                          </div>
                          </form>
                      </div>
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
