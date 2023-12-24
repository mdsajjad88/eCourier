<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\aboutController;
use App\Http\Controllers\serviceController;
use App\Http\Controllers\galleryController;
use App\Http\Controllers\contactController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('home', [homeController::class, 'index']);
Route::get('/', [homeController::class, 'index']);
Route::get('about', [aboutController::class, 'index']);
Route::get('service', [serviceController::class, 'index']);
Route::get('gallery', [galleryController::class, 'index']);
Route::get('contact', [contactController::class, 'index']);
