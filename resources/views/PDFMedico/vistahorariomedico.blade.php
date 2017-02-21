<!DOCTYPE html >
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <img src="images/Imagen1.png">
    <h3 class="box-title">Fecha del reporte: <?php $time = time(); echo date("d-m-Y", $time);?></h3>
    <style>
       .col-md-12
       {
          width: 100%;
      }

      .box
      {
          position: relative;
          border-radius: 3px;
          background: #ffffff;
          border-top: 3px solid #d2d6de;
          margin-bottom: 20px;
          width: 100%;
          box-shadow: 0 1px 1px rgba(0,0,0,0.1);
          background-color: #ECF0F5;
      }
      .box-header
      {
          color: #444;
          display: block;
          padding: 10px;
          position: relative;
      }
      .box-header.with-border
      {
          border-bottom: 1px solid #f4f4f4;
      }
      .box-header .box-title
      {
          display: inline-block;
          font-size: 18px;
          margin: 0;
          line-height: 1;
      }
      .box-body
      {
          border-top-left-radius: 0;
          border-top-right-radius: 0;
          border-bottom-right-radius: 3px;
          border-bottom-left-radius: 3px;
          padding: 10px;
      }
      .box-footer
      {
          border-top-left-radius: 0;
          border-top-right-radius: 0;
          border-bottom-right-radius: 3px;
          border-bottom-left-radius: 3px;
          border-top: 1px solid #f4f4f4;
          padding: 10px;
          background-color: #fff;
      }
      .table-bordered
      {
          border: 1px solid #f4f4f4;
      }
      .table
      {
          width: 100%;
          max-width: 100%;
          margin-bottom: 20px;
      }
      table
      {
          background-color: transparent;
      }
      .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td
       {
          border: 1px solid #f4f4f4;
       }
      .badge
      {
          display: inline-block;
          min-width: 10px;
          padding: 3px 7px;
          font-size: 12px;
          font-weight: 700;
          line-height: 1;
          color: #fff;
          text-align: center;
          white-space: nowrap;
          vertical-align: middle;
          background-color: #777;
          border-radius: 10px;
      }
      .bg-red
      {
          background-color: #dd4b39 !important;
      }
    </style>
</head>
<body >
<div class="col-md-12">
  <div class="box">
    <div style="text-align: center">
      <div class="box-header with-border;">
      <h3 class="box-title">Reporte Horarios Medicos </h3>
      </div><!-- /.box-header -->
        <div class="box-body">
          <table  border="1" class="table table-bordered">
        		<thead>
        			<tr>
                select('bloques.hora_inicio','bloques.dia','medicos.nombres','medicos.apellidos','especialidades.nombre')
                <th style="width: 10px">Horario Inicio</th>
                <th style="width: 10px">Dia</th>
                <th style="width: 10px">Nombre Medico</th>
                <th style="width: 10px">Apellido Medico</th>
                <th style="width: 10px">Especialidad</th>

        			</tr>
        		</thead>
        		<tbody>
              @foreach ($horarios as $horario)
        				<tr>$horario
        					<td style="width: 10px">{{$horario->hora_inicio}}</td>
        					<td style="width: 10px">{{$horario->dia}}</td>
                  <td style="width: 10px">{{$horario->nombres}}</td>
                  <td style="width: 10px">{{$horario->apellidos}}</td>
                  <td style="width: 10px">{{$horario->nombre}}</td>
        				</tr>
        			@endforeach
        		</tbody>
      	  </table>
      </div>
    </div>
  </div>
</div>
</body>
</html>
