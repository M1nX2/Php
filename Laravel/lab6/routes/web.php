<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
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
Route::get('/resume',[IndexController::class,'Index']);
Route::get('/resume/show/{id}',[IndexController::class,'Show'])->whereNumber('id')->name('resumeShow');
Route::get('/resume/query1',[IndexController::class,'Query1']);
Route::get('/resume/query2',[IndexController::class,'Query2']);
Route::get('/resume/query3',[IndexController::class,'Query3']);
Route::get('/resume/query4',[IndexController::class,'Query4']);
Route::delete('/resume/delete/{id}',[IndexController::class, 'delete_resume'])->whereNumber('id')->name('resumeDelete');
Route::get('/add',[IndexController::class, 'add']);
Route::post('/add',[IndexController::class, 'store'])->name('resumeStore');
Route::get('/resume/change/{id}',[IndexController::class, 'changeShow'])->name("changeShow")->whereNumber('id');
Route::post('/resume/change/{id}',[IndexController::class, 'change'])->name('resumeChange')->whereNumber('id');