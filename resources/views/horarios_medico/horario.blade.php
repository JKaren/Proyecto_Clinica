@extends('Principal')

@section('estilos')

    <style type="text/css">
      td{
        background-color: #ffffff;
      }
      td:hover{
         background-color: #58A6F9;
         cursor: pointer;
      }
    </style>
@endsection

@section('Mantenimiento')
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading" style="height:60px">
              <i class="fa fa-gear fa-fw"></i>
              <a1><font size=5>Seleccionar Horarios </font><a1>
              <div class="pull-right">
                  <button type="button" class="btn btn-info btn-md"
                      onClick="location.href='/medhorarios'">VOLVER</button>
              </div>
        </div>
        <div class="panel-body">
            <div >
                @yield('Contenido')
                <fieldset>
                  <input id="id" type="hidden" name="id" value="">

                  <div class="text-center"><h1 align="center">Escoger Horario</h1>
                  </div></br>
                </fieldset>
                <div class="dataTable_wrapper table-responsive">
                      <table class="table table-bordered table-condensed" >
                        <thead>
                            <tr bgcolor="26b99a">
                              <th ><font color="white" ><h3 align="center">HORA</h3></th>
                              @for($i=0;$i<7;$i++)
                              <th><font color="white">
                                        <h3 align="center">{{$dias[$i]}}</h3>

                              </th>
                              @endfor
                            </tr>
                        </thead>
                        <tbody>
                          @for($i=0;$i<24;$i++)
                            @if(($i<12)||($i>=16))
                            <tr>
                              <td align ="right" background-color="#be25b5">
                                  {{$horas[$i]}}
                              </td>
                                  @for($j=0;$j<7;$j++)
                                   <div class="modal fade modal-slide-in-rigth" aria-hidden="true"
                                        role="dialog" tabindex="-1" id="confirmar{{$res[$j.'-'.$i]->idbloques}}">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-Label="Close">
                                                  <span aria-hidden="true">X</span>
                                                </button>
                                                <h3 class="modal-title">Cambio de Horario</h3>
                                              </div>
                                              <div class="modal-body">
                                                <p>Esta seguro que desea realizar este cambio ?</p>
                                              </div>
                                              <div class="modal-footer">

                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                  <button  type="submit" style="width:80px" class="btn btn-success" onclick="document.location='/cambiar/{{$res[$j.'-'.$i]->idbloques}}/{{$dni}}/'">Continuar</button>
                                              </div>
                                            </div>
                                          </div>
                                      </div>
                                    @if($res[$j.'-'.$i]->dnimed == "d")
                                      <td data-target="#confirmar{{$res[$j.'-'.$i]->idbloques}}"data-toggle="modal" class="Hora_Cita" id="{{$j.'-'.$i}}" value="{{$res[$j.'-'.$i]->idbloques}}" ><FONT COLOR="1EEC2F">disponible</td>
                                    @else
                                      @if($res[$j.'-'.$i]->dnimed==$dni)
                                        <td data-target="#confirmar{{$res[$j.'-'.$i]->idbloques}}" data-toggle="modal" class="Hora_Cita" id="{{$j.'-'.$i}}" value="{{$res[$j.'-'.$i]->idbloques}}" ><FONT COLOR="0000FF">Ocupado</td>
                                      @else
                                        <td  class="Hora_Cita" id="{{$j.'-'.$i}}" value="{{$res[$j.'-'.$i]->idbloques}}"><FONT COLOR="FA0A0E">no disponible</td>
                                      @ENDIF
                                    @ENDIF
                                  @endfor
                              @elseif(($i==12))
                              <td colspan="8" height="25px"></td>
                              @endif
                          </tr>
                          @endfor
                        </tbody>
                    </table>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
  @yield('js')
@endsection

@section('js_scripts')

@endsection
