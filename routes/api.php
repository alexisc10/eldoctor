<?php

use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Reservacion;
use App\Models\Triaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('/cie10', 'Cie10Controller');

Route::resource('/medicamentos', 'MedicamentoController');

Route::resource('/ordenes-tipo', 'OrdenTipoController');

Route::resource('/ordenes-estudio', 'OrdenEstudioController');

Route::resource('/ordenes', 'OrdenController');

Route::resource('/horarios', 'HorarioController');

Route::resource('/lugar-atencion-medico', 'LugarAtencionMedicoController');

Route::resource('/recetas', 'RecetaController');

Route::resource('/tarifarios', 'TarifarioController');

Route::get('/tipos-atencion', 'TipoAtencionController@index');

Route::get('/pacientes/documentos', 'ArchivoPacienteController@getDocumentos');

Route::resource('/pacientes-archivo', 'ArchivoPacienteController');

Route::get('/triajes/hcl', 'TriajeController@findHCLByPacienteId');

Route::resource('/triajes', 'TriajeController');

Route::get('/citas/cantidad' , 'CitaController@getCantidad');
Route::get('/citas/pendientes' , 'CitaController@getCitasPendientes');
Route::get('/citas/historico' , 'CitaController@getHistorico');
Route::get('/citas/virtual/{id}', 'CitaController@getCitaPendienteVirtual');
Route::get('/citas/{id}' , 'CitaController@findById');
Route::post('/citas' , 'CitaController@storeCita');
Route::get('/citas' , 'CitaController@findByAll');
Route::put('/citas/{id}' , 'CitaController@update');
Route::delete('/citas/{id}' , 'CitaController@destroy');

Route::get('/especialidades/medico', 'CategoriaController@isMedico');

Route::get('/especialidades', 'CategoriaController@index');

Route::get('/medicos-especialidades', 'MedicoEspecialidadController@index');

Route::get('/medicos/especialidades/{id}', 'MedicoEspecialidadController@getByIdMedico');

Route::get('/medicos-especialidades/{id}/medicos', 'MedicoEspecialidadController@getByIdEspecialidad');

Route::post('/medicos/especialidades', 'MedicoEspecialidadController@storeEspecialidad');

Route::delete('/medicos/especialidades/{id}', 'MedicoEspecialidadController@destroy');

Route::get('/usuarios', 'UsuarioController@getByDni');

Route::post('/usuarios/paciente/login', 'UsuarioController@pacienteLogin');

Route::get('/medico/horario', 'HorarioController@horarioMedicoEstablecido');

Route::get('/medico/horario-cobit', 'HorarioController@horarioMedicoEstablecidoCobit');

Route::get('/pacientes-cita', 'PacienteCitaController@index');

Route::get('/medicos-cita', 'MedicoController@getCita');

Route::get('/encuestas', 'EncuestaController@index');

Route::resource('/medicos-perfiles', 'PerfilMedicoController');

Route::post('/medicos/imagen-firma', 'MedicoController@storeImagenFirma');

Route::post('/medicos/imagen-perfil', 'MedicoController@storeImagenPerfil');

Route::put('/medicos/cambiar-password/{id}', 'MedicoController@updatePassword');

Route::get('/medicos/activo', 'MedicoController@getActive');

Route::resource('/medicos', 'MedicoController');

Route::put('/state-conversations/{id}', 'ConversacionController@updateStateConversation');

Route::get('/state-conversations/{id}', 'ConversacionController@getStateConversation');

Route::get('/reload-conversations/{conversacion}', 'ConversacionController@reloadConversacion');

Route::get('/salas', 'ConversacionController@generarSalas');

Route::put('/update-hora-inicio-fin', 'ReservacionController@updateHoraInicioFin');

Route::put('/update-estado-cita/{id}', 'ReservacionController@updateEstadoCita');

Route::get('/reservacion/pdf/{id}', 'ReservacionController@guardarPDF');

