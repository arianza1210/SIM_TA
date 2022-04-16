<?php

use App\Http\Controllers\OmsetController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [OmsetController::class, 'index'])->name('dashboard');
    Route::get('/omset/create', [OmsetController::class, 'create'])->name('omset.create');
    Route::get('/omset/edit/{omset}', [OmsetController::class, 'edit'])->name('omset.edit');
});
require __DIR__ . '/auth.php';
