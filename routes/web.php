<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FarmerController;

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

route::get('/', [HomeController::class, 'home'] );

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('admin/dashboard',[HomeController::class,'index']);Route::get('farmer/dashboard', [FarmerController::class, 'index']);
Route::get('farmer/dashboard', [FarmerController::class, 'index']);
Route::get('view_category', [FarmerController::class, 'view_category']);
Route::post('add_category', [FarmerController::class, 'add_category']);

Route::get('delete_category/{id}',[FarmerController::class,'delete_category']);
Route::get('edit_category/{id}',[FarmerController::class,'edit_category']);

Route::post('update_category/{id}', [FarmerController::class, 'update_category']);

Route::get('add_product',[FarmerController::class,'add_product']);

Route::post('upload_product',[FarmerController::class,'upload_product']);

Route::get('view_product',[FarmerController::class,'view_product']);


Route::get('delete_product/{id}',[FarmerController::class,'delete_product']);

Route::post('edit_product/{id}',[FarmerController::class,'edit_product']);

Route::get('update_product/{id}',[FarmerController::class,'update_product']);
