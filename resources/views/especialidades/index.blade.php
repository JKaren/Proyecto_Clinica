@extends('Especialidades.MantenimientoEspecialidades')

@section('estilos')
<script src={{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}></script>
<script src={{ URL::asset('bower_components/datatables-responsive/css/dataTables.responsive.css') }}></script>
@endsection

@section('Contenido')
<div class="dataTable_wrapper table responsive">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
      <thead class="bg bg-success">
        <tr style="background-color:#26B99A">
          <th align="center"><font color="white">Código de Especialidad</font></th>
          <th align="center"><font color="white">Nombre de Especialidad</font></th>
          <th align="center"><font color="white">Consultorio</font></th>
          <th align="center"><font color="white">Operaciones</font></th>

        </tr>
      </thead>
      <tbody>
      @foreach($especialidades as $especialidad)
        <tr class="odd gradeX">
          <td>{{ $especialidad->codigo}}</td>
          <td>{{ $especialidad->nombre}}</td>
          <td>{{ $especialidad->consultorios_id}}</td>
          <td align="center" width = "25%">
              <button type="button" class="btn btn-success btn-sm"
              onClick="location.href='/especialidades/{{$especialidad->codigo }}/edit'">EDITAR</button>
              @if($especialidad->habilitado == "INHABILITADO")
                  <button data-target="#confirmar-{{ $especialidad->codigo}}" data-toggle="modal" class="btn btn-warning btn-sm">HABILITAR</button>
              @else
                  <button data-target="#confirmar-{{ $especialidad->codigo}}" data-toggle="modal" class="btn btn-danger btn-sm">INHABILITAR</button>
              @endif
          </td>
        </tr>
        <div class="modal fade modal-slide-in-rigth" aria-hidden="true"
          role="dialog" tabindex="-1" id="confirmar-{{$especialidad->codigo}}">
          <form action="/especialidades/{{ $especialidad->codigo }}" method="post">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-Label="Close">
                    <span aria-hidden="true">X</span>
                  </button>
                  <h3 class="modal-title">Estado de la Especialidad</h3>
                </div>
                <div class="modal-body">
                  @if($especialidad->habilitado == 'HABILITADO')
                    <p>¿Esta seguro de que desea modificar el estado a INHABILITADO de la especialidad?</p>
                  @else
                    <p>¿Esta seguro de que desea modificar el estado a HABILITADO de la especialidad?</p>
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
