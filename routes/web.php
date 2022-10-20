<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
});







Route::get('/saludar',function(){
    return 'Hola mundo!!';
});

Route::get('/libros',function(){
    $datos = ['libro uno','libro dos', 'libro tres'];
    return $datos;
});

Route::get('/v1/libros/{id}', function($id) {
    $datos = [
        ['id' => 1, 'nombre' => 'Harry Potter y la piedra Filosofal'],
        ['id' => 2, 'nombre' => 'Harry Potter y la camara secreta'],
        ['id' => 3, 'nombre' => 'Harry Potter y el prisionero de Azcaban']
    ];
    $res = array_filter($datos, function($item) use($id){
        return $item['id']== $id;
    });
    return $res;
});

Route::get('/v2/libros/{id}', function($id) {
    $datos = [
        ['id' => 1, 'nombre' => 'Harry Potter y la piedra Filosofal'],
        ['id' => 2, 'nombre' => 'Harry Potter y la camara secreta'],
        ['id' => 3, 'nombre' => 'Harry Potter y el prisionero de Azcaban']
    ];
    $nombre = array_filter($datos, function($item) use($id){
        return $item['id']== $id;
    });
    return $res;
});