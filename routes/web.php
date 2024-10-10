<?php

use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BmiController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', function () {
    return view('landingpage.landingpage');
})->name('landingpage');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        if (Auth::user()->role === 'admin') {
            return view('Dashboard.dashboard');
        } else {
            return redirect()->route('landingpage');
        }
    })->name('dashboard');

    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::get('/profile/{id}', action: [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/{id}', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/{id}/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile', function () {
        return view('Dashboard.profile.index');
    })->name("profile");
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::post('/messages', [MessageController::class, 'send'])->name('messages.send');
});

Route::resource('users', UserController::class);
Route::resource('categories', CategoryController::class);
Route::resource('recipes', RecipeController::class);
Route::resource('categories_blog', BlogCategoryController::class);
Route::resource('blogs', BlogController::class);

Route::get('/contactUS', function () {
    return view('landingPage.pages.contact');
})->name('contactUS');

Route::resource('contact', ContactController::class);
Route::resource('bmi', BmiController::class);
require __DIR__ . '/auth.php';
