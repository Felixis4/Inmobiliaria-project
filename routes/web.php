<?php

use App\Http\Controllers\HouseController;
use App\Http\Controllers\PropertyController;
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
    return view('index');
});

Route::get('/houses', function () {
    return view('houses');
});

Route::get('/properties/create', [PropertyController::class, 'create'])->name('properties.create');

Route::post('/properties', [PropertyController::class, 'store'])->name('properties.store');



Route::resource('house', HouseController::class);


