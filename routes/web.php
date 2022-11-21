<?php

use App\Http\Controllers\CampeonatoController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\EquipoClubController;
use App\Http\Controllers\FixtureFinalController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\PuntosPartidoController;
use App\Http\Controllers\TablaPosicionController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\SancionController;
use App\Models\fixture;
use App\Models\TablaPosicion;
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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('campeonato',[CampeonatoController::class, 'index'])->name('campeonato.index');
Route::get('campeonato/create', [CampeonatoController::class, 'create'])->name('campeonato.create');
Route::delete('campeonato/{id}',[CampeonatoController::class, 'destroy'])->name('campeonato.destroy');
Route::post('campeonato', [CampeonatoController::class, 'store'])->name('campeonato.store');
Route::get('campeonato/editar/{id}', [CampeonatoController::class, 'edit'])->name('campeonato.edit');
Route::patch('campeonato/{id}', [CampeonatoController::class, 'update'])->name('campeonato.update');
Route::put('campeonato/{id}', [CampeonatoController::class, 'update'])->name('campeonato.update');

Route::get('equipos',[EquipoClubController::class, 'index'])->name('equipos.index');
Route::get('equipos/create', [EquipoClubController::class, 'create'])->name('equipos.create');
Route::delete('equipos/{id}',[EquipoClubController::class, 'destroy'])->name('equipos.destroy');
Route::post('equipos', [EquipoClubController::class, 'store'])->name('equipos.store');
Route::get('equipos/editar/{id}', [EquipoClubController::class, 'edit'])->name('equipos.edit');
Route::patch('equipos/{id}', [EquipoClubController::class, 'update'])->name('equipos.update');
Route::put('equipos/{id}', [EquipoClubController::class, 'update'])->name('equipos.update');

Route::get('jugadores',[JugadorController::class, 'index'])->name('jugadores.index');
Route::get('jugadores/create', [JugadorController::class, 'create'])->name('jugadores.create');
Route::delete('jugadores/{id}',[JugadorController::class, 'destroy'])->name('jugadores.destroy');
Route::post('jugadores', [JugadorController::class, 'store'])->name('jugadores.store');
Route::get('jugadores/editar/{id}', [JugadorController::class, 'edit'])->name('jugadores.edit');
Route::patch('jugadores/{id}', [JugadorController::class, 'update'])->name('jugadores.update');
Route::put('jugadores/{id}', [JugadorController::class, 'update'])->name('jugadores.update');

Route::get('inscripcion/{id}',[InscripcionController::class, 'index'])->name('inscripcion.index');
Route::get('inscripcion/create/{id}', [InscripcionController::class, 'create'])->name('inscripcion.create');
Route::delete('inscripcion/{id}',[InscripcionController::class, 'destroy'])->name('inscripcion.destroy');
Route::post('inscripcion/{id}', [InscripcionController::class, 'store'])->name('inscripcion.store');
Route::get('inscripcion/editar/{id}', [InscripcionController::class, 'edit'])->name('inscripcion.edit');
Route::patch('inscripcion/{id}', [InscripcionController::class, 'update'])->name('inscripcion.update');
Route::put('inscripcion/{id}', [InscripcionController::class, 'update'])->name('inscripcion.update');

Route::get('partidos',[PartidoController::class, 'index'])->name('partidos.index');
Route::get('partidos/create', [PartidoController::class, 'create'])->name('partidos.create');
Route::delete('partidos/{id}',[PartidoController::class, 'destroy'])->name('partidos.destroy');
Route::post('partidos', [PartidoController::class, 'store'])->name('partidos.store');
Route::get('partidos/editar/{id}', [PartidoController::class, 'edit'])->name('partidos.edit');
Route::patch('partidos/{id}', [PartidoController::class, 'update'])->name('partidos.update');
Route::put('partidos/{id}', [PartidoController::class, 'update'])->name('partidos.update');

