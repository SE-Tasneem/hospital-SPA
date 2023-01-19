<?php

use App\Http\Controllers\dashboard\AddsController;
use App\Http\Controllers\dashboard\ClinicController;
use App\Http\Controllers\dashboard\AppointmentController;
use App\Http\Controllers\dashboard\CompanyProfileController;
use App\Http\Controllers\dashboard\DepartmentController;
use App\Http\Controllers\dashboard\DoctorController;
use App\Http\Controllers\dashboard\ImageController;
use App\Http\Controllers\dashboard\ServiceController;
use App\Http\Controllers\HomeController;
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

session()->put('locale', 'en');

Route::get('locale/{locale}', function ($locale) {
    session()->put('locale', $locale);
    return redirect()->back();
});

Route::get('/', [HomeController::class, 'index']);

require __DIR__ . '/auth.php';

Route::group(['prefix' => 'admin-dashboard', 'middleware' => 'auth'], function () {

    session()->put('locale', 'ar');
    Route::get('/', [ServiceController::class, 'index']);

    Route::resource('services', ServiceController::class);
    Route::get('/services/index/data', [ServiceController::class, 'indexData']);
    Route::get('status-service/{id}', [ServiceController::class, 'status']);

    Route::resource('doctors', DoctorController::class);
    Route::get('/doctors/index/data', [DoctorController::class, 'indexData']);
    Route::get('status-doctors/{id}', [DoctorController::class, 'status']);

    Route::resource('departments', DepartmentController::class);
    Route::get('/departments/index/data', [DepartmentController::class, 'indexData']);
    Route::get('status-departments/{id}', [DepartmentController::class, 'status']);
    Route::resource('images', ImageController::class);
    Route::get('/images/index/data', [ImageController::class, 'indexData']);
    Route::get('status-images/{id}', [ImageController::class, 'status']);
    Route::get('/images/{id}/delete', [ImageController::class, 'destroy']);

    Route::get('/company-profile', [CompanyProfileController::class, 'index']);
    Route::get('/company-profile/edit', [CompanyProfileController::class, 'edit']);
    Route::post('/company-profile/update', [CompanyProfileController::class, 'update']);

    Route::resource('adds', AddsController::class);
    Route::get('/adds/index/data', [AddsController::class, 'indexData']);
    Route::get('/adds/{id}/delete', [AddsController::class, 'destroy']);

    Route::resource('clinics', ClinicController::class);
    Route::get('/clinics/index/data', [ClinicController::class, 'indexData']);
    Route::get('/clinics/{id}/delete', [ClinicController::class, 'destroy']);

    Route::resource('appointments', AppointmentController::class);
    Route::get('/appointments/index/data', [AppointmentController::class, 'indexData']);
    Route::get('/appointments/{id}/delete', [AppointmentController::class, 'destroy']);
});

Route::get('/migrate', function () {

  Artisan::call('migrate', array('--force' => true));
  return 'Migrating Done';
});
