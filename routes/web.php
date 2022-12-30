<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
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


Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {

    //users
    Route::prefix('users')->name('user.')->group(function () {
        $controller = UserController::class;
        Route::get('/list', [$controller, 'index'])->name('index');
        Route::get('/edit/{id}', [$controller, 'edit'])->name('edit');
        Route::put('/update', [$controller, 'update'])->name('update');
        Route::get('/delete/{id}', [$controller, 'delete'])->name('delete');
    });
    //Subjects
    Route::prefix('subjects')->name('subject.')->group(function () {
        $controller = SubjectController::class;
        Route::get('/list', [$controller, 'index'])->name('index');
        Route::get('/create', [$controller, 'create'])->name('create');
        Route::post('/save', [$controller, 'save'])->name('save');
        Route::get('/edit/{id}', [$controller, 'edit'])->name('edit');
        Route::put('/update', [$controller, 'update'])->name('update');
        Route::get('/delete/{id}', [$controller, 'delete'])->name('delete');
    });
    //Quiz Crud
    Route::prefix('quiz')->name('quiz.')->group(function () {
        $controller = QuizController::class;
        Route::get('/list', [$controller, 'index'])->name('index');
        Route::get('/create', [$controller, 'create'])->name('create');
        Route::post('/save', [$controller, 'save'])->name('save');
        Route::get('/edit/{id}', [$controller, 'edit'])->name('edit');
        Route::put('/update', [$controller, 'update'])->name('update');
        Route::get('/delete/{id}', [$controller, 'delete'])->name('delete');
    });
});

require __DIR__ . '/auth.php';
