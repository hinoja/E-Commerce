<?php

// use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\CartController;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\TodolistController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/search',[ProductController::class,'search'])->name('products.search');
Route::get('/boutique', [ProductController::class, 'index'])->name('products.index');
Route::get('/boutique/{slug}', [ProductController::class, 'show'])->name('products.show');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/search', [ProductController::class, 'search'])->name('products.search');
    Route::get('/panier', [CartController::class, 'index'])->name('cart.index');
    //Cart Route//
    Route::delete('/panier/{rowId}', [CartController::class, 'destroy'])->name('cart.delete');
    Route::patch('/panier/{rowId}', [CartController::class, 'update'])->name('cart.update');

    Route::post('/panier/ajouter', [CartController::class, 'store'])->name('cart.store');
    Route::get('/viderPanier', function () {
        Cart::destroy();
    });
    Route::get('/genererPdf', [PDFController::class, 'generatePDF'])->name('pdfView');
});

Route::group(['middleware' => ['auth']], function () {
    //todolist
    Route::get('/todo', [TodolistController::class, 'index'])->name('todo.index');
    Route::post('/todo', [TodolistController::class, 'store'])->name('store');
    // Route::get('/',[TodolistController::class,'index']);
    Route::get('todo/{id}', [TodolistController::class, 'destroy'])->name('delete');
});
// route to checkout
// Route::get('Paiement',[CheckoutController::class,'checkout'])->name('checkout.index');
// Route::get('stripe/payement',[CheckoutController::class,'afterPayment'])->name('checkout.afterPayment');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'afterPayment'])->name('checkout.afterPayment');
    Route::get('/merci', [CheckoutController::class, 'thankYou'])->name('checkout.merci');
});
Route::view('/email','email.registerViewEmail');
Route::get('/', function () {
    return view('welcome');
})->name('admin.index');
Route::view('/admin/user','dashboard.views.userTable')->name('admin.user');

// ----------------Remasteurisation------------------

Route::middleware(['auth','adminRole'])->group(function(){
    Route::view('/admin/index','dashboard.welcome')->name('admin.index');
    Route::view('/admin/products','dashboard.views.products')->name('admin.products');
});

// -------------------Fin Remasteurisation-------------





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__ . '/auth.php';