Route::get('partidos/generar/{id}', [PartidoController::class, 'generar'])->name('partidos.generar');
Route::get('partidos/generarVar/{id}', [PartidoController::class, 'generarVar'])->name('partidos.generarVar');
Route::get('partidos/buscar', [PartidoController::class, 'buscarpartido'])->name('partidos.buscar');
Route::get('partido/punto/{id}', [PuntosPartidoController::class, 'create'])->name('puntos.create');
Route::get('partido/generarter/{id}', [PartidoController::class, 'generarterceros'])->name('partidos.generarter');
Route::get('partido/semifinal/{id}', [PartidoController::class, 'semifinal'])->name('partidos.semifinal');
Route::get('partido/final/{id}', [PartidoController::class, 'final'])->name('partidos.final');

Route::get('tabposicion',[TablaPosicionController::class, 'index'])->name('tabposicion.index');
Route::get('tabposicion/create', [TablaPosicionController::class, 'create'])->name('tabposicion.create');
Route::delete('tabposicion/{id}',[TablaPosicionController::class, 'destroy'])->name('tabposicion.destroy');
Route::get('tabposicion/buscar', [TablaPosicionController::class, 'buscarcamp'])->name('tabposicion.buscar');
Route::get('tabposicion/{id}',[TablaPosicionController::class, 'actualizar'])->name('tabposicion.actulizar');
Route::get('tabposicion/ganadores/{id}',[TablaPosicionController::class, 'Ganadores'])->name('tabposicion.ganadores');

Route::get('fixturefinal', [FixtureFinalController::class, 'index'])->name('fixturefinal.index');
Route::get('fixturefinal/buscador', [FixtureFinalController::class, 'buscador'])->name('fixturefinal.buscador');
Route::get('fixturefinal/{id}', [FixtureFinalController::class, 'generar'])->name('fixturefinal.generar');
Route::get('fixturefinal/editar/{id}',[FixtureFinalController::class, 'editPart'])->name('fixturefinal.editar');
Route::get('fixture/semifinal/{id}', [FixtureFinalController::class, 'semifinal'])->name('fixturefinal.semifinal');
Route::get('fixture/final/{id}', [FixtureFinalController::class, 'final'])->name('fixturefinal.final');

Route::get('Documento', [DocumentoController::class, 'index'])->name('documento.index');
Route::get('Documento/create', [DocumentoController::class, 'create'])->name('documento.create');
Route::get('Documento/editar/{id}', [DocumentoController::class, 'editar'])->name('documento.editar');
Route::delete('Documento/{id}', [DocumentoController::class, 'destroy'])->name('documento.destroy');
Route::post('Documento', [DocumentoController::class, 'store'])->name('documento.store');
Route::patch('Documento/{id}', [DocumentoController::class, 'update'])->name('documento.update');
Route::put('Documento/{id}', [DocumentoController::class, 'update'])->name('documento.update');

Route::get('Noticia', [NoticiaController::class, 'index'])->name('noticia.index');
Route::get('Noticia/create', [NoticiaController::class, 'create'])->name('noticia.create');
Route::get('Noticia/editar/{id}', [NoticiaController::class, 'editar'])->name('noticia.editar');
Route::delete('Noticia/{id}', [NoticiaController::class, 'destroy'])->name('noticia.destroy');
Route::post('Noticia', [NoticiaController::class, 'store'])->name('noticia.store');
Route::patch('Noticia/{id}', [NoticiaController::class, 'update'])->name('noticia.update');
Route::put('Noticia/{id}', [NoticiaController::class, 'update'])->name('noticia.update');
Route::get('welcome', [NoticiaController::class, 'welcome'])->name('noticia.welcome');

Route::get('sanciones', [SancionController::class, 'index'])->name('sanciones.index');
Route::get('sanciones/create', [SancionController::class, 'create'])->name('sanciones.create');
Route::get('sanciones/editar/{id}', [SancionController::class, 'editar'])->name('sanciones.editar');
Route::delete('sanciones/{id}', [SancionController::class, 'destroy'])->name('sanciones.destroy');
Route::post('sanciones', [SancionController::class, 'store'])->name('sanciones.store');
Route::patch('sanciones/{id}', [SancionController::class, 'update'])->name('sanciones.update');
Route::put('sanciones/{id}', [SancionController::class, 'update'])->name('sanciones.update');
Route::get('download-pdf/{idf}', [TablaPosicionController::class, 'downloadPdf'])->name('download-pdf');
Route::get('partido/download-pdf/{idf}', [PartidoController::class, 'downloadPdf'])->name('partidodownload-pdf');
