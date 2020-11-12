<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CampusController;
use App\Http\Controllers\DashboardController;


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

Route::get('/', [HomeController::class, 'index'])->name('home');
   
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'loginAction']);
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'registerAction']);

Route::get('/profile', [UserController::class, 'index'])->name('profile');
Route::post('/profile', [UserController::class, 'editAction']);

Route::get('/course/{slug}/signup', [HomeController::class, 'signup']);
Route::get('/course/{slug}', [HomeController::class, 'courseInfo']);

Route::get('/campus', [CampusController::class, 'index'])->name('campus');

Route::get('/campus/{slug}/{class_name?}', [CampusController::class, 'courseIndex']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/dashboard/courses', [DashboardController::class, 'courses']);
Route::get('/dashboard/new', [DashboardController::class, 'newCourse']);
Route::post('/dashboard/new', [DashboardController::class, 'newCourseAction']);

Route::get('/dashboard/course/{id}/edit', [DashboardController::class, 'editCourse']);
Route::post('/dashboard/course/{id}/edit', [DashboardController::class, 'editCourseAction']);

Route::get('/dashboard/course/{id}/modules', [DashboardController::class, 'modules']);