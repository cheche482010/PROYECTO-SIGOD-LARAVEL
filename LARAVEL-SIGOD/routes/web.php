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
//     return view('welcome');
// }); 

Route::resource('Aulas', 'AulasController');

Route::resource('Actividades', 'ActividadesController');

Route::resource('Unidades_Curriculares', 'Unidades_CurricularesController');

Route::resource('Docentes', 'DocentesController');