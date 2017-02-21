@extends('historial_medico.mantenimiento_historial_medico')

@section('Titulo')
<i class="fa fa-gear fa-fw"></i>
<a1>Mantenimiento de Historial Médico<a1>
@endsection
@section('Contenido')

    <fieldset>

    <div class="text-center"><h2 align="center">Informacion Historial Médico</h2>
    </div></br>
    <div class="input-group col-md-12 col-xs-12">
        <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-qrcode bigicon"></i></span>
        <span align="center" class="col-md-6 col-xs-10 has-float-label">
          <div align="center" class="group-control">
            <input id="Id" name="Id" placeholder="Código de Historial Médico" class="form-control" value="{{$historial_medico->id_historial_medico}}" required readonly>
            <label>Código de Historial Médico</label>
          </div>
    </div>
    <div class="input-group col-md-12 col-xs-12">
        <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-th-list bigicon"></i></span>
        <span align="center" class="col-md-6 col-xs-10 has-float-label">
          <div align="center" class="group-control">
            <input id="Cirugias" name="Cirugias" placeholder="Cirugías" class="form-control" value="{{$historial_medico->cirugias}}" required readonly>
            <label>Cirugías</label>
          </div>
        </div>
        <div class="input-group col-md-12 col-xs-12">
            <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-th-list bigicon"></i></span>
            <span align="center" class="col-md-6 col-xs-10 has-float-label">
              <div align="center" class="group-control">
                <input id="Alergias" name="Alergias" placeholder="Alergias" class="form-control" value="{{$historial_medico->alergias}}" required readonly>
                <label>Alergias</label>
              </div>
        </div>
            <div class="input-group col-md-12 col-xs-12">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-th-list bigicon"></i></span>
                <span align="center" class="col-md-6 col-xs-10 has-float-label">
                  <div align="center" class="group-control">
                    <input id="Antecedentes" name="Antecedentes" placeholder="Antecedentes" class="form-control" readonly value="{{$historial_medico->antecedentes}}" required>
                    <label>Antecedentes</label>
                  </div>
            </div>
            <div class="input-group col-md-12 col-xs-12">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-th-list bigicon"></i></span>
                <span align="center" class="col-md-6 col-xs-10 has-float-label">
                  <div align="center" class="group-control">
                    <input id="Tipo_Sangre" name="Tipo_Sangre" placeholder="Tipo de Sangre" class="form-control" value="{{$historial_medico->tipo_sangre}}" required readonly>
                    <label>Tipo de Sangre</label>
                  </div>
            </div>

            <div class="input-group col-md-12 col-xs-12">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-userbigicon"></i></span>
                <span align="center" class="col-md-6 col-xs-10 has-float-label">
                     <input id="Dni_Paciente" name="Dni_Paciente"  class="form-control" value="{{$historial_medico->pacientes_dni}}" required readonly>
                       <label>DNI Paciente</label>
            </div>

            <div class="input-group col-md-12 col-xs-12">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-calendar bigicon"></i></span>
                <span align="center" class="col-md-6 col-xs-10 has-float-label">
                     <input id="Fecha_Apertura" name="Fecha_Apertura" placeholder="Fecha de Apertura" type ="date" class="form-control" value="{{$historial_medico->fecha_apertura}}" required readonly>
                       <label>Fecha de Apertura</label>
            </div>

    </fieldset>

@endsection


@section('Titulo1')
<i class="fa fa-gear fa-fw"></i>
<a1>Detalle de Historial Médico<a1>
  <div class="pull-right">
    <div class="btn-group">
      <button type="button" class="btn btn-primary btn-md"
      onClick="location.href='/historiales_medicos_detalles/create'">NUEVO HISTORIAL MEDICO DETALLE</button>
    </div>
  </div>
@endsection
@section('Contenido1')
      <fieldset>
        <div class="text-center"><h2 align="center">Detalles de  Historial Médico</h2>
        </div></br>
        <div class="dataTable_wrapper table-responsive">
              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                      <tr>
                          <th>Id Historial</th>
                          <th>Estatura</th>
                          <th>Peso</th>
                          <th>Presion</th>
                          <th>Id Cita</th>
                          <th>Descripcion</th>
                          <th>Operaciones</th>
                      </tr>
                  </thead>
                  <tbody>

                  @foreach($historial_medico_detalle as $historial_detalle)
                      @if($historial_medico->id_historial_medico == $historial_detalle->id_historial)
                        <tr class="odd gradeA" rol="row">
                            <td>{{ $historial_detalle-> id_historial_medico }}</td>
                            <td>{{ $historial_detalle-> estatura}}</td>
                            <td>{{ $historial_detalle-> peso }}</td>
                            <td>{{ $historial_detalle-> presion }}</td>
                            <td>{{ $historial_detalle-> id_cita }}</td>
                            <td>{{ $historial_detalle-> descripcion }}</td>

                            <td align="center">
                                <button type="button" style="height:30px" class="btn btn-success btn-sm"
                                onClick="location.href='/historiales_medicos_detalles/{{ $historial_detalle->id_cita }}/edit'">
                                Editar</button>

                            </td>
                        </tr>
                      @endif

                  @endforeach

                  </tbody>
            </table>
      </div>

      </fieldset>
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
