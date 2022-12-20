<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

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

Route::get('/dashboard',[Controller::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware(['auth'])->group(function () {
    Route::get('/liste',[DemandeController::class,'index'])->name('demandes.index');
    Route::get('/create',[DemandeController::class,'create'])->name('demandes.create');
    Route::POST('/store',[DemandeController::class,'store'])->name('demandes.store');
    Route::get('/show{id}',[DemandeController::class,'show'])->name('demandes.show');
    Route::get('/show_admin{id}',[Controller::class,'show'])->name('admin.show');
    Route::get('/edit{id}',[DemandeController::class,'edit']);
    Route::get('/reclamation{id}', [DemandeController::class, 'reclamation'])->name('get.reclamation');
    Route::Post('/reclamation', [DemandeController::class,'storeMail'])->name('post.reclamation');
    Route::get('users{id}',[UserController::class,'edit']);
    Route::get('/updateUser{id}',[UserController::class, 'update']);
    Route::post('/update{id}', [DemandeController::class,'update']);
    Route::get('/Edit{id}', [DemandeController::class,'editStatus']);
    Route::post('/Update{id}', [DemandeController::class,'updateStatus']);
   });
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';