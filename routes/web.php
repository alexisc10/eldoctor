<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index');

Route::get('/login', 'UsuarioController@showLogin');

Route::get('/paciente/login', 'UsuarioController@showPacienteLogin');

Route::get('/medico/login', 'UsuarioController@showMedicoLogin');

Route::get('/medico/registro', 'UsuarioController@showMedicoRegistro');

Route::post('/paciente/login', 'UsuarioController@pacienteLogin');

Route::post('/medico/login', 'UsuarioController@medicoLogin');

Route::get('/logout', 'UsuarioController@logout');

Route::resource('/usuarios', 'UsuarioController');

Route::get('/medico/mis-pagos', function () {
    if (!session()->has('current_user')) {
        return redirect()->intended('/');
    }
    if (session('current_user')->tipo_usuario != 'MEDICO') {
        return redirect()->back();
    }
    return view('medico.mi-pago.index');
});
Route::get('/medico/mis-pagos/configuracion', function () {
    if (!session()->has('current_user')) {
        return redirect()->intended('/');
    }
    if (session('current_user')->tipo_usuario != 'MEDICO') {
        return redirect()->back();
    }
    return view('medico.mi-pago.configuracion');
});

Route::get('/paciente/mis-pagos', function () {
    if (!session()->has('current_user')) {
        return redirect()->intended('/');
    }
    if (session('current_user')->tipo_usuario != 'PACIENTE') {
        return redirect()->back();
    }
    return view('paciente.mi-pago.index');
});

Route::get('/paciente/mis-pagos/upload-voucher/{id}', function ($id) {
    if (!session()->has('current_user')) {
        return redirect()->intended('/');
    }
    if (session('current_user')->tipo_usuario != 'PACIENTE') {
        return redirect()->back();
    }
    return view('paciente.mi-pago.upload-voucher')->with('id', $id);
});

Route::get('/medico/recover-password', 'UsuarioController@showRecoverPasswordMedico');

Route::post('/medico/recover-password', 'UsuarioController@recoverPasswordMedico');

Route::get('/medico/recuperar-acceso/{usuario_id}/{token}', 'UsuarioController@showRecuperarAccesoMedico');

Route::post('/medico/recuperar-acceso', 'UsuarioController@recuperarAccesoMedico');


Route::get('/recover-password', 'UsuarioController@showRecoverPassword');

Route::post('/recover-password', 'UsuarioController@recoverPassword');

Route::get('/recuperar-acceso/{usuario_id}/{token}', 'UsuarioController@showRecuperarAcceso');

Route::post('/recuperar-acceso', 'UsuarioController@recuperarAcceso');

Route::get('/paciente/cita-virtual/{categoria_id}/{medico_id}', 'CitaVirtualController@showCitaVirtualCategoriaIdMedicoId');

Route::resource('/paciente/cita-virtual', 'CitaVirtualController');

Route::post('confirmar-reservacion-virtual', 'CitaVirtualController@confirmarReservacionVirtual');

Route::get('confirmar-reservacion-virtual', 'CitaVirtualController@showConfirmacionReservacionVirtual');

Route::get('/medicos-especialidad/{especialidad_id}', 'MedicoController@medicoByIdEspecialidad');

Route::get('/all-medicos-especialidad/{especialidad_id}', 'MedicoController@allMedicosByIdEspecialidad');

Route::get('/paciente/perfil/edit/{user_id}', 'PerfilController@showIdUsuarioPerfil');

Route::resource('/chat', 'ChatController');

Route::get('/mensaje/{conversation_id}', 'MensajeController@cargarMensajes');

Route::resource('/mensaje', 'MensajeController');

// Route::get('/encuesta-main', 'EncuestaController@showEncuestaMain');

Route::post('/encuesta-main', 'EncuestaController@storeEncuestaMain');

Route::get('/encuesta-free/{reservacion_id}', 'EncuestaController@showEncuestaFree');

Route::post('/encuesta-free', 'EncuestaController@storeEncuestaFree');

Route::get('/confirmar-encuesta-main', 'EncuestaController@showConfirmarEncuestaMain');

