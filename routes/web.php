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

// Route::get('/', function () {
//     return view('login');
// });

Route::get('/', 'loginController@login')->name('login');
Route::get('/login', 'loginController@login');
Route::POST('/valida','loginController@valida')->name('valida');
Route::get('/inicio', 'loginController@inicio')->name('inicio');
Route::get('/registrate', 'loginController@registrate')->name('registrate');
Route::POST('/guardaregistro', 'loginController@guardaregistro')->name('guardaregistro');
Route::get('/logout','loginController@logout')->name('logout');


Route::get('/grupos', 'gruposController@grupos')->name('grupos');
Route::POST('/guardagrupo', 'gruposController@guardagrupo')->name('guardagrupo');
Route::name('editagrupo')->put('/editagrupo/{id_grupo}','gruposController@editagrupo');
Route::name('eliminagrupo')->delete('/eliminagrupo/{id_grupo}','gruposController@eliminagrupo');

Route::get('/carreras', 'carrerasController@carreras')->name('carreras');
Route::POST('/guardacarrera', 'carrerasController@guardacarrera')->name('guardacarrera');
Route::name('editacarrera')->put('/editacarrera/{id_carrera}','carrerasController@editacarrera');
Route::name('eliminacarrera')->delete('/eliminacarrera/{id_carrera}','carrerasController@eliminacarrera');

Route::get('/alumnos', 'alumnosController@alumnos')->name('alumnos');
Route::POST('/guardaalumno', 'alumnosController@guardaalumno')->name('guardaalumno');
Route::name('editaalumno')->put('/editaalumno/{id_alumno}','alumnosController@editaalumno');
Route::name('eliminaalumno')->delete('/eliminaalumno/{id_alumno}','alumnosController@eliminaalumno');
