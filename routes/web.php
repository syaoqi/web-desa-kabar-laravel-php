<?php

use App\Http\Controllers\AdminDownloadsController;
use App\Http\Controllers\DashboardAccountsController;
use App\Http\Controllers\DashboardAdminkotaksaran;
use App\Http\Controllers\DashboardAdminkotaksaranController;
use App\Http\Controllers\DashboardAdminsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardDownloadsController;
use App\Http\Controllers\DashboardKotaksaransController;
use App\Http\Controllers\DashboardPenduduksController;
use App\Http\Controllers\GuestKotakSaranController;
use App\Http\Controllers\GuestSejarahDesaController;
use App\Http\Controllers\GuestUnduhController;
use App\Http\Controllers\GuestVisimisiControlller;
use App\Http\Controllers\RegisterController;

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

/**
 * Route for Guest
 */
Route::get('/', [GuestController::class, "index"])
->name("home");
Route::get('/sejarahdesa', [GuestSejarahDesaController::class, "index"])
->name("sejarahdesa");
Route::get('/visimisi', [GuestVisimisiControlller::class, "index"])
->name("visimisi");
Route::get('/unduh', [GuestUnduhController::class, "index"])
->name("unduh");
Route::get('/kotaksarans', [GuestKotakSaranController::class, "index"])
->name("kotaksaran")
->middleware('auth');
Route::post('/kotaksarans', [GuestKotakSaranController::class, "store"]);


/**
 * Route for authentication
 */

// register
Route::get('/register', [RegisterController::class, 'index'])
->name('register');
Route::get('/register', [RegisterController::class, 'create'])
->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


/**
 * Route for dashboard
 */
//dashboard
Route::get("/dashboard", [DashboardController::class, "index"])->name("dashboard")->middleware('auth');

//dashboard guest Kotak Saran
Route::resource('/kotaksarans', DashboardKotaksaransController::class)
->except('show')
->middleware('auth');

//Admin Account Table
// -----------------------------------
//route for crud tabel akun admin
Route::resource('/admins', DashboardAdminsController::class)
->except('show')
->middleware('admin');
Route::resource('/users', DashboardAccountsController::class)
->except('show')
->middleware('admin');

//Admin Upload Format Surat
// -----------------------------------
//route for slug
Route::get('/downloads/checkSlug', [DashboardDownloadsController::class, 'checkSlug'])
    ->middleware('admin');

//route for crud upload format surat
Route::resource('/downloads', DashboardDownloadsController::class)
    ->except('show')
    ->middleware('admin');

//Admin Kotak Saran
// --------------------------------------
//route for view kotak saran
Route::get('/kotaksaran', [DashboardAdminkotaksaranController::class, 'index'])
->name('kotaksaran.view')
->middleware('admin');

//route for delete kotak saran
Route::delete('/kotaksaran/{kotaksaran}', [DashboardAdminkotaksaranController::class, 'destroy'])
->name('kotaksaran.delete')
->middleware('admin');
// --------------------------------------

//Admin Penduduk
// --------------------------------------
Route::resource('/penduduks', DashboardPenduduksController::class)
->except('show')
->middleware('admin');