Route::get('/reservacion/pdf-final/{id}', 'ReservacionController@obtenerPDF');

Route::get('/reservacion/prueba/{id}', 'ReservacionController@prueba');

Route::resource('/encuestas', 'EncuestaController');

Route::resource('/telemonitoreos', 'TelemonitoreoController');

Route::resource('/pacientes-medico', 'PacienteMedicoController');

Route::put('/pacientes/cambiar-password/{id}', 'PacientePerfilController@updatePassword');

Route::post('/pacientes/imagen-perfil', 'PacientePerfilController@storeImagenPerfil');

Route::get('/pacientes/perfil/{id}', 'PacientePerfilController@show');

Route::put('/pacientes/perfil/{id}', 'PacientePerfilController@updatePerfil');

Route::resource('/pacientes-perfil', 'PacientePerfilController');

Route::resource('/estados-civil', 'EstadoCivilController');

Route::resource('/paises', 'PaisController');

Route::resource('/formacion-profesional', 'MedicoPerfilFormacionProfesionalController');

Route::resource('/area-especialidad-mayor-interes', 'MedicoPerfilAreaEspecialidadMayorInteresController');

Route::resource('/experiencias-laboral', 'MedicoPerfilExperienciaLaboralController');

Route::resource('/cursos_capacitacion', 'MedicoPerfilCursoCapacitacionController');

Route::resource('/videos', 'MedicoPerfilVideoController');

Route::resource('/imagenes', 'MedicoPerfilImagenController');

Route::get('/departamentos', 'UbigeoController@getDepartamentos');

Route::get('/provincias', 'UbigeoController@gerProvincias');

Route::get('/distritos', 'UbigeoController@gerDistritos');

Route::post('/pacientes', 'PacienteController@save');

Route::get('/logs', 'LogsController@findAll');

Route::post('/logs', 'LogsController@save');

Route::get('/pacientes/pdf', 'PacienteController@generarHistorialClinico');

Route::post('/pacientes/validar', 'PacienteController@validar');

Route::get('/pacientes', 'PacienteController@index');

Route::get('/diagnosticos', 'DiagnosticoController@index');

Route::get('/pacientes/{id}', 'PacienteController@show');

Route::put('/pacientes/{id}/password', 'PacienteController@password');

Route::resource('/blogs', 'BlogController');

Route::get('/archivos/url', 'ArchivoController@getArchivo');

Route::resource('/libros-reclamacion', 'LibroReclamacionController');

Route::post('/sala-video-chat/change-estado', 'ConversacionController@changeEstado');

Route::get('/session-client-tokens', 'SessionClientTokenController@index');

Route::post('/enviar-mensaje-cliente', 'ContactoController@enviarMensajeCliente');

Route::get('/medicos-cobit', 'MedicoCobitController@index');

Route::get('/generar/reservacion/pdf/{id_reservacion}', 'GenerarPdfController@generarPDF');

Route::get('/controles-pre-natales', 'ControlPreNatalController@index');
Route::get('/controles-pre-natales/template', 'ControlPreNatalController@findByTemplate');
Route::get('/controles-pre-natales/{id}', 'ControlPreNatalController@show');
Route::post('/controles-pre-natales', 'ControlPreNatalController@store');
Route::put('/controles-pre-natales/{id}/fecha-inicio-controles', 'ControlPreNatalController@updateFechaInicioControles');
Route::put('/controles-pre-natales/{id}', 'ControlPreNatalController@update');
Route::delete('/controles-pre-natales/{id}', 'ControlPreNatalController@destroy');

Route::get('/controles-pre-natales-controles/dinamico', 'ControlPreNatalControlController@findByAllDinamico');
Route::post('/controles-pre-natales-controles/dinamico', 'ControlPreNatalControlController@saveControlDinamico');
Route::delete('/controles-pre-natales-controles/dinamico/{id}', 'ControlPreNatalControlController@deleteControlDinamico');
Route::post('/controles-pre-natales-controles/nombre-dinamico', 'ControlPreNatalControlController@saveControlNombreDinamico');

