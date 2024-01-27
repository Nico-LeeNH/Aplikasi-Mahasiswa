<?php

use App\Http\Controllers\PengajuanController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/template/{id}', [PengajuanController::class, 'template']);
Route::get('/convertWordToPdf/{id_pengajuan}', [PengajuanController::class, 'convertWordToPdf']);