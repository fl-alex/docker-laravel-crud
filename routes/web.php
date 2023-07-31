<?php

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

Route::get('/app', function () {
    return view('default');
});

Route::resources([
    'Model1' => \App\Http\Controllers\Model1Controller::class,
    'Model2' => \App\Http\Controllers\Model2Controller::class,
    'companies' => \App\Http\Controllers\CompanyController::class,
    'workers' =>\App\Http\Controllers\WorkerController::class
]);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('add-post', [\App\Http\Controllers\PostController::class, 'index']);
Route::post('store-form', [\App\Http\Controllers\PostController::class, 'store']);
Route::get('make_backup', [\App\Http\Controllers\ServiceController::class, 'make_backup'])->name('make_backup');
Route::post('workers_from', [\App\Http\Controllers\WorkerController::class, 'create_from'])->name('workers_from');