Route::get('/controles-pre-natales-controles', 'ControlPreNatalControlController@index');
Route::get('/controles-pre-natales-controles/{id}', 'ControlPreNatalControlController@show');
Route::post('/controles-pre-natales-controles', 'ControlPreNatalControlController@store');
Route::put('/controles-pre-natales-controles/{id}', 'ControlPreNatalControlController@update');
Route::delete('/controles-pre-natales-controles/{id}', 'ControlPreNatalControlController@destroy');

Route::put('/controles-pre-natales/finalizar/{id}', 'ControlPreNatalController@finalizar');
Route::get('/controles-pre-natales/pdf/{id}', 'ControlPreNatalController@pdf');

Route::get('/controles-pre-natales/save-chart/{id}', 'ControlPreNatalController@saveImgGraficas');

Route::get('key', function (Request $request) {
    return sha1(md5($request->password));
});

Route::get('send-reminder-encuestas', 'EncuestaController@sendEncuesta');

Route::get('/mis_pagos_configuraciones', 'MisPagosConfiguracionesController@findAll');
Route::get('/mis_pagos_configuraciones/{id}', 'MisPagosConfiguracionesController@findById');
Route::post('/mis_pagos_configuraciones', 'MisPagosConfiguracionesController@save');
Route::put('/mis_pagos_configuraciones/{id}', 'MisPagosConfiguracionesController@update');
Route::delete('/mis_pagos_configuraciones/{id}', 'MisPagosConfiguracionesController@delete');


Route::get('/mis_pagos', 'MisPagosController@findAll');
Route::get('/mis_pagos/{id}', 'MisPagosController@findById');
Route::post('/mis_pagos', 'MisPagosController@save');
Route::put('/mis_pagos/{id}', 'MisPagosController@update');
Route::delete('/mis_pagos/{id}', 'MisPagosController@delete');

Route::post('/culqui/generar-pago', 'CulquiController@generarPago');

Route::post('/culqui/generar-orden', 'CulquiController@generarOrden');


Route::get('/horarios-citas', 'HorarioController@citasHorarios');
Route::get('/cantidad-citas-dia', 'CitaController@obtenerCantidadCitasxDias');
Route::get('/cantidades-citas-diarios', 'ReportesCitasController@obtenerCantidadCitasDiario');
Route::get('/cantidades-citas-semanales', 'ReportesCitasController@obtenerCantidadCitasSemanal');
Route::get('/cantidades-citas-mesuales', 'ReportesCitasController@obtenerCantidadCitasMesual');
Route::get('/cantidades-citas-anual', 'ReportesCitasController@obtenerCantidadCitasAnual');

Route::get('/permisos', 'PermisosController@findAll');
Route::get('/permisos/{id}', 'PermisosController@findById');
Route::post('/permisos', 'PermisosController@save');
Route::put('/permisos/{id}', 'PermisosController@update');
Route::delete('/permisos/{id}', 'PermisosController@delete');

Route::get('/permisos-usuarios', 'PermisosUsuariosController@findAll');
Route::get('/permisos-usuarios/{id}', 'PermisosUsuariosController@findById');
Route::post('/permisos-usuarios', 'PermisosUsuariosController@save');
Route::put('/permisos-usuarios/{id}', 'PermisosUsuariosController@update');
Route::delete('/permisos-usuarios/{id}', 'PermisosUsuariosController@delete');

Route::get('/controles-ciclos-transferencias', 'ControlCicloTransferenciaController@findAll');
Route::get('/controles-ciclos-transferencias/pdf/{id}', 'ControlCicloTransferenciaController@pdf');
Route::get('/controles-ciclos-transferencias/{id}', 'ControlCicloTransferenciaController@findById');
Route::post('/controles-ciclos-transferencias', 'ControlCicloTransferenciaController@save');
Route::put('/controles-ciclos-transferencias/{id}/finalizar', 'ControlCicloTransferenciaController@finalizar');
Route::put('/controles-ciclos-transferencias/{id}', 'ControlCicloTransferenciaController@update');
Route::delete('/controles-ciclos-transferencias/{id}', 'ControlCicloTransferenciaController@delete');

