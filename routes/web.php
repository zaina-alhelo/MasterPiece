<?php

use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogShowController;
use App\Http\Controllers\BmiController;
use App\Http\Controllers\CaloricNeedsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryShowController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\RecipeShowController;
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



Route::get('/', [LandingPageController::class, 'index'])->name('landingpage');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        if (Auth::user()->role === 'admin') {
    return redirect()->route('dashboard_first');
        } else {
            return redirect()->route('landingpage');
        }
    })->name('dashboard');
    Route::get('/dashboard_First', [DashboardController::class, 'index'])->name('dashboard_first');

    Route::get('/profile/{id}', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/{id}/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile', function () {
        return view('Dashboard.profile.index');
    })->name("profile");
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::post('/messages', [MessageController::class, 'send'])->name('messages.send');
    Route::get('messages/{id}', [MessageController::class, 'show'])->name('messages.show');

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


Route::get('/landing/blogs/{id}', [BlogShowController::class, 'show'])->name('landing.blogs.show');
Route::get('/landing/blogs', [BlogShowController::class, 'index'])->name('landing.blogs.index');




Route::get('/landing/categories', [CategoryShowController::class, 'index'])->name('landing.blog_cat.index');
Route::get('/landing/categories/{id}', [CategoryShowController::class, 'show'])->name('landing.blog_cat.show');

Route::get('/landing/recipes', [RecipeShowController::class, 'index'])->name('landing.recipe_cat.index');
Route::get('/landing/recipes_cat/{id}', [RecipeShowController::class, 'show'])->name('landing.recipe_cat.show');
Route::get('/landing/recipes/{id}', [RecipeShowController::class, 'recipe'])->name('landing.recipes.show');

Route::get('/landing/bmi', function () {
    return view('landingPage.pages.bmi');
})->name('bmi');
Route::get('/landing/DelayNeed', function () {
    return view('landingPage.pages.delayNeed');
})->name('delayNeed');

Route::get('/landing/aboutUs', function () {
    return view('landingPage.pages.aboutUs');
})->name('aboutUs');
Route::get('/landing/idealWeight', function () {
    return view('landingPage.pages.idealWeight');
})->name('idealWeight');
Route::get('/landing/product_check', function () {
    return view('landingPage.pages.product_check');
})->name('product_check');
Route::get('/footer', [FooterController::class, 'loadFooterContent']);











require __DIR__ . '/auth.php';
