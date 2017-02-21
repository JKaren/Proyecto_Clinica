@extends('tipo_sancion.mantenimiento_tipo_sancion')

@section('estilos')
      <script src={{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}></script>
      <script src={{ URL::asset('bower_components/datatables-responsive/css/dataTables.responsive.css') }}></script>
@endsection

@section('Titulo')
      <i class="fa fa-gear fa-fw"></i>
      <a1>Mantenimiento de Tipo Sanción<a1>
@endsection

@section('Contenido')
      <div class="panel-body">
          <div class="dataTable_wrapper">
              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                      <tr bgcolor=##26B99A>
                          <th><font color="white">Código Tipo Sanción</font></th>
                          <th><font color="white">Descripción</font></th>
                          <th><font color="white">Tiempo</font></th>
                          <th><font color="white">Operaciones</font></th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($tipo_sancion as $tipo_sancio)
                      <tr class="odd gradeX">
                          <td>{{ $tipo_sancio->id_tipo_sancion }}</td>
                          <td>{{ $tipo_sancio->descripcion }}</td>
                          <td>{{ $tipo_sancio->tiempo }}</td>
                          <td align="center">
                            <button type="button" class="btn btn-success btn-sm"
                            onClick="location.href='/tipo_sancion/{{ $tipo_sancio->id_tipo_sancion }} /edit'" >EDITAR</button>
                            @if($tipo_sancio->estado == "INHABILITADO")
                                <button data-target="#confirmar-{{ $tipo_sancio->id_tipo_sancion}}" data-toggle="modal" class="btn btn-warning btn-sm">HABILITAR</button>
                            @else
                                <button data-target="#confirmar-{{ $tipo_sancio->id_tipo_sancion}}" data-toggle="modal" class="btn btn-danger btn-sm">INHABILITAR</button>
                            @endif
                          </td>
                      </tr>
                      <div class="modal fade modal-slide-in-rigth" aria-hidden="true"
                        role="dialog" tabindex="-1" id="confirmar-{{$tipo_sancio->id_tipo_sancion}}">
                        <form action="/tipo_sancion/{{ $tipo_sancio->id_tipo_sancion }}" method="post">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-Label="Close">
                                  <span aria-hidden="true">X</span>
                                </button>
                                <h3 class="modal-title">Estado del Tipo Sanción</h3>
                              </div>
                              <div class="modal-body">
                                @if($tipo_sancio->estado == 'HABILITADO')
                                  <p>¿Esta seguro de que desea modificar el estado a INHABILITADO del Tipo de Sanción?</p>
                                @else
                                  <p>¿Esta seguro de que desea modificar el estado a HABILITADO del Tipo de Sanción?</p>
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
