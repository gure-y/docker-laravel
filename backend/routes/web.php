<?php

use App\Http\Controllers\ItemsController;

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
Route::get('/',[ItemsController::class, 'index'])->name('index');
Auth::routes();

Route::get('/show/{id}', [ItemsController::class, 'show'])->name('show');

Route::get('/bookmark', [ItemsController::class, 'bookmark'])->name('bookmark');
Route::post('/bookmark', [ItemsController::class, 'addBookmark'])->name('addBookmark');

//管理者ユーザーにのみ許可
Route::prefix('admin')->middleware('can:admin')->group(function() {
  Route::get('/create',[ItemsController::class, 'create'])->name('create');
  Route::post('/store',[ItemsController::class, 'store'])->name('store');
  
  Route::get('/edit/{id}', [ItemsController::class, 'edit'])->name('edit');
  Route::post('/update', [ItemsController::class, 'update'])->name('update');
  
  Route::get('/delete/{id}', [ItemsController::class, 'delete'])->name('delete');
  Route::get('/adminpage',[ItemsController::class, 'adminpage'])->name('adminpage');
});