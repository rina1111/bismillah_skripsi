<?php


use RealRashid\SweetAlert\Facades\Alert;

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
    return view('welcome2');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('mknn/index', 'mknn@index');
Route::get('mknn/datatraining', 'mknn@datatraining');
Route::post('/mknn/inserttraining', 'mknn@inserttraining');
Route::get('/mknn/{id}/deletetraining', 'mknn@delete');
Route::get('/mknn/{id}/edittraining', 'mknn@edit' );
Route::post('/mknn/{id}/updatetraining', 'mknn@update');
Route::post('/mknn/importfile', 'mknn@importfile');
Route::get('mknn/normalisasidata', 'mknn@normalisasi_data');
