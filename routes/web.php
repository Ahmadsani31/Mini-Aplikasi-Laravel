<?php

use App\Http\Controllers\KlubController;
use App\Http\Controllers\PertandinganController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\DB;
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

// Route::get('/login', function () {
//     return view('welcome');
// });
Route::get('/', [AuthenticatedSessionController::class, 'create']);

Route::get('/dashboard', function () {
    $klub = DB::table('klubs')->count();
    $pertandingan = DB::table('pertandingans')->count();
    return view('dashboard', ['klub' => $klub, 'pertandingan' => $pertandingan]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/klub', [KlubController::class, 'index'])->name('klub');
    Route::get('/klub-edit/{id}', [KlubController::class, 'edit'])->name('klub-edit');
    Route::get('/klub/add', [KlubController::class, 'create'])->name('klub-add');
    Route::post('/klub/store', [KlubController::class, 'store'])->name('klub-store');
    Route::delete('klub/{id}', [KlubController::class, 'destroy'])->name('klub-destroy');

    Route::get('/pertandingan', [PertandinganController::class, 'index'])->name('pertandingan');
    Route::get('/pertandingan/add', [PertandinganController::class, 'create'])->name('pertandingan-add');
    Route::get('/pertandingan-list/add/{id}/{babak}', [PertandinganController::class, 'listAdd'])->name('pertandingan-list-add');
    Route::post('/pertandingan/store', [PertandinganController::class, 'store'])->name('pertandingan-store');
    Route::post('/pertandingan-list/store', [PertandinganController::class, 'storeList'])->name('pertandingan-list-store');
    Route::post('/pertandingan-point/store', [PertandinganController::class, 'storePointList'])->name('pertandingan-point-store');
    Route::get('pertandingan-list/{id}/{babak}', [PertandinganController::class, 'list'])->name('pertandingan-list');
    Route::get('pertandingan-list-klasement/{id}/{babak}', [PertandinganController::class, 'klasemen'])->name('pertandingan-list-klasement');
    Route::delete('pertandingan/{id}', [PertandinganController::class, 'destroy'])->name('pertandingan-destroy');
});

require __DIR__ . '/auth.php';
