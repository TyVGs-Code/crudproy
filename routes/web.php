<?php
use App\Http\Controllers\ReglamentoController;
use App\Http\Controllers\AscensosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SectoresController;
use App\Http\Controllers\FormatoController;
use App\Http\Controllers\InstruccioneController;
use App\Http\Controllers\TipoProController;
use App\Http\Controllers\EvaactController;
use App\Http\Controllers\TablacontabiController;
use App\Http\Controllers\AnexosController;
use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'index'])->name('login');


//Equipo 1
Route::resource('usuarios',UsuarioController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('sectores', SectoresController::class);
Route::get('sectores/{sectore}/usuarios', [SectoresController::class, 'usuarios'])->name('sectores.usuarios');
Route::resource('ascensos',AscensosController::class);
Route::resource('reglamentos', ReglamentoController::class);
Route::get('/usuarios/export-pdf', [UsuarioController::class, 'exportPdf'])->name('usuarios.exportPdf');
Route::post('/usuarios/export-pdf', [UsuarioController::class, 'exportPdf'])->name('usuarios.exportPdf');
Route::get('/test-pdf', [UsuarioController::class, 'testPdf']);

//Equipo 2
Route::resource('instrucciones', InstruccioneController::class);
Route::resource('tipo-pros', TipoProController::class);
Route::resource(name: 'formatos', controller: FormatoController::class);


//Equipo 3
Route::resource('evaacts', EvaactController::class);
Route::resource('anexos', AnexosController::class);
Route::resource('tablacontabis', TablacontabiController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
