<?php

use App\Http\Controllers\Admin\CarController as AdminCarController;
use App\Http\Controllers\Admin\CustomerController as AdminCustomerController;
use App\Http\Controllers\Admin\RentalController as AdminRentalController;
use App\Http\Controllers\Frontend\CarController as FrontendCarController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register.blade.php web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.home-page');
});

Route::get('/login', [PageController::class, 'login'])->name('login');
Route::get('/register', [PageController::class, 'register'])->name('register');
Route::get('/dashboard', [PageController::class, 'dashboard'])->middleware(UserMiddleware::class);

Route::get('/car-list', [FrontendCarController::class, 'carList']);


Route::post('/UserRegister', [AdminCustomerController::class, 'register'])->name('user_register');
Route::post('/UserLogin', [AdminCustomerController::class, 'login'])->name('user_login');
Route::put('/UserUpdate', [AdminCustomerController::class, 'edit'])->name('edit')->middleware(UserMiddleware::class);
Route::get('/logout', [AdminCustomerController::class, 'logout'])->name('logout')->middleware(UserMiddleware::class);
Route::get('/UserProfile', [AdminCustomerController::class, 'profile'])->name('profile')->name('logout')->middleware(UserMiddleware::class);
Route::get('/all-users', [AdminCustomerController::class, 'allUser'])->name('all_users')->middleware(UserMiddleware::class);
Route::delete('/user-delete/{id}', [AdminCustomerController::class, 'deleteUser'])->name('delete_user')->middleware(UserMiddleware::class);
Route::get('/order-list', [AdminCustomerController::class, 'orderList'])->name('order_list')->middleware(UserMiddleware::class);
Route::put('/order-update/{id}', [AdminCustomerController::class, 'orderc'])->name('orderc')->middleware(UserMiddleware::class);

Route::post('/add-car', [AdminCarController::class, 'addCar'])->name('add-car')->middleware(UserMiddleware::class);
Route::get('/all-car',  [AdminCarController::class, 'allCar'])->name('allCar')->middleware(UserMiddleware::class);
Route::get('/car/{id}', [FrontendCarController::class, 'Carupdate'])->middleware(UserMiddleware::class);
Route::put('/car-update',  [AdminCarController::class, 'updateCar'])->name('updateCar')->middleware(UserMiddleware::class);
Route::delete('/car-delete/{id}',  [AdminCarController::class, 'deleteCar'])->name('deleteCar')->middleware(UserMiddleware::class);
Route::get('/countCar',  [AdminCarController::class, 'countCar'])->name('countCar')->middleware(UserMiddleware::class);
Route::get('/car', [AdminCarController::class, 'car'])->name('car');
Route::get('/car-details/{id}', [FrontendCarController::class, 'cerDetails']);


Route::post('/rental', [AdminRentalController::class, 'booking'])->name('rental')->middleware(UserMiddleware::class);
