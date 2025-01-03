<?php

use App\Http\Controllers\KNTDangnhapController;
use App\Http\Controllers\KNTLoaiSPController;
use App\Http\Controllers\KNTQuanTriController;
use App\Http\Controllers\KNTSanphamController;
use App\Http\Controllers\KNTKhachhangController;
use App\Http\Controllers\KNTHoadonController;
use App\Http\Controllers\KNTCTHoadonController;
use App\Http\Controllers\KNTGiohangController;
use App\Http\Controllers\KNTCTGiohangController;
use App\Http\Controllers\KNTUserController;
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
Route::post('/knt-admin/login', [KNTDangnhapController::class,'KNTloginSubmit']);

Route::group(['prefix' => 'knt-admin', 'middleware' => 'KNTadmin.auth'], function () {
    Route::get('/', [KNTDangnhapController::class, 'KNTindex'])->name('KNTadmin.index');
    Route::get('/logout', [KNTDangnhapController::class, 'KNTlogout'])->name('KNTadmin.logout');
    Route::group(['prefix' => 'knt-loaisp'], function(){
        Route::get('/', [KNTLoaiSPController::class,'KNTindex'])->name('KNTadmin.KNTLoaiSP.index');
        Route::get('/create', [KNTLoaiSPController::class,'KNTcreate'])->name('KNTadmin.KNTLoaiSP.create');
        Route::post('/create', [KNTLoaiSPController::class,'KNTstore'])->name('KNTadmin.KNTLoaiSP.store');
        Route::get('/{kntMaLoai}', [KNTLoaiSPController::class, 'KNTshow'])->name('KNTadmin.KNTLoaiSP.show');
        Route::get('/{kntMaLoai}/edit', [KNTLoaiSPController::class, 'KNTedit'])->name('KNTadmin.KNTLoaiSP.edit');
        Route::post('/{kntMaLoai}/edit', [KNTLoaiSPController::class, 'KNTupdate']);
        Route::delete('/{kntMaLoai}/delete',[KNTLoaiSPController::class, 'KNTdestroy'])->name('KNTadmin.KNTLoaiSP.delete');
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
    Route::group(['prefix' => 'knt-khachhang'], function(){
        Route::get('/', [KNTKhachhangController::class,'KNTindex'])->name('KNTadmin.KNTKhachhang.index');
        Route::get('/create', [KNTKhachhangController::class,'KNTcreate'])->name('KNTadmin.KNTKhachhang.create');
        Route::post('/create', [KNTKhachhangController::class, 'KNTstore']);
        Route::get('{kntMaKH}/edit', [KNTKhachhangController::class, 'KNTedit'])->name('KNTadmin.KNTKhachhang.edit');
        Route::post('{kntMaKH}/edit', [KNTKhachhangController::class, 'KNTupdate']);
        Route::delete('/{kntMaKH}/delete', [KNTKhachhangController::class, 'KNTdestroy'])->name('KNTadmin.KNTKhachhang.delete');
    });
    Route::group(['prefix' => 'knt-giohang'], function(){
        Route::get('/', [KNTGiohangController::class,'KNTindex'])->name('KNTadmin.KNTGiohang.index');
        Route::group(['prefix' => 'knt-ctgiohang'], function(){
            Route::get('/', [KNTCTGiohangController::class, 'KNTindex'])->name('KNTadmin.KNTCTGiohang.index');
            Route::get('/create', [KNTCTGiohangController::class, 'KNTcreate'])->name('KNTadmin.KNTCTGiohang.create');
            Route::post('/create', [KNTCTGiohangController::class, 'KNTstore'])->name('KNTadmin.KNTCTGiohang.store');
            Route::get('/{kntctgiohang}', [KNTCTGiohangController::class, 'KNTshow'])->name('KNTadmin.KNTCTGiohang.show');
            Route::get('/{kntctgiohang}/create', [KNTCTGiohangController::class, 'KNTcreateID'])->name('KNTadmin.KNTCTGiohang.createID');
            Route::post('/{kntctgiohang}/create', [KNTCTGiohangController::class, 'KNTstoreID'])->name('KNTadmin.KNTCTGiohang.storeID');
            Route::get('/{kntmagh}/{kntmasp}/upload', [KNTCTGiohangController::class, 'KNTupload'])->name('KNTadmin.KNTCTGiohang.upload');
            Route::get('/{kntmagh}/{kntmasp}/edit', [KNTCTGiohangController::class,'KNTedit'])->name('KNTadmin.KNTCTGiohang.KNTedit');
            Route::post('/{kntmagh}/{kntmasp}/edit', [KNTCTGiohangController::class,'KNTupdate']);
            Route::delete('/{kntmagh}/{kntmasp}/delete',[KNTCTGiohangController::class, 'KNTdestroy'])->name('KNTadmin.KNTCTGiohang.KNTdelete');
            Route::delete('/{kntmagh}/{kntmasp}/delete-id',[KNTCTGiohangController::class, 'KNTdestroyID'])->name('KNTadmin.KNTCTGiohang.KNTdeleteID');
        });
    });
    Route::group(['prefix' => 'knt-hoadon'], function(){
        Route::get('/', [KNTHoadonController::class,'KNTindex'])->name('KNTadmin.KNTHoadon.index');
        Route::get('/{knthoadon}', [KNTHoadonController::class,'KNTshow'])->name('KNTadmin.KNTHoadon.show');
        Route::delete('/{knthoadon}/delete', [KNTHoadonController::class,'KNTdelete'])->name('KNTadmin.KNTHoadon.KNTdelete');
    });
});

Route::get('/', [KNTUserController::class, 'KNTindex'])->name('KNTuser.index');
Route::get('/login', [KNTUserController::class, 'KNTlogin'])->name('KNTuser.login');
Route::post('/login', [KNTUserController::class, 'KNTloginSubmit']);
Route::get('/register', [KNTUserController::class, 'KNTregister'])->name('KNTuser.register');
Route::post('/register', [KNTUserController::class, 'KNTregisterSubmit']);
Route::get('/about', [KNTUserController::class,'KNTabout'])->name('KNTuser.about');
Route::get('/logout', [KNTUserController::class,'KNTlogout'])->name('KNTuser.logout');
Route::get('/user/{id}', [KNTUserController::class,'KNTuserindex'])->name('KNTuser.user');
Route::get('/cart/{id}', [KNTUserController::class, 'KNTcart'])->name('KNTuser.cart');
Route::get('/product', [KNTUserController::class,'KNTlist'])->name('KNTuser.list');
Route::get('/product/{id}', [KNTUserController::class,'KNTshow'])->name('KNTuser.show');
Route::post('/product/{id}', [KNTUserController::class,'KNTaddcart'])->name('KNTuser.addcart');
Route::post('/user/{id}', [KNTUserController::class,'KNTuserupdate'])->name('KNTuser.userupdate');
