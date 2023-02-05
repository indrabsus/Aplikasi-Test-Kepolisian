<?php

use App\Http\Controllers\Hasil;
use App\Http\Livewire\Admin\FirstTest;
use App\Http\Livewire\Admin\Index;
use App\Http\Livewire\Admin\Peserta;
use App\Http\Livewire\Admin\SecondTest;
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
// Route::get('/', 'App\Http\Controllers\AuthController@index')->name('login');
Route::get('/login', 'App\Http\Controllers\AuthController@login')->name('loginredirect');
Route::post('proses_login', 'App\Http\Controllers\AuthController@proses_login')->name('proses_login');
Route::get('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

Route::get('/', function () {
    return view('welcome');
})->name('loginui');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:admin']], function () {
        Route::get('admin', Index::class)->name('indexAdmin');
        Route::get('admin/hasil/{id}', 'App\Http\Controllers\Hasil@index')->name('hasil');
        Route::get('peserta', 'App\Http\Controllers\Hasil@peserta')->name('hasilpeserta');
        Route::get('admin/peserta', Peserta::class)->name('peserta');
        Route::get('admin/test1', FirstTest::class)->name('test1');
        Route::get('admin/test2', SecondTest::class)->name('test2');
    });

    Route::group(['middleware' => ['cek_login:peserta']], function () {
        Route::get('peserta', 'App\Http\Controllers\Hasil@peserta')->name('hasilpeserta');
    });


});

