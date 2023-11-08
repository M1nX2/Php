<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ApiController;
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

Route::get('/', function () {
    return view('main');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/index/{mes?}', [CourseController::class, 'index'])->name('index');
    Route::get('/rubric/{rubric_name}', [CourseController::class, 'rubric'])->name('rubric');
    Route::get('/rubricadmin/{rubric_name}', [CourseController::class, 'rubricadmin'])->name('rubricadmin');
    Route::get('/statya/{id}', [CourseController::class, 'statya'])->name('statya')->whereNumber('id');
    Route::post('/coursereg/{id}',[CourseController::class, 'coursereg'])->name('coursereg')->whereNumber('id');
    Route::post('/coursecancel/{id}/{user_id}',[CourseController::class, 'coursecancel'])->name('coursecancel')->whereNumber('id')->whereNumber('user_id');
    Route::get('/prof/{mes?}',[CourseController::class, 'prof'])->name('prof');
    Route::get('/adminprof/{mes?}',[CourseController::class, 'adminprof'])->name('adminprof');
    Route::get('/profile', [UserController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [UserController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [UserController::class, 'destroy'])->name('profile.destroy');
    Route::get('/indexadmin/{mes?}', [CourseController::class, 'indexadmin'])->name('indexadmin');
    Route::get('/formadd', [CourseController::class, 'AddShow'])->name('formadd');
    Route::get('/formchange/{id}', [CourseController::class, 'ChangeShow'])->name('formchange');
    Route::delete('/formdelete/{id}', [CourseController::class, 'formdelete'])->name('formdelete');
    Route::post('/formadd', [CourseController::class, 'Add'])->name('add');
    Route::post('/formchange/{id}', [CourseController::class, 'Change'])->name('change');
    Route::get('/formrecord/{id}', [CourseController::class, 'RecordShow'])->name('formrecord');
    Route::delete('/recordelete/{id}/{user_id}', [CourseController::class, 'recordelete'])->name('recordelete');
    Route::get('/api',[ApiController::class,'list']);
    Route::get('/api/{id}', [ApiController::class,'detail']);
});

require __DIR__.'/auth.php';
