<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Clinica UNSAAC | </title>

    <!-- Bootstrap -->
    <link href={{ URL::asset("css/bootstrap.min.css") }} rel="stylesheet">
    <!-- Font Awesome -->
    <link href={{ URL::asset("css/font-awesome.min.css") }} rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href={{ URL::asset("css/custom.min.css") }} rel="stylesheet">
    <!--float label-->
    <link href={{ URL::asset("css/float_label.css") }} rel="stylesheet">

    @yield('estilos')

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="/" class="site_title"><i class="fa fa-user-md"></i> <span>Clinica UNSAAC</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->

            <div class="profile clearfix">
              <div class="profile_pic">
                <img src={{ URL::asset("images/img.jpg")}} alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido</span>
                <h2>  {{ Auth::user()->name }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3> </h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/inicio" class="btn btn-info btn-xx">INICIO</a></li>
                      <li><a href="/about" class="btn btn-info btn-xx">SOBRE NOSOTROS</a></li>
                      <li><a href="/gallery" class="btn btn-info btn-xx">ESPECIALIDADES</a></li>
                      <li><a href="/contac" class="btn btn-info btn-xx">CONTACTOS</a></li>
                    </ul>
                  </li>

                  @if( Auth::user()->tipo=='Admi' )
                  <li><a><i class="fa fa-desktop"></i> Procesos Administrador<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li><a href="/reservas_admi" class="btn btn-danger btn-xx">Reservar Cita</a></li>
                      <li><a href="/medhorarios" class="btn btn-danger btn-xx">Horario Medico</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Mantenimientos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                       <li>
                                    <a href="/pacientes" class="btn btn-success btn-xx"> Mantenimiento Pacientes</a>
                                </li>
                                <li>
                                    <a href="/medicos" class="btn btn-success btn-xx"> Mantenimiento Medicos</a>
                                </li>
                                <li>
                                    <a href="/consultorios" class="btn btn-success btn-xx"> Mantenimiento Consultorios</a>
                                </li>
                                <li>
                                    <a href="/especialidades" class="btn btn-success btn-xx"> Mantenimiento Especialidades </a>
                                </li>
                                <li>
                                    <a href="/historial_medico" class="btn btn-success btn-xx"> Mantenimiento Historial Médico</a>
                                </li>
                                <li>
                                    <a href="/escuelas_profesionales" class="btn btn-success btn-xx"> Mantenimiento Escuelas Profesionales </a>
                                </li>
                                <li>
                                    <a href="/sanciones" class="btn btn-success btn-xx"> Mantenimiento Sanciones </a>
                                </li>
                                <li>
                                    <a href="/citas" class="btn btn-success btn-xx"> Mantenimiento Citas </a>
                                </li>
                                <li>
                                    <a href="/tipo_sancion" class="btn btn-success btn-xx"> Mantenimiento Tipo Sanción</a>
                                </li>
                    </ul>
                  </li>
                  @endif
                  <li><a><i class="fa fa-bar-chart-o"></i> Reportes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

                      <li><a href="/PacientesAtendidosEspecialida" class="btn btn-warning btn-xx">VER Pacientes Atendidos por Especialidad</a></li>
                      <li><a href="/CitasPorMedico" class="btn btn-warning btn-xx">VER Citas Por medico</a></li>
                      <li><a href="/CitasConsulEspeci" class="btn btn-warning btn-xx">VER Citas  Por Consultorio y Especialidad</a></li>
                      <li><a href="/CitasCanceladas" class="btn btn-warning btn-xx">VER Citas  Canceladas</a></li>

                    </ul>
                  </li>
                </ul>
              </div>


            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->

            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                          <li>
                              <a href="{{ url('/logout') }}"
                                  onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                  Cerrar sesion
                              </a>

                              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                              </form>
                          </li>

                        </ul>
                    </li>
                @endif


              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">

          </div>
          <!-- /top tiles -->
            <div class="row" style="padding-left: 30px">
                @yield('Mantenimiento')
            </div>
      </div>
    </div>

    <!-- jQuery -->
    <script src={{ URL::asset("js/jquery.min.js") }}></script>
    <!-- Bootstrap -->
    <script src={{ URL::asset("js/bootstrap.min.js") }}></script>
    <!-- FastClick -->
    <!-- Custom Theme Scripts -->
    <script src={{ URL::asset("js/custom.min.js") }}></script>
     @yield('js')

    @yield('js_scripts')
    <!-- /gauge.js -->
  </body>
</html>
