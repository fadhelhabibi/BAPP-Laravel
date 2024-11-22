<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\VarcostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SomsaController;
use App\Http\Controllers\PwController;
use App\Http\Controllers\ExpenseController;
use App\Models\Varcost;
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

Route::controller(AuthController::class)->group(function(){
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSimpan')->name('register.simpan');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAksi')->name('login.aksi');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');    
});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function(){

    Route::get('dashboard' , function(){
        return view('dashboard');
    })->name('dashboard');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::controller(VarcostController::class)->prefix('varcost')->group( function () {
        Route::get('','index')->name('varcost');
        Route::get('tambah','tambah')->name('varcost.tambah');
        Route::post('tambah','simpan')->name('varcost.tambah.simpan');
        Route::get('edit/{id}','edit')->name('varcost.edit');
        Route::post('edit/{id}','update')->name('varcost.tambah.update');
        Route::delete('/varcost/hapus/{id}', [VarcostController::class, 'hapus'])->name('varcost.hapus');
        Route::get('/varcost/export/excel', [VarcostController::class, 'exportExcel'])->name('varcost.export.excel');
        Route::get('/varcost/export/pdf', [VarcostController::class, 'exportPDF'])->name('varcost.export.pdf');
    });

    Route::controller(UserController::class)->prefix('user')->group( function () {
        Route::get('','index')->name('user');
        Route::get('edit/{id}','edit')->name('user.edit');
        Route::post('edit/{id}','update')->name('user.tambah.update');
    });

    Route::controller(SomsaController::class)->prefix('somsa')->group( function () {
        Route::get('','index')->name('somsa');
        Route::get('tambah','tambah')->name('somsa.tambah');
        Route::post('tambah','simpan')->name('somsa.tambah.simpan');
        Route::get('edit/{id}','edit')->name('somsa.edit');
        Route::post('edit/{id}','update')->name('somsa.tambah.update');
        Route::delete('/somsa/hapus/{id}', [SomsaController::class, 'hapus'])->name('somsa.hapus');
        Route::get('/somsa/export/excel', [SomsaController::class, 'exportExcel'])->name('somsa.export.excel');
        Route::get('/somsa/export/pdf', [SomsaController::class, 'exportPDF'])->name('somsa.export.pdf');
    });

    Route::controller(PwController::class)->prefix('pw')->group( function () {
        Route::get('','index')->name('pw');
        Route::get('tambah','tambah')->name('pw.tambah');
        Route::post('tambah','simpan')->name('pw.tambah.simpan');
        Route::get('edit/{id}','edit')->name('pw.edit');
        Route::post('edit/{id}','update')->name('pw.tambah.update');
        Route::delete('/pw/hapus/{id}', [PwController::class, 'hapus'])->name('pw.hapus');
        Route::get('/pw/export/excel', [PwController::class, 'exportExcel'])->name('pw.export.excel');
        Route::get('/pw/export/pdf', [PwController::class, 'exportPDF'])->name('pw.export.pdf');
    });

    Route::controller(ExpenseController::class)->prefix('expense')->middleware('auth')->group( function () {
        Route::get('','index')->name('expense');
        Route::get('manager','manager')->name('expense.manager');
        Route::get('tambah','tambah')->name('expense.tambah');
        Route::post('tambah','simpan')->name('expense.tambah.simpan');
        Route::get('edit/{id}','edit')->name('expense.edit');
        Route::post('edit/{id}','update')->name('expense.tambah.update');
        Route::delete('/expense/hapus/{id}', [ExpenseController::class, 'hapus'])->name('expense.hapus');
    });
});