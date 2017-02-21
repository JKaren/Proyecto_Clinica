@extends('Citas_heredar')
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
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">

              <i class="fa fa-gear fa-fw"></i>
              <a1>Historial del Paciente<a1>
        </div>
        <div class="panel-body">
            <div >
        @yield('Contenido')
        <div class="col-md-6 col-sm-6 col-xs-12">
               <div class="x_panel">
                 <div class="x_title">
                   <h2>Historial <small>Datos generales</small></h2>
                   <div class="clearfix"></div>
                 </div>
                 <div class="x_content">

                   <div class="col-xs-3">
                     <!-- required for floating -->
                     <!-- Nav tabs -->
                     <ul class="nav nav-tabs tabs-left">
                       <li class="active"><a href="#home" data-toggle="tab">Datos Personales</a>
                       </li>
                       <li><a href="#profile" data-toggle="tab">Datos Secundarios</a>
                       </li>
                       <li><a href="#messages" data-toggle="tab">Datos Medicos</a>
                       </li>
                     </ul>
                   </div>

                   <div class="col-xs-9">
                     <!-- Tab panes -->
                     <div class="tab-content">
                       <div class="tab-pane active" id="home">
                         <p class="lead">Datos:</p>
                         <p>DNI: {{$pacientes->dni}}</p>
                         <p>Nombres: {{$pacientes->nombres}}</p>
                         <p>Apellidoc: {{$pacientes->apellidos}}</p>
                         <p>Tipo: {{$pacientes->tipo_paciente}}</p>
                       </div>
                       <div class="tab-pane" id="profile">
                         <p class="lead">Datos Secundarios:</p>
                         <p>Codigo: {{$pacientes->codigo}}</p>
                         <p>Escuela Profecional: {{$pacientes->escuelas_profesionales_id}}</p>
                         <p>Telefono: {{$pacientes->telefono}}</p>
                         <p>F. Nacimiento: {{$pacientes->fecha_nacimiento}}</p>
                       </div>
                       <div class="tab-pane" id="messages">
                         <p class="lead">Datos Medicos:</p>
                         <p>Cirugias: {{$detalle->cirugias}}</p>
                         <p>Alergias: {{$detalle->alergias}}</p>
                         <p>Antecedentes: {{$detalle->antecedentes}}</p>
                         <p>Tipo Sangre: {{$detalle->tipo_sangre}}</p>
                         <p>Apertura: {{$detalle->fecha_apertura}}</p>
                       </div>
                     </div>
                   </div>
                   <div class="clearfix"></div>
                 </div>
               </div>
             </div>

      <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Historial <small>Historial Detallado</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

        <div class="dataTable_wrapper table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>Fecha Cita</td>
                        <td>Estatura</td>
                        <td>Peso</td>
                        <td>Presion</td>
                        <td>Descripcion</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($tablas as $tabla)
                      <tr class="odd gradeA" rol="row">
                          <td>{{$tabla->  fecha_cita}}</td>
                          <td>{{$tabla-> estatura }}</td>
                          <td>{{$tabla-> peso }}</td>
                          <td>{{$tabla-> presion }}</td>
                          <td>{{$tabla-> descripcion }}</td>
                      </tr>
                  @endforeach
                </tbody>
            </table>
          </div>
      </div>
    </div>
    <td align="center">
        <a href="{{ URL::previous() }}" class="btn btn-success btn-xs">Volver</a>
    </td>
  </div>
  </div>
  </div>
  </div>
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
