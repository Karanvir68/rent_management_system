<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\TenantController;

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
Route::get('billdetails',[ApplicationController::class,'bill_details'])->name('billdetails');
Route::get('edit/bill/{id}',[ApplicationController::class,'editBill'])->name('edit.bill');
Route::put('updatebill/{id}',[ApplicationController::class,'updateBill'])->name('update.bill');

Route::get('get-basecharge/{id}', [TenantController::class,'get_basecharge'])->name('base_charge');

Route::get('tenants', [TenantController::class, 'viewTenants'])->name('tenants');
Route::get('edit/tenants/{id}',[TenantController::class,'editTenant'])->name('edit.tenant');
Route::put('updateTenants/{id}',[TenantController::class,'updateTenant'])->name('update.tenants');
Route::get('createTenants',[TenantController::class,'createTenant'])->name('create.tenants');
Route::post('addTenants',[TenantController::class,'addTenant'])->name('add.tenants');
Route::delete('deleteTenants/{id}',[TenantController::class,'deleteTenant'])->name('delete.tenant');



Route::post('previewbill',[ApplicationController::class,'Preview_Bill']);