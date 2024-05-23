<?php

use App\Http\Controllers\Api\Layanan;
use App\Http\Controllers\Api\Question;
use App\Http\Controllers\Api\Responden;
use App\Http\Controllers\Api\Users;
use App\Http\Controllers\groupController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\questionController;
use App\Http\Controllers\QuestionModelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\respondenController;
use App\Http\Controllers\UserController;
use App\Models\groupModel;
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

Route::get('/survey/{slug}', function () {
    return view('survey');
});
Route::get('/', function () {
    $dataLayanan = new groupModel();
    $data = [
        "dataLayanan" => $dataLayanan::all()
    ];
    return view('group', $data);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route::post('', 'authenticate')->name('signin');
Route::get('/signout', [AuthController::class, 'logout']);
Route::post('/signin', [AuthController::class, 'authenticate'])->middleware('RedirectIfAuth')->name('signin');
Route::controller(groupController::class)->prefix('dashboard/layanan')->group(function () {
    Route::get('', 'index')->name('layanan');
    Route::get('show/{slug}', 'show');
    Route::get('new', 'new');
    Route::post('new', 'new');
    Route::get('update/{slug}', 'edit');
    Route::put('update/{slug}', 'update');
});
Route::controller(questionController::class)->prefix('dashboard/question')->group(function () {
    Route::get('', 'index');
    Route::get('show/{slug}', 'show');
    Route::get('new', 'new');
    Route::post('new', 'new');
    Route::get('update/{slug}', 'edit');
    Route::put('update/{slug}', 'update');
});
Route::controller(respondenController::class)->prefix('dashboard/responden')->group(function () {
    Route::get('', 'index');
    Route::get('show/{slug}', 'show');
    Route::get('new', 'new');
    Route::post('new', 'new');
    Route::get('update/{slug}', 'edit');
    Route::put('update/{slug}', 'update');
});
Route::controller(UserController::class)->prefix('dashboard/user')->group(function () {
    Route::get('', 'index');
    Route::get('show/{slug}', 'show');
    Route::get('new', 'new');
    Route::post('new', 'new');
    Route::get('update/{slug}', 'edit');
    Route::put('update/{slug}', 'update');
});

Route::resource('api/layanan', Layanan::class);
Route::resource('api/question', Question::class);
Route::resource('api/responden', Responden::class);
Route::resource('api/users', Users::class);
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
