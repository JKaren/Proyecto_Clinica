@extends('principal')

@section('Mantenimiento')
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
              @yield('Titulo')
            <div class="pull-right">
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                        Acciones
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li><a type="button" href='/telefono/create'>Agregar Estdiantes</a>
                        </li>
                        <li><a type="button" href='/telefono'>Editar/Eliminar</a>
                        </li>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div >
                @yield('Contenido')
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
  @yield('js')
@endsection

@section('js_scripts')
  @yield('js_scripts')
@endsection
