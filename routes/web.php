<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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
Route::get('/', [HomeController::class, 'index'])->name('user.dashboard');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

// HOME CONTROLLER 
Route::middleware('auth', 'verified')->group(function(){

    Route::get('/redirect', [HomeController::class, 'redirect'])->name('redirect.dashboard');
    
    Route::get('/product_details/{id}', [HomeController::class, 'product_details'])->name('product.details');
    Route::post('/add_cart/{id}', [HomeController::class, 'add_cart'])->name('add.cart');
    Route::get('/show_cart', [HomeController::class, 'show_cart'])->name('show.cart');
    Route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart'])->name('remove.cart');
    Route::get('/cash_order', [HomeController::class, 'cash_order'])->name('cash.order');
    Route::get('/show_home_order', [HomeController::class, 'show_home_order'])->name('show.homeorder');
    Route::get('/cancel_order/{id}', [HomeController::class, 'cancel_order'])->name('cancel.order');
    
    // STRIPE PAYMENT METHOD 
    Route::get('stripe/{total}', [HomeController::class, 'stripe'])->name('stripe');
    Route::post('stripe/{total}', [HomeController::class, 'stripePost'])->name('stripe.post');

    // COMMENT AND REPLY 
    Route::post('/add_comment', [HomeController::class, 'add_comment'])->name('add.comment');
    Route::post('/add_reply', [HomeController::class, 'add_reply'])->name('add.reply');

    // SEARCH PRODUCT
    Route::get('/search_product', [HomeController::class, 'search_product'])->name('search.product');
    
});


// ADMIN CONTROLLER 
Route::middleware('auth', 'verified')->group(function(){
    // Category 
    Route::get('/view_category', [AdminController::class, 'view_category'])->name('view.category');
    Route::post('/add_category', [AdminController::class, 'add_category'])->name('add.category');
    Route::get('/delete_category/{id}', [AdminController::class, 'delete_category'])->name('delete.category');
    // Product 
    Route::get('/view_product', [AdminController::class, 'view_product'])->name('view.product');
    Route::post('/add_product', [AdminController::class, 'add_product'])->name('add.product');
    Route::get('/show_product', [AdminController::class, 'show_product'])->name('show.product');
    Route::get('/delete_product/{id}', [AdminController::class, 'delete_product'])->name('delete.product');
    Route::get('/edit_product/{id}', [AdminController::class, 'edit_product'])->name('edit.product');
    Route::post('/update_product/{id}', [AdminController::class, 'update_product'])->name('update.product');
    // Order 
    Route::get('/show_order', [AdminController::class, 'show_order'])->name('show.order');
    Route::get('/delivered_product/{id}', [AdminController::class, 'delivered_product'])->name('delivered.product');
    // Get PDF 
    Route::get('/get_pdf/{id}', [AdminController::class, 'get_pdf'])->name('get.pdf');
    // Send Email 
    Route::get('/send_email/{id}', [AdminController::class, 'send_email'])->name('send.email');
    Route::post('/send_user_mail/{id}', [AdminController::class, 'send_user_mail'])->name('send.user.mail');
    Route::post('/search', [AdminController::class, 'search'])->name('search');

});








