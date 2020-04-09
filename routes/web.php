<?php

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

/*
Route::get('/', function () {
    return view('auth.login');
});*/

//Auth::routes();

//Route::get('/admin', 'MuestreoController@index')->name('front.muestreos.index');
//Route::get('/muestreos/{id}', 'MuestreoController@show')->name('front.muestreos.show'); //{} ahi va los elementos que queremos que sean dinamicos

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@dashboard')->name('admin.dashboard');



//Atajo para establecer las 7 rutas básicas de un recurso
//Index, show, create, store, edit, update, destroy
Route::resource('/admin/muestreos', 'Admin\MuestreoController');
Route::resource('/admin/usuarios', 'Admin\UsuarioController');



Auth::routes(['register' => false]);