<?php

use App\Http\Controllers\HouseController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\JsonResponseController;
use Illuminate\Support\Facades\Route;

Route::get('/info', function () {
    return phpinfo();
});

Route::get('/', function () {
    return view('index');
});

Route::get('/json', [JsonResponseController::class, 'index']);

Route::get('/properties/create', [PropertyController::class, 'create'])->name('properties.create');
Route::post('/properties/type', [PropertyController::class, 'redirector'])->name('properties.redirector');
Route::post('/properties', [PropertyController::class, 'store'])->name('properties.store');

Route::resource('house', HouseController::class);

Route::get('/images/edit/{property_id}',[ImageController::class,'edit'])->name('images.edit');
Route::delete('/images/delete/{imageId}', [ImageController::class, 'destroy'])->name('image.delete');
