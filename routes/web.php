<?php

use App\Http\Controllers\HouseController;
use App\Http\Controllers\PropertyController;
use App\Models\Property;
use App\Http\Controllers\ImageController;
use App\Models\House;
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

Route::get('/info', function () {
    return phpinfo();
});

Route::get('/', function () {
    return view('index');
});

Route::get('/houses', function () {
    return view('house.houses');
});

Route::get('/properties/create', [PropertyController::class, 'create'])->name('properties.create');
Route::post('/properties/type', [PropertyController::class, 'redirector'])->name('properties.redirector');
Route::post('/properties', [PropertyController::class, 'store'])->name('properties.store');

Route::resource('house', HouseController::class);

Route::get('/images/edit/{property_id}', function ($propertyId){
    $images = Property::findOrFail($propertyId)->images;
    $id = Property::findOrFail($propertyId)->property_id;
    return view('images_edit', compact('images','id'));
})->name('images.edit');

Route::delete('/images/delete/{imageId}', [ImageController::class, 'destroy'])->name('image.delete');
// Route::post('/images/store/{propertyId}', [ImageController::class, 'store'])->name('image.store');
