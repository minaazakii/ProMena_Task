<?php

use App\Http\Controllers\AlbumController;
use App\Models\Album;
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
    return view('app');
});

Route::prefix('album')->group(function()
{
    Route::get('/index',[AlbumController::class,'index'])->name('album.index');
    Route::get('/create',[AlbumController::class,'create'])->name('album.create');
    Route::get('/show/{album}',[AlbumController::class,'show'])->name('album.show');
    Route::POST('/store',[AlbumController::class,'store'])->name('album.store');
    Route::get('/edit/{album}',[AlbumController::class,'edit'])->name('album.edit');
    Route::PUT('/update/{album}',[AlbumController::class,'update'])->name('album.update');
    Route::DELETE('/delete',[AlbumController::class,'delete'])->name('album.delete');
    Route::get('/move/{id}',[AlbumController::class,'moveIndex'])->name('album.move');
    Route::POST('/move/{albumToDelete}',[AlbumController::class,'moveTo'])->name('album.moveTo');
});
