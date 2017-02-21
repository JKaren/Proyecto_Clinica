
        <div class="dataTable_wrapper table-responsive">
                                  <table class="table table-bordered table-condensed" >
                                    <thead>
                                        <tr >
                                          <th><div class="panel panel-red"><div class="panel-heading"><h3>Hora</h3></div></th>
                                          @for($i=0;$i<7;$i++)
                                          <th>
                                              <div class="panel panel-red">
                                                <div class="panel-heading">
                                                    <h3 >{{$dias[$i]}}</h3>
                                                    {{$fecha[$i]}}
                                              </div>
                                            </div>
                                          </th>
                                          @endfor
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @for($i=7;$i<19;$i++)

                                        @if(($i<13)||($i>=15))
                                        <tr>
                                          <td align ="right" background-color="#be25b5">
                                                  @if($i<9)
                                                  0{{$i}}:00 - 0{{$i+1}}:00
                                                  @elseif($i==9)
                                                  0{{$i}}:00 - {{$i+1}}:00
                                                  @else
                                                  {{$i}}:00 - {{$i+1}}:00
                                                  @endif
                                          </td>



                                              @for($j=0;$j<7;$j++)
                                                @if($res[$j.'-'.$i]->estado==1)
                                                  <td class="Hora_Cita" id="{{$j.'-'.$i}}" value="{{$res[$j.'-'.$i]->idbloques}}">{{$res[$j.'-'.$i]->estado}}</td>
                                                @else
                                                  <td class="Hora_Cita" id="{{$j.'-'.$i}}" value="{{$res[$j.'-'.$i]->idbloques}}">    </td>
                                                  @ENDIF
                                              @endfor

                                          @elseif(($i==13))
                                          <td colspan="8" height="25px"></td>

                                          @endif


<!--
                                        @for($j=0;$j<7;$j++)
                                          @if($res[$j.'-'.$i]->estado==1)
                                            <td id="{{$j.'-'.$i}}" onclick="cambiacolor_texto(this,'{{$dias[$j]}} {{$fecha[$j]}}','{{$res[$j.'-'.$i]->idbloques}}');"> Disponible</td>
                                          @else
                                            <td id="{{$j.'-'.$i}}"></td>
                                            @ENDIF
                                        @endfor

-->

                                      </tr>
                                      @endfor
                                    </tbody>
                                </table>
                            </div>

                            <!-- Modal -->
  <div class="modal fade" id="Mo_Registrar_Cita" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" align="center">Registrar Cita</h4>
        </div>
          <form role="form" method="get" action="/reservas_Almacenar" autocomplete="off">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="modal-body">

              <div id="Datos_Reserva">

              </div>
              <input name="Id_Paciente" id="Id_Paciente" type="hidden" value="{{Auth::user()->dni}}">
            </div>

            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="Confirmar">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
          </form>
      </div>

    </div>
  </div>

@endsection

@section('js')
<!-- DataTables JavaScript -->


@endsection

@section('js_scripts')
<script>

    function cambiacolor_texto(cell,otro,id){
      cell.style.backgroundColor = (cell.style.backgroundColor=="red" ? "white":"red");
      var str = cell.id;
      var res = parseInt(str.split("-")[1]);
      document.getElementById("dia").value=res+":00 - "+(res+1)+":00";
      document.getElementById("fecha").value=otro ;
      document.getElementById("id").value=id ;
    }


</script>

<script>
 $(document).ready(function() {
          $(".Hora_Cita").click(function(event){
                   event.preventDefault();
                   var Id = $("#"+event.target.id).attr('value');
                   var idtd = $("#"+event.target.id).attr('id');


                    var td = $('.fc-resource'+idtd);
                    var head = td.parent().parent().parent().find("thead");
                    var th = head.find("th:eq("+td.index()+")");

                    var Nro_Dia = idtd.substring(0,1);

                   $.get('/Recuperar_Datos_Cita',{Id:Id},function(data){
                      $('#Datos_Reserva').empty();
                      var info = $('#Datos_Reserva');
                      var th = td.closest('table').find('th').eq(td.index());
                      //alert(th.val());
                      info.append('<p>Médico:'+data[2]+'</p><p>Día:'+data[1]+'</p> <p>Hora:'+data[0]+'</p><p>Consultorio:'+data[4]+'</p><p>Especialidad:'+data[3]+'</p><input name="Id" type="hidden" id="Id" value="'+Id+'"><input name="Nro_Dia" type="hidden" id="Nro_Dia" value="'+Nro_Dia+'">');

                      $('#Mo_Registrar_Cita').modal({
                      show: 'true'
                  });
                  });
        });
    });
</script>
@endsection
