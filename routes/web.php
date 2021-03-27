<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\Admin;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\DistrictController;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware([Admin::class])->group(function () {
    
    Route::get('/', [AdminController::class], 'index')->name('admin');
    
    Route::middleware(['role:admin'])->group(function () {
        Route::resources([
            'users' => UserController::class,
            'provinces' => ProvinceController::class,
            'districts' => DistrictController::class
        ]);
    });
    
    Route::middleware(['role:education'])->group(function () {

        Route::resources([
            'institution' => InstitutionController::class
        ]);
    });

    Route::middleware(['role:direction'])->group(function () {

    });

    Route::middleware(['role:direction'])->group(function () {

    });

    Route::resource( 'districts','DistrictController');
    Route::resource( 'institutions','InstitutionController');
    Route::resource( 'students', 'StudentController');
    Route::resource( 'Teachers', 'TeacherController');
    Route::resource( 'users', 'UserController');
    
 

});