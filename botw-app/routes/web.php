<?php

use App\Http\Controllers\AnakPPAController;
use App\Http\Controllers\StaffPPAController;
use App\Http\Controllers\TutorAnakController;
use App\Models\StaffPPA;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('anak', AnakPPAController::class);
    Route::resource('tutor', TutorAnakController::class);
    Route::resource('staff', StaffPPAController::class);
});

Route::group(['middleware' => ['auth', 'role:koordinator']], function () {
    Route::get('/portal', function () {
        return view('layouts.main');
    });

    // Master Karyawan
    Route::get('/staff-masters', [StaffPPAController::class, 'index'])->name('master-staff');
    Route::get('/staff-tambah', [StaffPPAController::class, 'create'])->name('tambah-staff');
    Route::post('/staff-insert', [StaffPPAController::class, 'store'])->name('master-staff');
});

Route::group(['middleware' => ['auth', 'role:tutor']], function () {
    Route::get('/portal', function () {
        return view('layouts.main');
    });
});

Route::group(['middleware' => ['auth', 'role:anak']], function () {
    Route::get('/portal', function () {
        return view('layouts.main');
    });
});
