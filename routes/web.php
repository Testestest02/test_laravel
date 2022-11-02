<?php

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

Route::get('/', function () {
    return view('welcome');
});
// ルートグループとloggerミドルウェア使用。ルートモデルウェア結合。
Route::group(['prefix' => 'tests', 'as'=> 'tests.', 'middleware' => 'logger'], function(){
    Route::get('/', [App\Http\Controllers\TestController::class, 'index'])->name('index');
    Route::get('create', [App\Http\Controllers\TestController::class, 'create'])->name('create');
    Route::post('/', [App\Http\Controllers\TestController::class, 'store'])->name('store');
    Route::get('{test}', [App\Http\Controllers\TestController::class, 'edit'])->name('edit');
    Route::post('{test}', [App\Http\Controllers\TestController::class, 'update'])->name('update');
    Route::delete('{test}', [App\Http\Controllers\TestController::class, 'destroy'])->name('destroy');
});

// ルートグループとloggerミドルウェア使用
// Route::group(['prefix' => 'tests', 'as'=> 'tests.', 'middleware' => 'logger'], function(){
//     Route::get('/', [App\Http\Controllers\TestController::class, 'index'])->name('index');
//     Route::get('create', [App\Http\Controllers\TestController::class, 'create'])->name('create');
//     Route::post('/', [App\Http\Controllers\TestController::class, 'store'])->name('store');
//     Route::get('{id}', [App\Http\Controllers\TestController::class, 'edit'])->name('edit');
//     Route::post('{id}', [App\Http\Controllers\TestController::class, 'update'])->name('update');
//     Route::delete('{id}', [App\Http\Controllers\TestController::class, 'destroy'])->name('destroy');
// });

// 単純なルート
// Route::get('/tests', [App\Http\Controllers\TestController::class, 'index'])->name('tests.index');
// Route::get('/tests/create', [App\Http\Controllers\TestController::class, 'create'])->name('tests.create');
// Route::post('/tests', [App\Http\Controllers\TestController::class, 'store'])->name('tests.store');
// Route::get('/tests/{id}', [App\Http\Controllers\TestController::class, 'edit'])->name('tests.edit');
// Route::post('/tests/{id}', [App\Http\Controllers\TestController::class, 'update'])->name('tests.update');
// Route::delete('/tests/{id}', [App\Http\Controllers\TestController::class, 'destroy'])->name('tests.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
