<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthApiController@login');
    Route::post('logout', 'AuthApiController@logout');
    Route::post('refresh', 'AuthApiController@refresh');
    Route::post('me', 'AuthApiController@me');

});

/*Route::apiResource('artikel','ArtikelAPIController');

Route::get('artikel','ArtikelAPIController@index');
Route::post('artikel','ArtikelAPIController@store');
Route::put('artikel/{id}','ArtikelAPIController@update');
Route::delete('artikel/{id}','ArtikelAPIController@destroy');
Route::get('artikel/{id}','ArtikelAPIController@show');
*/


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Jangan Ubah Isi dari Route/api.php

//Soal1
//Tampilkan kategori berita dengan id=40 dan dibuat oleh orang dengan email ntarihoran@siregar.org
Route::get('soal1','BabSatuController@a1')->name('soal1');

//Soal2
//Tampilkan Kategori Berita dari berita yang ditulis oleh orang dengan email yang diakhiri @wulandari.in
Route::get('soal2','BabSatuController@a2');

//Soal3
//Tampilkan Pengumuman yang ditulis oleh orang yang membuat kategori artikel id = 5 atau membuat kategori artikel id = 20 , sertakan user pembuat pengumumannya
Route::post('soal3','BabSatuController@a3');

//Soal4
//Tampilkan berita yang dibuat oleh user yang membuat pengumuman, artikel, galeri dan kategori_artikel
Route::post('soal4','BabDuaController@a4');

//Soal5
//Tampilkan artikel yang dibuat oleh user yang membuat galeri dengan nama kategori galeri yang di akhiri dengan et.
Route::put('soal5','BabDuaController@a5');


