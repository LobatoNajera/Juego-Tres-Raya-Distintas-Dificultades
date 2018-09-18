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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'MainGameController@home');

Auth::routes();


Route::resource('avances_users', 'AvancesUsersController');
Route::post('seleccionar_personaje', 'AvancesUsersController@seleccionar_personaje');
Route::post('save_personaje_seleccionado', 'AvancesUsersController@save_personaje_seleccionado');


Route::resource('saves_games', 'SavesGamesController');
Route::get('new_saves_games', 'SavesGamesController@new_saves_games');
Route::get('load_saves_games', 'SavesGamesController@load_saves_games');


Route::resource('personajes', 'PersonajesController');
Route::get('informacion_personajes', 'PersonajesController@informacion_personajes');

Route::resource('enemigos', 'EnemigosController');
Route::get('informacion_enemigos', 'EnemigosController@informacion_enemigos');


Route::get('bosses','BossesController@bosses');


