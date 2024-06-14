<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Kadai01_1Controller;
use App\Http\Controllers\Sample01_1Controller;
use App\Http\Controllers\Kadai02_1Controller;
use App\Http\Controllers\Kadai02_2Controller;
use App\Http\Controllers\Kadai02_3Controller;
use App\Http\Controllers\Kadai03_1Controller;
use App\Http\Controllers\Sample04Controller;
use App\Http\Controllers\Kadai04_1Controller;
use App\Http\Controllers\Kadai05_1Controller;
use App\Http\Controllers\Kadai06_1Controller;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//kadai01_1
Route::get('kadai01_1', [Kadai01_1Controller::class, 'index']);


//sample01_1
Route::get('sample01_1', [Sample01_1Controller::class, 'index']);

// kadai02_1
Route::get('kadai02_1', [Kadai02_1Controller::class, 'index']);

// kadai02_2
Route::get('kadai02_2', [Kadai02_2Controller::class, 'index']);

// kadai02_3
Route::get('kadai02_3', [Kadai02_3Controller::class, 'index']);

// kadai03_1
Route::get('kadai03_1', [Kadai03_1Controller::class, 'index']);

// sample
Route::get('sample04', [Sample04Controller::class, 'index']);

// sample
Route::post('sample04', [Sample04Controller::class, 'post']);

// kadai04_1
Route::get('kadai04_1', [Kadai04_1Controller::class, 'index']);

// kadai04_1
Route::post('kadai04_1', [Kadai04_1Controller::class, 'post']);


Route::get('kadai05_1', [Kadai05_1Controller::class, 'index']);
Route::post('kadai05_1', [Kadai05_1Controller::class, 'post']);


Route::resource('kadai06_1', Kadai06_1Controller::class);

