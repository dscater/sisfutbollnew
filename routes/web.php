<?php

use App\Http\Controllers\CampeonatoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\EquipoClubController;
use App\Http\Controllers\FixtureFinalController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\JugadorEquipoController;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\PuntosPartidoController;
use App\Http\Controllers\TablaPosicionController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\SancionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name("welcome");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('campeonato/get/equipos_campeonato', [CampeonatoController::class, 'equipos_campeonato'])->name('equipos_campeonato');
Route::get('campeonato', [CampeonatoController::class, 'index'])->name('campeonato.index');
Route::get('campeonato/create', [CampeonatoController::class, 'create'])->name('campeonato.create');
Route::delete('campeonato/{id}', [CampeonatoController::class, 'destroy'])->name('campeonato.destroy');
Route::post('campeonato', [CampeonatoController::class, 'store'])->name('campeonato.store');
Route::get('campeonato/editar/{id}', [CampeonatoController::class, 'edit'])->name('campeonato.edit');
Route::patch('campeonato/{id}', [CampeonatoController::class, 'update'])->name('campeonato.patch');
Route::put('campeonato/{id}', [CampeonatoController::class, 'update'])->name('campeonato.update');


Route::get('equipos', [EquipoClubController::class, 'index'])->name('equipos.index');
Route::get('equipos/create', [EquipoClubController::class, 'create'])->name('equipos.create');
Route::delete('equipos/{id}', [EquipoClubController::class, 'destroy'])->name('equipos.destroy');
Route::post('equipos', [EquipoClubController::class, 'store'])->name('equipos.store');
Route::get('equipos/editar/{id}', [EquipoClubController::class, 'edit'])->name('equipos.edit');
Route::patch('equipos/{id}', [EquipoClubController::class, 'update'])->name('equipos.patch');
Route::put('equipos/{id}', [EquipoClubController::class, 'update'])->name('equipos.update');

Route::get('jugadores', [JugadorController::class, 'index'])->name('jugadores.index');
Route::get('jugadores/create', [JugadorController::class, 'create'])->name('jugadores.create');
Route::delete('jugadores/{id}', [JugadorController::class, 'destroy'])->name('jugadores.destroy');
Route::post('jugadores', [JugadorController::class, 'store'])->name('jugadores.store');
Route::get('jugadores/editar/{id}', [JugadorController::class, 'edit'])->name('jugadores.edit');
Route::patch('jugadores/{id}', [JugadorController::class, 'update'])->name('jugadores.patch');
Route::put('jugadores/{id}', [JugadorController::class, 'update'])->name('jugadores.update');

// JUGADORES EQUIPOS
Route::get('jugadores/equipos/{jugador}', [JugadorEquipoController::class, 'index'])->name('jugador_equipos.index');
Route::get('jugadores/equipos/create/{jugador}', [JugadorEquipoController::class, 'create'])->name('jugador_equipos.create');
Route::post('jugadores/equipos/store', [JugadorEquipoController::class, 'store'])->name('jugador_equipos.store');
Route::get('jugadores/equipos/edit/{jugador_equipo}', [JugadorEquipoController::class, 'edit'])->name('jugador_equipos.edit');
Route::put('jugadores/equipos/update/{jugador_equipo}', [JugadorEquipoController::class, 'update'])->name('jugador_equipos.update');
Route::delete('jugadores/equipos/destroy/{jugador_equipo}', [JugadorEquipoController::class, 'destroy'])->name('jugador_equipos.destroy');

Route::get('inscripcion/{id}', [InscripcionController::class, 'index'])->name('inscripcion.index');
Route::get('inscripcion/create/{id}', [InscripcionController::class, 'create'])->name('inscripcion.create');
Route::delete('inscripcion/{id}', [InscripcionController::class, 'destroy'])->name('inscripcion.destroy');
Route::post('inscripcion/{id}', [InscripcionController::class, 'store'])->name('inscripcion.store');
Route::get('inscripcion/editar/{id}', [InscripcionController::class, 'edit'])->name('inscripcion.edit');
Route::patch('inscripcion/{id}', [InscripcionController::class, 'update'])->name('inscripcion.patch');
Route::put('inscripcion/{id}', [InscripcionController::class, 'update'])->name('inscripcion.update');

