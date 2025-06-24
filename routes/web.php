<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Backend\BrendController as BackendBrendController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Frontend\BrendController;
use App\Http\Controllers\Frontend\CalculatorController;
use App\Http\Controllers\Frontend\ContactUsController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\SuccessController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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
    return view('welcome');
});

Route::get('/get-models/{brend_id}', [HomeController::class, 'getModels'])->name('get.models');
Route::get('/get-fuels/{model_id}', [HomeController::class, 'getFuels'])->name('get.fuels');
Route::get('/get-prices/{brend_id}', [HomeController::class, 'getPriceInterval'])->name('get.prices');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('post-login', [AuthController::class, 'postLogin'])->name('login-post');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/admin/migrate', function () {
    Artisan::call('migrate');
});
Route::put('/password/update', [AuthController::class, 'updatePassword'])->name('password.update');
Route::middleware('language')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('brends', [BrendController::class, 'index'])->name('brend');

    Route::post('brends', [BrendController::class, 'testDrive'])->name("testDrive");
    Route::get('success', [SuccessController::class, 'index'])->name('success');
    Route::get('/product-details/{slug}', [BrendController::class, 'showProduct'])->name('product.show');
    Route::get('/get-price-interval/{id}', [HomeController::class, 'get_price_interval']);
    Route::post('/calculate-installment/{id}', [CalculatorController::class, 'calculate'])->name('calculate.installment');
    Route::get('contact-us', [ContactUsController::class, 'index'])->name('contact.us');
    Route::post('contact-us', [ContactUsController::class, 'apply']);
});
