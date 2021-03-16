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

Route::get('/', 'AuthController@showLoginForm')->name('admin.showLoginForm');
Route::get('/logout', 'AuthController@logout')->name('admin.logout');
Route::post('/auth', 'AuthController@auth')->name('admin.auth');

Route::get('/admin/home', 'HomeController@index')->name('admin.home');

Route::prefix('admin')->group(function () {
    Route::get('/pacientes/search', 'PacientesController@search')->name('pacientes.search');
    Route::get('/pacientes/agendamento', 'PacientesController@agendamento')->name('pacientes.agendamento');
    Route::resource('pacientes', 'PacientesController');

    Route::post('/agendas/agendarLote', 'AgendasController@agendarLote')->name('agendas.agendarLote');
    Route::resource('agendas', 'AgendasController');
});