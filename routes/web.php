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

Route::group(['namespace' => 'App\Http\Controllers'], function () {

    Route::get('/', 'Dashboard@index')->name('home.index');

    Route::group(['prefix' => 'login', 'middleware' => ['guest'], 'as' => 'login.'], function () {
        Route::get('/login-akun', 'Auth@show')->name('login-akun');
        Route::post('/login-proses', 'Auth@login_proses')->name('login-proses');
    });

    Route::group(['prefix' => 'registrasi', 'middleware' => ['guest'], 'as' => 'registrasi.'], function () {
        Route::get('/registrasi-akun', 'Auth@registrasi')->name('registrasi-akun');
        Route::post('/registrasi-proses', 'Auth@register_proses')->name('registrasi-proses');
    });

    Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {
        Route::get('/dashboard-admin', 'Dashboard@dashboard')->name('dashboard-admin');

        Route::get('/datauser', 'DataUser@index')->name('datauser');
        Route::get('/get-datauser', 'DataUser@get')->name('get-datauser');
        // Route::post('/add-datauser', 'DataUser@store')->name('add-datauser');
        // Route::get('/show-datauser/{params}', 'DataUser@show')->name('show-datauser');
        Route::post('/update-datauser/{params}', 'DataUser@update')->name('update-datauser');
        Route::delete('/delete-datauser/{params}', 'DataUser@delete')->name('delete-datauser');

        Route::get('/kategori', 'KategoriSoalController@index')->name('kategori');
        Route::get('/get-kategori', 'KategoriSoalController@get')->name('get-kategori');
        Route::post('/add-kategori', 'KategoriSoalController@store')->name('add-kategori');
        Route::get('/show-kategori/{params}', 'KategoriSoalController@show')->name('show-kategori');
        Route::post('/update-kategori/{params}', 'KategoriSoalController@update')->name('update-kategori');
        Route::delete('/delete-kategori/{params}', 'KategoriSoalController@delete')->name('delete-kategori');

        Route::get('/soal', 'SoalController@index')->name('soal');
        Route::get('/get-soal', 'SoalController@get')->name('get-soal');
        Route::post('/add-soal', 'SoalController@store')->name('add-soal');
        Route::get('/show-soal/{params}', 'SoalController@show')->name('show-soal');
        Route::post('/update-soal/{params}', 'SoalController@update')->name('update-soal');
        Route::delete('/delete-soal/{params}', 'SoalController@delete')->name('delete-soal');

        Route::get('/nilai', 'Nilai@index')->name('nilai');
        Route::get('/get-nilai', 'Nilai@get')->name('get-nilai');

        // Route::get('/ubahpassword', 'UbahPassword@index')->name('ubahpassword');
        // Route::post('/update-password/{params}', 'UbahPassword@update')->name('update-password');
    });

    Route::group(['prefix' => 'user', 'middleware' => ['auth'], 'as' => 'user.'], function () {
        Route::get('/dashboard-user', 'Dashboard@dashboard_user')->name('dashboard-user');

        Route::get('/soal', 'Kuis@index')->name('soal');
        Route::get('/detail-soal/{params}', 'Kuis@detail_soal')->name('detail-soal');

        Route::post('/store-jawaban', 'Kuis@store')->name('store-jawaban');

        // Route::get('/datauser', 'DataUser@index')->name('datauser');
        // Route::get('/get-datauser', 'DataUser@get')->name('get-datauser');
        // // Route::post('/add-datauser', 'DataUser@store')->name('add-datauser');
        // // Route::get('/show-datauser/{params}', 'DataUser@show')->name('show-datauser');
        // Route::post('/update-datauser/{params}', 'DataUser@update')->name('update-datauser');
        // Route::delete('/delete-datauser/{params}', 'DataUser@delete')->name('delete-datauser');

        // Route::get('/ubahpassword', 'UbahPassword@index')->name('ubahpassword');
        // Route::post('/update-password/{params}', 'UbahPassword@update')->name('update-password');
    });

    Route::get('/logout', 'Auth@logout')->name('logout');
});
