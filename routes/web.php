<?php

use App\Http\Controllers\KNTDangnhapController;
use App\Http\Controllers\KNTLoaiSPController;
use App\Http\Controllers\KNTQuanTriController;
use App\Http\Controllers\KNTSanphamController;
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
Route::get('/knt-admin/login', [KNTDangnhapController::class,'KNTlogin'])->name('KNTadmin.login');

Route::group(['prefix' => 'knt-admin'], function(){
    Route::get('/', [KNTDangnhapController::class, 'KNTindex'])->name('KNTadmin.index');
    Route::get('/logout',[KNTDangnhapController::class, 'KNTlogout'])->name('KNTadmin.logout');
    Route::group(['prefix' => 'knt-loaisp'], function(){
        Route::get('/', [KNTLoaiSPController::class,'KNTindex'])->name('KNTadmin.KNTLoaiSP.index');
        Route::get('/create', [KNTLoaiSPController::class,'KNTcreate'])->name('KNTadmin.KNTLoaiSP.create');
        Route::post('/create', [KNTLoaiSPController::class,'KNTstore'])->name('KNTadmin.KNTLoaiSP.store');
        Route::get('/{kntMaLoai}', [KNTLoaiSPController::class, 'KNTshow'])->name('KNTadmin.KNTLoaiSP.show');
        Route::get('/{kntMaLoai}/edit', [KNTLoaiSPController::class, 'KNTedit'])->name('KNTadmin.KNTLoaiSP.edit');
        Route::post('/{kntMaLoai}/edit', [KNTLoaiSPController::class, 'KNTupdate']);
        Route::delete('/{kntMaLoai}/delete',[KNTLoaiSPController::class, 'KNTdestroy'])->name('KNTadmin.KNTLoaiSP.delete');
    });
    Route::group(['prefix' => 'knt-quantri'], function(){
        Route::get('/', [KNTQuanTriController::class,'KNTindex'])->name('KNTadmin.KNTQuanTri.index');
        Route::get('/create', [KNTQuanTriController::class,'KNTcreate'])->name('KNTadmin.KNTQuanTri.create');
        Route::post('/create', [KNTQuanTriController::class, 'KNTstore']);
        Route::get('{id}/edit', [KNTQuanTriController::class, 'KNTedit'])->name('KNTadmin.KNTQuanTri.edit');
        Route::post('{id}/edit', [KNTQuanTriController::class, 'KNTupdate']);
        Route::delete('/{id}/delete', [KNTQuanTriController::class, 'KNTdestroy'])->name('KNTadmin.KNTQuanTri.delete');
    });
    Route::group(['prefix' => 'knt-sanpham'], function(){
        Route::get('/', [KNTSanphamController::class,'KNTindex'])->name('KNTadmin.KNTSanpham.index');
        Route::get('/create', [KNTSanphamController::class,'KNTcreate'])->name('KNTadmin.KNTSanpham.create');
        Route::post('/create', [KNTSanphamController::class,'KNTstore'])->name('KNTadmin.KNTSanpham.store');
        Route::get('/{kntMaSP}', [KNTSanphamController::class, 'KNTshow'])->name('KNTadmin.KNTSanpham.show');
        Route::get('/{kntMaSP}/edit', [KNTSanphamController::class, 'KNTedit'])->name('KNTadmin.KNTSanpham.edit');
        Route::post('/{kntMaSP}/edit', [KNTSanphamController::class, 'KNTupdate']);
        Route::delete('/{kntMaSP}/delete',[KNTSanphamController::class, 'KNTdestroy'])->name('KNTadmin.KNTSanpham.delete');
    });
});
