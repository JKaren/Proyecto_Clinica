@extends('Consultorios.MantenimientoConsultorios')

@section('estilos')
<script src={{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}></script>
<script src={{ URL::asset('bower_components/datatables-responsive/css/dataTables.responsive.css') }}></script>
@endsection

@section('Contenido')
<div class="dataTable_wrapper table responsive">
  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
      <tr bgcolor=#26B99A>
        <th><font color="white">Código Consultorio</font></th>
        <th><font color="white">Ubicación</font></th>
        <th><font color="white">Operaciones</font></th>
      </tr>
    </thead>
    <tbody>
    @foreach($consultorios as $consultorio)
      <tr class="odd gradeX">
        <td>{{ $consultorio->id }}</td>
        <td>{{ $consultorio->ubicacion }}</td>
        <td align="center" width="25%">
          <button type="button" class="btn btn-success btn-md"
          onClick="location.href='/consultorios/{{ $consultorio->id }}/edit'">EDITAR</button>
          @if($consultorio->estado == "INHABILITADO")
            <button data-target="#confirmar-{{ $consultorio->id}}" data-toggle="modal" class="btn btn-warning btn-sm">HABILITAR</button>
          @else
            <button data-target="#confirmar-{{ $consultorio->id}}" data-toggle="modal" class="btn btn-danger btn-sm">INHABILITAR</button>
          @endif
        </td>
      </tr>
      <div class="modal fade modal-slide-in-rigth" aria-hidden="true"
      role="dialog" tabindex="-1" id="confirmar-{{$consultorio->id}}">
        <form action="/consultorios/{{ $consultorio->id }}" method="post">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-Label="Close">
                  <span aria-hidden="true">X</span>
                </button>
                <h3 class="modal-title">Estado del Consultorio</h3>
              </div>
              <div class="modal-body">
              @if($consultorio->estado == 'HABILITADO')
                <p>¿Esta seguro de que desea modificar el estado a INHABILITADO del consultorio?</p>
              @else
                <p>¿Esta seguro de que desea modificar el estado a HABILITADO del consultorio?</p>
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