Route::get('partidos', [PartidoController::class, 'index'])->name('partidos.index');
Route::get('partidos/create', [PartidoController::class, 'create'])->name('partidos.create');
Route::delete('partidos/{id}', [PartidoController::class, 'destroy'])->name('partidos.destroy');
Route::post('partidos', [PartidoController::class, 'store'])->name('partidos.store');
Route::get('partidos/editar/{id}', [PartidoController::class, 'edit'])->name('partidos.edit');
Route::patch('partidos/{id}', [PartidoController::class, 'update'])->name('partidos.patch');
Route::put('partidos/{id}', [PartidoController::class, 'update'])->name('partidos.update');

Route::get('partidos/generar/{id}', [PartidoController::class, 'generar'])->name('partidos.generar');
Route::get('partidos/generar_segunda_ronda/{id}', [PartidoController::class, 'generar_segunda_ronda'])->name('partidos.generar_segunda_ronda');
Route::get('partidos/generarVar/{id}', [PartidoController::class, 'generarVar'])->name('partidos.generarVar');
Route::get('partidos/buscar', [PartidoController::class, 'buscarpartido'])->name('partidos.buscar');
Route::get('partido/punto/{id}', [PuntosPartidoController::class, 'create'])->name('puntos.create');
Route::get('partido/generarter/{id}', [PartidoController::class, 'generarterceros'])->name('partidos.generarter');
Route::get('partido/generar_cuartos/{id}', [PartidoController::class, 'generar_cuartos'])->name('partidos.generar_cuartos');
Route::get('partido/semifinal/{id}', [PartidoController::class, 'semifinal'])->name('partidos.semifinal');
Route::get('partido/final/{id}', [PartidoController::class, 'final'])->name('partidos.final');


Route::get('tabposicion/listado', [TablaPosicionController::class, 'listado'])->name('tabposicion.listado');
Route::get('tabposicion/listado/getTablasCampeonato', [TablaPosicionController::class, 'getTablasCampeonato'])->name('tabposicion.getTablasCampeonato');
Route::get('tabposicion/{campeonato}', [TablaPosicionController::class, 'detalle'])->name('tabposicion.detalle');
Route::get('tabposicion', [TablaPosicionController::class, 'index'])->name('tabposicion.index');
Route::get('tabposicion/create', [TablaPosicionController::class, 'create'])->name('tabposicion.create');
Route::delete('tabposicion/{id}', [TablaPosicionController::class, 'destroy'])->name('tabposicion.destroy');
Route::get('tabposicion/buscar', [TablaPosicionController::class, 'buscarcamp'])->name('tabposicion.buscar');
Route::get('tabposicion/{id}', [TablaPosicionController::class, 'actualizar'])->name('tabposicion.actulizar');
Route::get('tabposicion/ganadores/{id}', [TablaPosicionController::class, 'Ganadores'])->name('tabposicion.ganadores');

Route::get('fixturefinal', [FixtureFinalController::class, 'index'])->name('fixturefinal.index');
Route::get('fixturefinal/buscador', [FixtureFinalController::class, 'buscador'])->name('fixturefinal.buscador');
Route::get('fixturefinal/{id}', [FixtureFinalController::class, 'generar'])->name('fixturefinal.generar');
Route::get('fixturefinal/editar/{id}', [FixtureFinalController::class, 'editPart'])->name('fixturefinal.editar');
Route::get('fixture/semifinal/{id}', [FixtureFinalController::class, 'semifinal'])->name('fixturefinal.semifinal');
Route::get('fixture/final/{id}', [FixtureFinalController::class, 'final'])->name('fixturefinal.final');

