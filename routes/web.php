<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\userController;
use App\Http\Controllers\adminController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::view('/donation', 'donation')->name('donation');
Route::view('/item', 'item')->name('item');
Route::view('/user', 'user')->name('user');
Route::view('/item-details', 'item-details')->name('item.details');

Route::post('/donation', [userController::class, 'addDonation'])->name('donation.add');

Route::get('/item', [userController::class, 'viewItem'])->name('item');


Route::get('/delete-user/{user_id?}', [adminController::class, 'deleteUser'])->name('user.delete');

Route::get('/item/{item_id?}', [userController::class, 'viewItemDetails'])->name('item.details');

Route::get('/myitem', [userController::class, 'showUserItems'])->name('item.my');

Route::post('/donate/{item_id?}', [userController::class, 'donateItem'])->name('donate');

Route::post('/search-item', [userController::class, 'searchItem'])->name('item.search');

Route::get('/run', [adminController::class, 'runCommand']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin', 'auth']], function() {
    Route::get('/item', [adminController::class, 'getAllItems'])->name('admin.item');
    Route::get('/item/delete/{item_id}', [adminController::class, 'deleteItem'])->name('item.delete');

    // Route::get('/user', [adminController::class, 'viewUser'])->name('user');
    Route::view('/user', 'user')->name('user');
    Route::get('/user/blacklist/{user_id?}', [adminController::class, 'blacklistUser'])->name('user.blacklist');
    Route::get('/user/reactivate/{user_id?}', [adminController::class, 'reactivateUser'])->name('user.reactivate');

});
require __DIR__.'/auth.php';
