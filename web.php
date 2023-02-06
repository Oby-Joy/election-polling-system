<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/voter/home', [HomeController::class, 'index'])->name('home');

Route::get('voter/vote/{id}', [HomeController::class, 'vote']);

Route::post('voter/vote', [HomeController::class, 'storeVote'])->name('storeVote');

//Admin Pages
Route::get('/admin/login', [LoginController::class, 'showAdminLoginForm']);

Route::get('/admin/register', [RegisterController::class, 'showAdminRegisterForm']);

Route::post('/admin/login', [LoginController::class, 'adminLogin'])->name('adminLogin');

Route::post('/admin/register', [RegisterController::class, 'createAdmin'])->name('createAdmin');

Route::get('/admin/home', [AdminController::class, 'index']);

Route::get('/admin/add-post', [AdminController::class, 'addPost']);

Route::post('/admin/add-post', [AdminController::class, 'savePost'])->name('savePost');

Route::get('/admin/view-posts', [AdminController::class, 'viewPosts']);

Route::get('/admin/voters-list', [AdminController::class, 'voters']);

Route::get('/admin/results', [AdminController::class, 'results']);

Route::get('/admin/result-list/{id}', [AdminController::class, 'resultList']);

Route::get('/admin/add-candidate/{id}', [AdminController::class, 'addCandidate']);

Route::post('/admin/add-candidate/', [AdminController::class, 'saveCandidate'])->name('saveCandidate');

Route::get('/admin/candidates/{id}', [AdminController::class, 'candidatesList']);

