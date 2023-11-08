<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;


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
//мейн
Route::get('/category', [IndexController::class,'category'])->name('category');
//вход
Route::get('/enter', [UserController::class,'enter'])->name('enter');
Route::post('/enter', [UserController::class,'login'])->name('login');
//выход
Route::get('/exit',[UserController::class, 'exit']);
//регистрация
Route::get('/registration', [UserController::class,'reg']);
Route::post('/registration',[UserController::class, 'reg'])->name('registration');
Route::post('/reg',[UserController::class, 'regi'])->name('reg');
//мейн по категориям
Route::get('/category/{id}', [IndexController::class,'show_category']);
//лк
Route::get('/cabinet', [IndexController::class,'cabinet'])->name('cabinet');
//добавить
Route::get('/add',[IndexController::class, 'add']);
Route::post('/add-content',[IndexController::class, 'add_content'])->name('add_content');
//изменить
Route::get('/change/{id}',[IndexController::class, 'change']);
Route::post('/change',[IndexController::class, 'change_content'])->name('change_content');
//запись+подтверждение
Route::get('/confirmation/{id}',[IndexController::class, 'confirmation']);
Route::delete('/unsubscribe/{id}', [IndexController::class, 'unsubscribe'])->name('unsubscribe');
Route::post('/confirmation/{id}',[IndexController::class, 'confirmation_content'])->name('confirmation_content');
Route::post('/confirmationcan',[IndexController::class, 'confirmation_cancel'])->name('cancel');

Route::get('/available-times/{date}',[IndexController::class, 'get_date'] );