Route::get('/encuesta-free/{reservacion_id}', 'EncuestaController@showEncuestaFree');

Route::post('/encuesta-free', 'EncuestaController@storeEncuestaFree');

Route::get('/confirmar-encuesta-free', 'EncuestaController@showConfirmarEncuestaFree');

Route::get('/video/{conversation_id}', 'VideoController@showVideo');

Route::get('/staff-medico', 'StaffMedicoController@index');

Route::get('/staff-medico/busqueda', 'StaffMedicoController@showBuscarMedico');

Route::get('/staff-medico/busqueda-medico-cobit', 'StaffMedicoController@showBuscarMedicoCobit');

Route::resource('/consultorio', 'ConsultorioController');

Route::resource('/segunda-opinion-experto', 'SegundaOpinionExpertoController');

Route::post('/procesar-pago', 'PagoTarjetaController@create');

Route::resource('/telemonitoreo', 'TelemonitoreoController');

Route::resource('/triajes', 'TriajeController');

Route::get('/triaje-reservacion/{reservacion_id}', 'TriajeController@getByReservacionId');

Route::get('/nosotros', 'NosotrosController@index');

Route::get('/contacto', 'ContactoController@index');

Route::get('/perfil-medico/{id}', 'MedicoController@showPerfil');

Route::get('/perfil-medico-cobit/{id}', 'MedicoController@showPerfilCobit');

Route::get('/hacer-cita', 'CitaController@showCita');

Route::get('/hacer-cita-cobit', 'CitaController@showCitaCobit');

Route::get('/confirmacion-cita', 'CitaController@confirmacionCita');

Route::get('/paciente/citas/pendiente', 'CitaController@showCitaPacientePendiente');

Route::get('/paciente/mis-citas', 'CitaController@showPacienteMisCitas');

Route::get('/paciente/mis-documentos', 'ArchivoPacienteController@showPacienteMisDocumentos');

Route::post('/citas-cobit', 'CitaController@storeCitaCobit');

Route::resource('citas', 'CitaController');

Route::get('/paciente/terminos-condiciones', 'TerminoCondicionController@paciente');

Route::get('/medico/terminos-condiciones', 'TerminoCondicionController@medico');

Route::get('/paciente/doctor-linea', 'DoctorLineaController@paciente');

Route::GEt('/paciente/perfil', 'PerfilController@showPerfil');

// Medico

Route::get('/medico/mis-citas', 'CitaController@showCitaMedico');

Route::get('/medico/mis-citas/create/{id}', function ($id) {
    return view('medico.cita.create')->with('id', $id);
});

Route::get('/medico/mis-tarifarios', 'TarifarioController@showMisTarifarios');

Route::get('/medico/mis-pacientes', 'PacienteController@showMisPacientes');

Route::get('/medico/doctor-linea', 'DoctorLineaController@medico');

Route::get('/medico-chat/{conversation_id}', 'VideochatController@showChat');

Route::get('/medico-video/{conversation_id}', 'VideochatController@showVideo');

Route::get('/medico/video-chat/{id_reservacion}', 'VideochatController@showVideoChat');

Route::get('/medico/mis-horarios', 'HorarioController@showMedicoMisHorarios');

Route::get('/medico/telemonitoreo', 'TelemonitoreoController@showMedico');

Route::get('/medico/perfil/{id}', 'PerfilMedicoController@showPerfil');

Route::get('/paciente/video-chat/{id_reservacion}', 'VideochatController@showVideoChatPaciente');

Route::get('/recetas/pdf/{id}', 'RecetaController@pdf');

Route::get('/ordenes/pdf/{id}', 'OrdenController@pdf');

Route::get('/triajes/pdf/{id}', 'TriajeController@pdf');

Route::get('/paciente/encuesta', 'EncuestaController@create');

Route::get('/blog', 'BlogController@showBlog');

Route::get('/blog-detalle/{id}', 'BlogController@showBlogDetalle');

Route::get('/paciente/registro-atencion', 'TriajeController@showRegistroAtencion');