Route::get('Documento/listado', [DocumentoController::class, 'listado'])->name('documento.listado');
Route::get('Documento', [DocumentoController::class, 'index'])->name('documento.index');
Route::get('Documento/create', [DocumentoController::class, 'create'])->name('documento.create');
Route::get('Documento/editar/{id}', [DocumentoController::class, 'editar'])->name('documento.editar');
Route::delete('Documento/{id}', [DocumentoController::class, 'destroy'])->name('documento.destroy');
Route::post('Documento', [DocumentoController::class, 'store'])->name('documento.store');
Route::patch('Documento/{id}', [DocumentoController::class, 'update'])->name('documento.patch');
Route::put('Documento/{id}', [DocumentoController::class, 'update'])->name('documento.update');

Route::get('Noticia/listado', [NoticiaController::class, 'listado'])->name('noticia.listado');
Route::get('Noticia', [NoticiaController::class, 'index'])->name('noticia.index');
Route::get('Noticia/create', [NoticiaController::class, 'create'])->name('noticia.create');
Route::get('Noticia/editar/{id}', [NoticiaController::class, 'editar'])->name('noticia.editar');
Route::delete('Noticia/{id}', [NoticiaController::class, 'destroy'])->name('noticia.destroy');
Route::post('Noticia', [NoticiaController::class, 'store'])->name('noticia.store');
Route::patch('Noticia/{id}', [NoticiaController::class, 'update'])->name('noticia.patch');
Route::put('Noticia/{id}', [NoticiaController::class, 'update'])->name('noticia.update');
Route::get('welcome', [NoticiaController::class, 'welcome'])->name('noticia.welcome');

Route::get('sanciones', [SancionController::class, 'index'])->name('sanciones.index');
Route::get('sanciones/create', [SancionController::class, 'create'])->name('sanciones.create');
Route::get('sanciones/editar/{id}', [SancionController::class, 'editar'])->name('sanciones.editar');
Route::delete('sanciones/{id}', [SancionController::class, 'destroy'])->name('sanciones.destroy');
Route::post('sanciones', [SancionController::class, 'store'])->name('sanciones.store');
Route::patch('sanciones/{id}', [SancionController::class, 'update'])->name('sanciones.patch');
Route::put('sanciones/{id}', [SancionController::class, 'update'])->name('sanciones.update');
Route::get('download-pdf/{idf}', [TablaPosicionController::class, 'downloadPdf'])->name('download-pdf');
Route::get('partido/download-pdf/{idf}', [PartidoController::class, 'downloadPdf'])->name('partidodownload-pdf');

Route::resource('categorias', CategoriaController::class);

Route::resource('users', UserController::class);

Route::get("reportes/tarjeta_jugador", [ReporteController::class, 'tarjeta_jugador'])->name("reportes.tarjeta_jugador");
Route::get("reportes/tarjeta_jugador_pdf", [ReporteController::class, 'tarjeta_jugador_pdf'])->name("reportes.tarjeta_jugador_pdf");

Route::get("reportes/jugador", [ReporteController::class, 'jugador'])->name("reportes.jugador");
Route::get("reportes/jugador_pdf", [ReporteController::class, 'jugador_pdf'])->name("reportes.jugador_pdf");

Route::get("reportes/equipos_categoria", [ReporteController::class, 'equipos_categoria'])->name("reportes.equipos_categoria");
Route::get("reportes/equipos_categoria_pdf", [ReporteController::class, 'equipos_categoria_pdf'])->name("reportes.equipos_categoria_pdf");

Route::get("reportes/fixture", [ReporteController::class, 'fixture'])->name("reportes.fixture");
Route::get("reportes/fixture_pdf", [ReporteController::class, 'fixture_pdf'])->name("reportes.fixture_pdf");

Route::get("reportes/jugadores_equipo", [ReporteController::class, 'jugadores_equipo'])->name("reportes.jugadores_equipo");
Route::get("reportes/jugadores_equipo_pdf", [ReporteController::class, 'jugadores_equipo_pdf'])->name("reportes.jugadores_equipo_pdf");

Route::get("reportes/sanciones", [ReporteController::class, 'sanciones'])->name("reportes.sanciones");
Route::get("reportes/sanciones_pdf", [ReporteController::class, 'sanciones_pdf'])->name("reportes.sanciones_pdf");
