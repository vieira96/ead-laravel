<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CampusController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ModuleController;


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

//HomeController
Route::get('/', [HomeController::class, 'index'])->name('home');
   
//LoginController
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'loginAction']);
Route::get('/logout', [LoginController::class, 'logout']);

//UserController
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'registerAction']);
Route::post('/edit', [UserController::class, 'editAction']);

//ProfileController
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

//CourseController
Route::get('/course/{slug}/signup', [CourseController::class, 'signup']);
Route::get('/course/{slug}', [CourseController::class, 'courseInfo']);
Route::get('/dashboard/courses', [CourseController::class, 'courses']);

Route::get('/dashboard/new', [CourseController::class, 'newCourse']);
Route::post('/dashboard/new', [CourseController::class, 'newCourseAction']);

Route::get('/dashboard/course/{course}/edit', [CourseController::class, 'editCourse']);
Route::post('/dashboard/course/{course}/edit', [CourseController::class, 'editCourseAction']);

Route::get('/dashboard/course/{course}/delete', [CourseController::class, 'deleteCourse']);
// // // // // // // // /// /// // //// // // // // // // // /// /// // //// // // // // // //

//CampusController
Route::get('/campus', [CampusController::class, 'index'])->name('campus');
Route::get('/campus/{slug}/{class_name?}', [CampusController::class, 'courseIndex']);

//DashboardController
Route::get('/dashboard', [DashboardController::class, 'index']);


Route::get('/dashboard/course/{id}/modules', [ModuleController::class, 'modules']);
