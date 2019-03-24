<?php

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
    return view('inicio');
});
/*
    Con resource podemos generar las rutas para cierto Controller, en este caso, para artículos
    Primer parámetro: nombre de la ruta, segundo parámetro: nombre del controlador
    Con php artisan route:list podemos ver todas las rutas con su información
*/
Route::resource('articulos','ArticulosController');
Route::resource('categorias','CategoriasController');
