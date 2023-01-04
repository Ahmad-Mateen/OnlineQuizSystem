<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Models\Question;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\UserQuizController;




// Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/', [UserDashboardController::class, 'userDashboard'])->name('dashboard')->middleware('auth');

Route::prefix('user')->name('user.')->group(function () {

    //Quiz Lists
    Route::prefix('quiz')->name('quiz.')->group(function () {
        $controller = UserQuizController::class;
        Route::get('/list', [$controller, 'getSubject'])->name('getSubject');
        Route::get('/getQuiz{id}', [$controller, 'getQuiz'])->name('getQuiz');
    });
   
});



Route::prefix('admin')->name('admin.')->group(function () {

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
    Route::prefix('quizzes')->name('quiz.')->group(function () {
        $controller = QuizController::class;
        Route::get('/list', [$controller, 'index'])->name('index');
        Route::get('/create', [$controller, 'create'])->name('create');
        Route::post('/save', [$controller, 'save'])->name('save');
        Route::get('/edit/{id}', [$controller, 'edit'])->name('edit');
        Route::put('/update', [$controller, 'update'])->name('update');
        Route::get('/delete/{id}', [$controller, 'delete'])->name('delete');
    });
    //Question Crud
    Route::prefix('questions')->name('question.')->group(function () {
        $controller = QuestionController::class;
        Route::get('/list/{id}', [$controller, 'index'])->name('index');
        Route::get('/create/{id}', [$controller, 'create'])->name('create');
        Route::post('/save', [$controller, 'save'])->name('save');
        // Route::get('/edit/{id}', [$controller, 'edit'])->name('edit');
        Route::put('/update', [$controller, 'update'])->name('update');
        Route::get('/delete/{a?}', [$controller, 'delete'])->name('delete');
    });
});


require __DIR__ . '/auth.php';
