<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\librosControlador;
use App\Http\Controllers\CategoryController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/test', function() {
        return Inertia::render('test');
    }); 

    /*Route::get('/Categoria',[CategoryController::class,'index'])
    ->name('category.index');

    Route::get('/Crear',[CategoryController::class,'create'])
    ->name('category.create');

    simplificando esos dos llamados alcontrolador (index,create)*/

    Route::resource('category',CategoryController::class);
    Route::resource('product',ProductController::class);

    /* ejemplo para que la ruta tenga autenticación
    Route::get('v1/libros', [librosControlador::class, 'listarLibros']) -> name('apiLibros.listar');*/

});




Route::get('/saludar',function(){
    return 'Hola mundo!!';
});

/*Ejemplo llamando al controlador sin instanciarlo´

Route::get('v1/libros', [App\Http\Controllers\librosControlador::class, 'listarLibros']) -> name('apiLibros.listar');

Route :: get('/v1/libros/{id}', [App\Http\Controllers\librosControlador:: class, 'codigoLibro'])  -> name('apiLibros.porCodigo');

Route:: get('/v2/libros', [App\Http\Controllers\librosControlador::class, 'buscarLibro'])  -> name('apiLibros.buscar');
*/

Route::get('v1/libros', [librosControlador::class, 'listarLibros']) -> name('apiLibros.listar');

Route :: get('/v1/libros/{id}', [librosControlador:: class, 'codigoLibro'])  -> name('apiLibros.porCodigo');

Route:: get('/v2/libros', [librosControlador::class, 'buscarLibro'])  -> name('apiLibros.buscar');