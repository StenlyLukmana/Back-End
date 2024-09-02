<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProfileController;

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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
    
});

Route::get('/mail', [MailController::class, 'sendMail'])->name('sendMail');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Auth::routes();

Route::middleware('admin')->group(function(){
    Route::get('/create', [ItemController::class, 'getCreatePage'])->name('getCreatePage');
    Route::post('/create-item', [ItemController::class, 'createItem'])->name('createItem');
    Route::get('/update/{id}', [ItemController::class, 'getItemId'])->name('getItemId');
    Route::PATCH('/update-item/{id}', [ItemController::class, 'updateItem'])->name('updateItem');
    Route::DELETE('/delete-item/{id}', [ItemController::class, 'deleteItem'])->name('deleteItem');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/catalogue', [ItemController::class, 'catalogue'])->name('catalogue');

    Route::get('/cart', [CartController::class, 'getCart'])->name('getCart');
    Route::post('/add-to-cart', [CartController::class, 'cartStore'])->name('cartStore');
    Route::DELETE('/remove-cart-item/{id}', [CartController::class, 'removeItem'])->name('removeItem');

    Route::get('/checkout', [InvoiceController::class, 'checkoutPage'])->name('checkoutPage');
    Route::post('/create-invoice', [InvoiceController::class, 'createInvoice'])->name('createInvoice');
    Route::get('/orders', [InvoiceController::class, 'orders'])->name('orders');
});

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';
