<?php

use App\Http\Controllers\AbsensiAnakController;
use App\Http\Controllers\AbsensiStaffController;
use App\Http\Controllers\AnakPPAController;
use App\Http\Controllers\BantuananakController;
use App\Http\Controllers\CutistaffController;
use App\Http\Controllers\HadiahsponsorController;
use App\Http\Controllers\JabatanStaffController;
use App\Http\Controllers\KelompokUmurController;
use App\Http\Controllers\KodeabsensiController;
use App\Http\Controllers\KunjungananakController;
use App\Http\Controllers\LessonplanController;
use App\Http\Controllers\LogbookmengajarController;
use App\Http\Controllers\PenggajianController;
use App\Http\Controllers\RewardsanakController;
use App\Http\Controllers\SponsorAnakController;
use App\Http\Controllers\StaffPPAController;
use App\Http\Controllers\TutorAnakController;
use App\Models\AbsensiAnak;
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

Route::get('/home', [App\Http\Controllers\dashboard::class, 'index'])->name('home');


Route::group(['middleware' => ['auth']], function () {
    Route::resource('anak', AnakPPAController::class);
    Route::resource('staff', StaffPPAController::class);
    Route::resource('cutiizin', CutistaffController::class);
    Route::resource('lessonplan', LessonplanController::class);
    Route::resource('logbook', LogbookmengajarController::class);
});

Route::group(['middleware' => ['auth', 'role:koordinator']], function () {
    Route::get('/portal', function () {
        return view('layouts.main');
    });

    Route::resource('staffppa', StaffPPAController::class);
    Route::resource('penggajian', PenggajianController::class);
    Route::get('/fetch-gaji/{id}', [PenggajianController::class, 'getGajiByStaff']);
    Route::get('/ubah-status-cuti/{id}', [CutiStaffController::class, 'status_update']);

    Route::resource('jabatanstaff', JabatanStaffController::class);
});

Route::group(['middleware' => ['auth', 'role:bendahara']], function () {
    Route::resource('bantuan', BantuananakController::class);
    Route::get('/ubah-status-bantuan/{id}', [BantuananakController::class, 'status_update']);
    Route::resource('hadiahsponsor', HadiahsponsorController::class);
    Route::get('/ubah-status-hadiah/{id}', [HadiahsponsorController::class, 'status_update']);
    Route::resource('rewards', RewardsanakController::class);
    Route::get('/ubah-status-rewards/{id}', [RewardsanakController::class, 'status_update']);
});

Route::group(['middleware' => ['auth', 'role:sekretaris']], function () {
    Route::resource('absensistaff', AbsensiStaffController::class);
    Route::resource('sponsormaster', SponsorAnakController::class);
});

Route::group(['middleware' => ['auth', 'role:mentor']], function () {
    Route::resource('tutor', TutorAnakController::class);
    Route::resource('kelompokumur', KelompokUmurController::class);
    Route::resource('kodeabsensi', KodeabsensiController::class);
    Route::resource('anak', AnakPPAController::class);
});

Route::group(['middleware' => ['auth', 'role:tutor']], function () {
    Route::resource('absenanak', AbsensiAnakController::class);
    Route::get('/fetch-anak/{id}', [AbsensiAnakController::class, 'getAnakbyKelompokUmur']);
    Route::get('/fetch-tgl-anak/{id}/{tgl}', [AbsensiAnakController::class, 'getAnakByDate']);
});

Route::group(['middleware' => ['auth', 'role:anak']], function () {
});
