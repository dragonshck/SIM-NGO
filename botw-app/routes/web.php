<?php

use App\Http\Controllers\AbsensiStaffController;
use App\Http\Controllers\AnakPPAController;
use App\Http\Controllers\JabatanStaffController;
use App\Http\Controllers\PenggajianController;
use App\Http\Controllers\StaffPPAController;
use App\Http\Controllers\TutorAnakController;
use App\Models\Penggajian;
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
    Route::resource('staff', StaffPPAController::class);
});

Route::group(['middleware' => ['auth', 'role:koordinator']], function () {
    Route::get('/portal', function () {
        return view('layouts.main');
    });

    Route::resource('staffppa', StaffPPAController::class);
    Route::resource('penggajian', PenggajianController::class);
    Route::get('/fetch-gaji/{id}', [PenggajianController::class, 'getGajiByStaff']);
    Route::resource('absensistaff', AbsensiStaffController::class);
    Route::resource('jabatanstaff', JabatanStaffController::class);
});

Route::group(['middleware' => ['auth', 'role:bendahara']], function () {
});

Route::group(['middleware' => ['auth', 'role:mentor']], function () {
    Route::resource('tutor', TutorAnakController::class);
});

Route::group(['middleware' => ['auth', 'role:anak']], function () {
});