Route::get('/servicios', 'ServicioController@showServicios');

Route::get('/servicios/citas-presenciales', 'ServicioController@showCitaPresencial');

Route::get('/servicios/servicio-linea', 'ServicioController@showServicioLinea');

Route::get('/servicios/servicio-medico', 'ServicioController@showServicioMedico');

Route::get('/libro-reclamacion', 'LibroReclamacionController@showLibroReclamacion');

Route::get('/registro-atencion/orden/{id}', function ($id) {
    return view('medico.registro-atencion.orden.index')->with('id_cita', $id);
});
Route::get('/registro-atencion/orden/create/{id}', function ($id) {
    return view('medico.registro-atencion.orden.create')->with('id_cita', $id);
});
Route::get('/registro-atencion/receta/{id}', function ($id) {
    return view('medico.registro-atencion.receta.index')->with('id_cita', $id);
});
Route::get('/registro-atencion/receta/create/{id}', function ($id) {
    return view('medico.registro-atencion.receta.create')->with('id_cita', $id);
});


Route::get('/registro-atencion/{id}/{tipo_historial}', 'ViewController@viewRegistroAtencionIndex');

Route::get('/receta/create/{id_cita}', 'ViewController@viewRecetaCreate');
Route::get('/receta/{id_cita}', 'ViewController@viewRecetaIndex');

Route::get('/orden/create/{id_cita}', 'ViewController@viewOrdenCreate');
Route::get('/orden/{id_cita}', 'ViewController@viewOrdenIndex');

Route::get('/medico/documento/create/{id_cita}', 'ViewController@viewMedicoDocumentoCreate');
Route::get('/medico/documento/{id_cita}', 'ViewController@viewMedicoDocumentoIndex');

Route::get('/medico/control-pre-natal/{id_cita}', 'ViewController@viewMedicoControlPreNatal');

Route::get('/medico/control-pre-natal/controles/{id_cita}/{control_pre_natal_id}', 'ViewController@viewMedicoControlPreNatalControl');

Route::get('/medico/lugares-atencion', 'ViewController@viewMedicoLugarAntencion');

Route::get('/medico/lugares-atencion/{id}', 'ViewController@viewMedicoLugarAntencionCreate');

Route::get('/medico/blog', 'ViewController@viewMedicoBlog');

Route::get('/medico/blog-detalle/{id}', 'ViewController@viewMedicoBlogDetalle');

Route::get('/medico/reportes', function () {
    if (!session()->has('current_user')) {
        return redirect()->intended('/');
    }
    if (session('current_user')->tipo_usuario != 'MEDICO') {
        return redirect()->back();
    }
    return view('medico.reporte.index');
});

// Asistente

Route::get('/asistente/login', function () {
    return view('asistente.login');
});

Route::post('/asistente/login', 'UsuarioController@asistenteLogin');

Route::get('/asistente/mis-citas', function () {
    return view('asistente.cita.index');
});

Route::get('/asistente/mis-citas/create/{id}', function ($id) {
    return view('asistente.cita.create')->with('id', $id);
});

Route::get('/asistente/mis-tarifarios', function () {
    return view('asistente.tarifario.index');
});

Route::get('/asistente/mis-pacientes', function () {
    return view('asistente.paciente.index');
});

Route::get('/asistente/mis-horarios', function () {
    return view('asistente.horario.index');
});

Route::get('/asistente/telemonitoreo', function () {
    return view('asistente.telemonitoreo.index');
});

Route::get('/asistente/mis-pagos', function () {
    return view('asistente.mi-pago.index');
});
Route::get('/asistente/mis-pagos/configuracion', function () {
    return view('asistente.mi-pago.configuracion');
});
Route::get('/asistente/lugares-atencion', function () {
    return view('asistente.lugar-atencion.index');
});
Route::get('/asistente/reportes', function () {
    return view('asistente.reporte.index');
});

