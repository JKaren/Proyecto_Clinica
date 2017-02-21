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
              <a href="/inicio" class="site_title"><i class="fa fa-user-md"></i> <span>Clinica UNSAAC</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src={{ URL::asset("images/img.jpg")}} alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido Doctor</span>
                <p></p>
              </div>
            </div>
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
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Procesos Medico<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/medcitas/{{Auth::user()->dni}}/" class="btn btn-success btn-xx">Citas Medico</a></li>
                      <li><a href="/medcitas/{{Auth::user()->dni}}/atendidos" class="btn btn-success btn-xx">Citas Atendidas</a></li>
                    </ul>
                  </li>
                  <li><a href="/reportes/medico/"><i class="fa fa-laptop"></i> Reportes</a></li>
              </div>
            </div>
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
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src={{ URL::asset("images/img.jpg")}} alt="">
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Perfil</a></li>
                          <li>
                              <a href="{{ url('/logout') }}"
                                  onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                  Logout
                              </a>

                              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                              </form>
                          </li>
                  </ul>
                </li>
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
            <div class="row">
                @yield('Mantenimiento')
            </div>
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Edited and configured by <a href="https://colorlib.com">D Team</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
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
