<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
 */

Route::get('hola', function () {
    return view("Pacientes.index");
});

Route::group(['middleware' => 'MDadmi'], function () {
    Route::resource('personas', 'PersonasController');

    Route::resource('/medhorarios/', 'HorariosMedicosController');
    Route::resource('/medhorarios/{id}/horario', 'HorariosMedicosController@mostrar');
    Route::resource('cambiar/{idbloque}/{medDNI}/', 'HorariosMedicosController@resaltar');

    Route::resource('medicos', 'MedicosController');
    Route::resource('consultorios', 'ConsultoriosController');
    Route::resource('especialidades', 'especialidadesController');
    Route::resource('historial_medico', 'HistorialMedicoController');
    Route::resource('historiales_medicos_detalles', 'HistorialesMedicosDetallesController');
    Route::resource('estudiantes', 'EstudiantesController');
    Route::resource('escuelas_profesionales', 'EscuelasProfesionalesController');

    Route::resource('citas', 'CitasController');
    Route::resource('sanciones', 'SancionesController');
    Route::resource('tipo_sancion', 'tipo_sancionController');

    Route::resource('horarios', 'HorariosController');
    Route::resource('/pacientes/', 'PacientesController');
    Route::resource('/pacientes_ext/', 'PacientesController@store_ext');
    Route::resource('/pacientes/create2/', 'PacientesController@create2');
    Route::resource('/pacientes/{dni}/edit/','PacientesController@edit');
    Route::resource('/pacientes/{dni}/edit_ext/','PacientesController@edit');
    Route::resource('/pacientes/{dni}/','PacientesController@actualizar');

    Route::resource('p_horario', 'p_horarioController');
    Route::resource('telefono', 'TelefonoController');
    Route::resource('cambiar/{idbloque}/{medDNI}/', 'HorariosMedicosController@resaltar');
    Route::resource('/reportes/admi/', 'ReportesController@admi');
    Route::resource('CitasCanceladas', 'PDFControllerCitas@pdfcitas');
    Route::resource('CitasConsulEspeci', 'PDFControllerSancion@pdfsancion');
    Route::resource('PacientesAtendidosEspecialida', 'PDFControllerHistorial_medico@PDFHistorialmedico');
    Route::resource('CitasPorMedico', 'PDFControllerPacientes@PDFPaciente');
    Route::resource('reservas_admi', 'ReservaController');
    Route::resource('/pacientes/{dni}/inhabilitar/','PacientesController@destruir');
    Route::resource('/pacientes/{dni}/habilitar/','PacientesController@destruir');
});

Route::group(['middleware' => 'MDpaciente'], function () {

    Route::resource('reservas', 'ReservaController@mostrar');
    Route::resource('reservas/citas', 'ReservaController@citas');
    Route::get('reservas_Almacenar', 'ReservaController@almacenar');
    Route::get('Recuperar_Datos_Cita', 'ReservaController@Recuperar_Bloque');
});

    Route::resource('reservas/horario', 'ReservaController@horario');
    Route::get('/Recuperar_Citas', ['uses' => 'CitasController@Recuperar_Citas']);
    Route::get('/Actualizar_Cancelacion',['uses'=>'CitasController@Actualizar_Cancelacion']);
    Route::get('Recuperar_Horario', ['uses' => 'ReservaController@Recuperar_Horario']);
    Route::get('ggg', 'ReservaController@Recuperar_Horario');
    Route::get('Modificar_Datos_Paciente', ['uses' => 'PacientesController@Modificar_Datos_Paciente']);
    Route::group(['middleware' => 'MDmedico'], function () {
    Route::resource('/medcitas/', 'CitasMedicosController');
    Route::resource('CitasPorMedico1', 'PDFControllerPacientes@PDFPaciente');
    Route::resource('HoraMedico', 'ControllerHorarioMedico@pdfhorarios');
    Route::resource('/medcitas/{id}/', 'CitasMedicosController@mostrar');
    Route::resource('/medcitas/{id}/atendidos', 'CitasMedicosController@mostrarAtendidos');
    Route::get('/medcitas/{dniMed}/sancionar', 'CitasMedicosController@sancionar');
    Route::get('/medcitas/{dniMed}/historial', 'CitasMedicosController@historial');
    Route::resource('/medcitas/cita/citSancion/{id}/', 'CitasMedicosController@guardar');
    Route::resource('/medcitas/citadetalle/{id}/', 'CitasMedicosController@siguiente');
    Route::resource('/medcitas/citadetalle/{idcita}/{idhistorial}/', 'CitasMedicosController@Save');
    Route::resource('/reportes/medico/', 'ReportesController@medico');

});

//
Route::get('/', 'InicioController@index');
Route::resource('inicio', 'InicioController');
Route::get('about', 'InicioController@about');
Route::get('gallery', 'InicioController@gallery');
Route::get('contact', 'InicioController@contact');
Route::get('configuracion', function () {
    return view('configuracion');
});
Auth::routes();

Route::get('/home', 'HomeController@index');