Route::get('/controles-ciclos-aspiraciones', 'ControlCicloAspiracionController@findAll');
Route::get('/controles-ciclos-aspiraciones/pdf/{id}', 'ControlCicloAspiracionController@pdf');
Route::get('/controles-ciclos-aspiraciones/{id}', 'ControlCicloAspiracionController@findById');
Route::post('/controles-ciclos-aspiraciones', 'ControlCicloAspiracionController@save');
Route::put('/controles-ciclos-aspiraciones/{id}/finalizar', 'ControlCicloAspiracionController@finalizar');
Route::put('/controles-ciclos-aspiraciones/{id}', 'ControlCicloAspiracionController@update');
Route::delete('/controles-ciclos-aspiraciones/{id}', 'ControlCicloAspiracionController@delete');

Route::get('/controles-ciclos-coitos-dirigidos', 'ControlCicloCoitoDirigidoController@findAll');
Route::get('/controles-ciclos-coitos-dirigidos/{id}', 'ControlCicloCoitoDirigidoController@findById');
Route::post('/controles-ciclos-coitos-dirigidos', 'ControlCicloCoitoDirigidoController@save');
Route::put('/controles-ciclos-coitos-dirigidos/{id}', 'ControlCicloCoitoDirigidoController@update');
Route::delete('/controles-ciclos-coitos-dirigidos/{id}', 'ControlCicloCoitoDirigidoController@delete');

Route::get('/controles-ciclos-inseminaciones', 'ControlCicloInseminacionController@findAll');
Route::get('/controles-ciclos-inseminaciones/{id}', 'ControlCicloInseminacionController@findById');
Route::post('/controles-ciclos-inseminaciones', 'ControlCicloInseminacionController@save');
Route::put('/controles-ciclos-inseminaciones/{id}', 'ControlCicloInseminacionController@update');
Route::delete('/controles-ciclos-inseminaciones/{id}', 'ControlCicloInseminacionController@delete');

Route::get('/controles-ciclos-simulaciones', 'ControlCicloSimulacionController@findAll');
Route::get('/controles-ciclos-simulaciones/{id}', 'ControlCicloSimulacionController@findById');
Route::post('/controles-ciclos-simulaciones', 'ControlCicloSimulacionController@save');
Route::put('/controles-ciclos-simulaciones/{id}', 'ControlCicloSimulacionController@update');
Route::delete('/controles-ciclos-simulaciones/{id}', 'ControlCicloSimulacionController@delete');

Route::get('/examenes-auxiliares', 'ExamenAuxiliarController@findAll');
Route::get('/examenes-auxiliares/pdf/{id}', 'ExamenAuxiliarController@pdf');
Route::get('/examenes-auxiliares/{id}', 'ExamenAuxiliarController@findById');
Route::put('/examenes-auxiliares/{id}/finalizar', 'ExamenAuxiliarController@finalizar');
Route::post('/examenes-auxiliares', 'ExamenAuxiliarController@save');
Route::put('/examenes-auxiliares/{id}', 'ExamenAuxiliarController@update');
Route::delete('/examenes-auxiliares/{id}', 'ExamenAuxiliarController@delete');


Route::get('/monitoreos-seguimientos', 'MonitoreosSeguimientosController@findAll');
Route::get('/v2/citas', 'V2\CitasServicesController@getAll');

Route::get('/citas-interconsultas', 'CitaInterconsultaController@findByAll');
Route::get('/citas-interconsultas/{cita_id}/interconsultas', 'CitaInterconsultaController@findByCitaId');
Route::post('/citas-interconsultas', 'CitaInterconsultaController@save');
