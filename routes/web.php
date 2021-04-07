<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FormsController;
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

Auth::routes();

Route::get('/home',[HomeController::class,'index'])->name('home');
Route::get('/comments', [CommentsController::class, 'index'])->name('comments');
Route::get('/create',[CommentsController::class,'create'])->name('create');
Route::post('/create',[CommentsController::class,'store'])->name('store');
Route::get('/delete/{id}',[CommentsController::class,'destroy'])->name('delete');
Route::get('/edit/{id}',[CommentsController::class,'edit'])->name('edit');
Route::put('/updateComment/{id}',[CommentsController::class,'update'])->name('updateComment');


Route::get('/forms',[FormsController::class,'index'])->name('formularz');
Route::get('/createForm',[FormsController::class,'create'])->name('createForms');
Route::post('/createForm',[FormsController::class,'store'])->name('storeForm');
Route::get('/deleteForm/{id}',[FormsController::class,'destroy'])->name('deleteForm');
Route::get('/editForm/{id}',[FormsController::class,'edit'])->name('editForm');
Route::put('/updateForm/{id}',[FormsController::class,'update'])->name('updateForm');
Route::get('/chessStats',[\App\Http\Controllers\ChessApi::class,'GetMyStats'])->name('chessStats');