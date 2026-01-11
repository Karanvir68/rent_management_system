<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;

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

Route::get('/',[ApplicationController::class,'rent_details']);
Route::get('/home',[ApplicationController::class,'home'])->name('home');
Route::get('generate',[ApplicationController::class,'generate'])->name('generate');

Route::post('previewbill',[ApplicationController::class,'Preview_Bill']);