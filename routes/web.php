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

    //pacientes
    Route::get('/pacientes/search', 'PacientesController@search')->name('pacientes.search');
    
    //agendas
    Route::post('/agendas/agendarLote', 'AgendasController@agendarLote')->name('agendas.agendarLote');
    Route::get('/agendas/{pacienteId}/agendarForm', 'AgendasController@agendarForm')->name('agendas.agendarForm');
    Route::get('/agendas/agendarLoteForm', 'AgendasController@agendarLoteForm')->name('agendas.agendarLoteForm');
    
    //atendimentos
    Route::get('atendimentos/{paciente_id}/create', 'AtendimentosController@create')->name('atendimentos.create');
    
    //cruds
    Route::resource('pacientes', 'PacientesController');
    Route::resource('agendas', 'AgendasController');
    Route::resource('campanhas', 'CampanhasController');
    Route::resource('atendimentos', 'AtendimentosController')->except('create');

});