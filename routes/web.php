<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PositionController;
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
    return view('auth.login');
});

Route::get('login', [AuthController::class, 'index'])->name('login');

Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');

Route::get('registration', [AuthController::class, 'registration'])->name('register');

Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');

Route::get('dashboard', [AuthController::class, 'dashboard']);

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('position', [PositionController::class, 'index'])->name('position.index');
Route::get('position/add', [PositionController::class, 'add'])->name('position.add');
Route::post('position/save', [PositionController::class, 'postAdd'])->name('position.save');
Route::post('position/delete', [PositionController::class, 'postDelete'])->name('position.delete');
Route::get('position/edit/{id}', [PositionController::class, 'edit'])->name('position.edit');
Route::post('position/update', [PositionController::class, 'postUpdate'])->name('position.edit');
