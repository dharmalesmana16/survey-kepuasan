<?php

use App\Http\Controllers\Api\Layanan;
use App\Http\Controllers\Api\Question;
use App\Http\Controllers\Api\Responden;
use App\Http\Controllers\Api\Users;
use App\Http\Controllers\Api\Video;
use App\Http\Controllers\groupController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\questionController;
use App\Http\Controllers\QuestionModelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\respondenController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\videoController;
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
})->middleware('authku')->name('dashboard');
Route::get('/kioskvideo', function () {
    return view('video');
});
Route::post('/ceklogin', [AuthController::class, "authenticate"]);
// Route::post('', 'authenticate')->name('signin');
Route::get('/signout', [AuthController::class, 'logout']);
Route::get('/signin', [AuthController::class, 'index']);
// Route::post('/auth', [AuthController::class, 'authenticate']);
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
Route::controller(videoController::class)->prefix('dashboard/video')->group(function () {
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
Route::resource('api/video', Video::class);

// 
// require __DIR__ . '/auth.php';
