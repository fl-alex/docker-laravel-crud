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
    'model1' => \App\Http\Controllers\Model1Controller::class,
    'model2' => \App\Http\Controllers\Model2Controller::class,
]);