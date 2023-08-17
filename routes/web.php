<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('/auth/login');
});

Route::get('/produtos/novo', 'App\Http\Controllers\ProdutosController@create');

Route::post('/produtos/novo', 'App\Http\Controllers\ProdutosController@store')->name('registrar-produto');

Route::get('/produtos/ver/{id}', 'App\Http\Controllers\ProdutosController@show');

Route::get('/produtos/editar/{id}', 'App\Http\Controllers\ProdutosController@edit')->middleware('auth');

Route::post('/produtos/editar/{id}', 'App\Http\Controllers\ProdutosController@update')->name('alterar-produto');

Route::get('/produtos/excluir/{id}', 'App\Http\Controllers\ProdutosController@delete')->middleware('auth');

Route::post('/produtos/excluir/{id}', 'App\Http\Controllers\ProdutosController@destroy')->name('excluir-produto');

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

Auth::routes();

Route::get('/produtos/novo', [App\Http\Controllers\ProdutosController::class, 'create'])->name('create')->middleware('auth');
