<?php

use App\Jobs\envioEmailVerifica;
use App\Mail\mailBienvenida;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

   
    return view('welcome');
});

Auth::routes(['verify' => true]); // Comprueba la existencia del correo

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*$mail = new mailBienvenida();

Mail::to('mario.cuadra@ubo.cl')->queue($mail);*/