Route::get('/pago/agendar-cita', function () {
    return view('pago.agendar-cita');
});
Route::get('/pago/tipo-pago', function () {
    return view('pago.tipo-pago');
});
Route::get('/pago/confirmacion', function () {
    return view('pago.confirmacion');
});
Route::get('/pago/ficha-atencion', function () {
    return view('pago.ficha-atencion');
});


Route::get('/medico/asistentes', function () {
    return view('medico.asistente.index');
});
Route::get('/medico/asistentes/{id}', function ($id) {
    return view('medico.asistente.create')->with('id', $id);
});

Route::get('/medico/permisos-usuarios/{id}', function ($id) {
    return view('medico.permiso.permiso_usuario')->with('id', $id);
});



Route::get('/medico/desarrollo', function () {
    return view('medico.desarrollo.index');
});


Route::get('/medico/desarrollo/registro-atencion/{id}', function ($id) {
    return view('medico.desarrollo.ginecologia')->with('id_cita', $id);
});


Route::get('/private/files', 'FileController@private');


Route::get('/medico/control-ciclo-transferencia/{id_cita}', function ($id) {
    return view('medico.control-ciclo.transferencia')->with('id_cita', $id);
});

Route::get('/medico/control-ciclo-aspiracion/{id_cita}', function ($id) {
    return view('medico.control-ciclo.aspiracion')->with('id_cita', $id);
});

Route::get('/medico/control-ciclo-coito-dirigido/{id_cita}', function ($id) {
    return view('medico.control-ciclo.coito-dirigido')->with('id_cita', $id);
});

Route::get('/medico/control-ciclo-simulacion/{id_cita}', function ($id) {
    return view('medico.control-ciclo.simulacion')->with('id_cita', $id);
});

Route::get('/medico/control-ciclo-inseminacion/{id_cita}', function ($id) {
    return view('medico.control-ciclo.inseminacion')->with('id_cita', $id);
});

Route::get('/medico/monitoreo-estimulacion-ovarica/{id_cita}', function ($id) {
    return view('medico.monitoreo.estimulacion-ovarica')->with('id_cita', $id);
});

Route::get('/medico/monitoreo-preparacion-endometrial/{id_cita}', function ($id) {
    return view('medico.monitoreo.preparacion-endometrial')->with('id_cita', $id);
});

Route::get('/medico/examen-auxiliar-masculino/{id_cita}', function ($id) {
    return view('medico.examen-auxiliar.masculino')->with('id_cita', $id);
});

Route::get('/medico/examen-auxiliar-femenino/{id_cita}', function ($id) {
    return view('medico.examen-auxiliar.femenino')->with('id_cita', $id);
});

Route::get('/medico/monitoreo-seguimiento', function () {
    return view('medico.monitoreo-seguimiento.index');
});


Route::get('/medico/monitoreo-seguimiento/monitoreo-estimulacion-ovarica/{estimulacion_ovarica_id}', function ($estimulacion_ovarica_id) {
    return view('medico.monitoreo-seguimiento.monitoreo.estimulacion-ovarica')->with('estimulacion_ovarica_id', $estimulacion_ovarica_id);
});

Route::get('/medico/monitoreo-seguimiento/monitoreo-preparacion-endometrial/{preparacion_endometrial_id}', function ($preparacion_endometrial_id) {
    return view('medico.monitoreo-seguimiento.monitoreo.preparacion-endometrial')->with('preparacion_endometrial_id', $preparacion_endometrial_id);
});

Route::get('/medico/monitoreo-seguimiento/control-pre-natal/{control_pre_natal_id}', function ($control_pre_natal_id) {
    return view('medico.monitoreo-seguimiento.control-prenatal.index')->with('control_pre_natal_id', $control_pre_natal_id);
});

Route::get('/medico/monitoreo-seguimiento/control-pre-natal/controles/{control_pre_natal_id}', function ($control_pre_natal_id) {
    return view('medico.monitoreo-seguimiento.control-prenatal.control')->with('control_pre_natal_id', $control_pre_natal_id);
});


Route::get('/medico/interconsulta/{id_cita}', function ($id) {
    return view('medico.interconsulta.create')->with('id_cita', $id);
});
