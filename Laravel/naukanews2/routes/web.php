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
Route::get('/naukanews',[IndexController::class,'Index'])->name('index');
Route::get('/login',[IndexController::class,'LoginShow'])->name('formlogin');
Route::post('/loginp',[IndexController::class,'Login'])->name('login');
Route::get('/reg',[IndexController::class,'RegShow'])->name('formreg');
Route::post('/regp',[IndexController::class,'Reg'])->name('reg');
Route::get('/refresh',[IndexController::class,'Refresh'])->name('refresh');
Route::get('/rubric/{name}',[IndexController::class,'Rubric'])->name('rubric');
Route::get('/statya/{id}',[IndexController::class,'Statya'])->name('statya')->whereNumber('id');
Route::get('/statya/delete/{id}/{rname?}',[IndexController::class,'DeleteStat'])->name('deletestat')->whereNumber('id');
Route::get('/addform/{name}',[IndexController::class,'AddShow'])->name('formadd');
Route::post('/add/{name}',[IndexController::class,'Add'])->name('add');
Route::get('/change/{name}/{id}',[IndexController::class,'ChangeShow'])->name('formchange')->whereNumber('id');
Route::post('/change/{name}/{id}',[IndexController::class,'Change'])->name('change')->whereNumber('id');
//Auth::routes(['register'=>false,'verify'=>false,'confirm'=>false,'reset'=>false]);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
