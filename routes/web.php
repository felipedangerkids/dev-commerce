<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PainelController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteController;
use App\Http\Livewire\Categories;
use App\Http\Livewire\Products;
use App\Http\Livewire\ProductsCalc;
use App\Http\Livewire\Testes;
use Illuminate\Support\Facades\Route;

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
//site
Route::get('/', [SiteController::class, 'index']);
Route::get('/product-detail/{slug}', [SiteController::class, 'productDetail']);
Route::get('/categoria/{slug}', [SiteController::class, 'categoria']);
Route::get('products-all', [SiteController::class, 'allProducts']);
Route::get('/checkout', [CheckoutController::class, 'index']);
Route::any('/correios', [CheckoutController::class, 'correios']);
Route::post('/proccess', [CheckoutController::class, 'proccess'])->name('proccess');
Route::post('/proccess-boleto', [CheckoutController::class, 'proccessBoleto'])->name('proccess.boleto');
Route::get('/thanks', [CheckoutController::class, 'thanks'])->name('thanks');
Route::post('notification', [CheckoutController::class, 'notification'])->name('notification');
Route::post('search', [SiteController::class, 'search']);
//cart
Route::get('/cart/remove', [CartController::class, 'cartRemove'])->name('cart.remove');
Route::get('/cart/remove/{id}', [CartController::class, 'itemRemove'])->name('cart.remove.item');
Route::get('/cart', [CartController::class, 'cart']);
Route::post('/cart-add', [CartController::class, 'cartAdd']);
Route::post('cart-update/{id}', [CartController::class, 'update']);
Route::get('account-user', [SiteController::class, 'accountUser']);
// Route::get('/web', [PainelController::class, 'index']);
// Route::middleware(['auth:sanctum', 'verified'])->get('/teste', [PainelController::class, 'teste']);
Route::post('/teste-store', [PainelController::class, 'salvar']);

Route::middleware(['auth', 'permission'])->group(function () {
    Route::get('dashboard', [PainelController::class, 'index']);
    Route::get('category', Categories::class);
    Route::get('products-live', Products::class);
    Route::get('testeslive', Testes::class);
    Route::get('products', [ProductController::class, 'index']);
    Route::get('products-create', [ProductController::class, 'create']);
    Route::post('products-store', [ProductController::class, 'store']);
    Route::any('products-delete/{id}', [ProductController::class, 'destroy']);
    Route::any('products-edit/{id}', [ProductController::class, 'edit']);
    Route::any('products-update/{id}', [ProductController::class, 'update']);
    Route::any('products-image-delete/{id}', [ProductController::class, 'imageDelete']);
    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/orders-show/{id}', [OrderController::class, 'showOrder']);
    Route::get('users', [PainelController::class, 'users']);
    Route::get('account', [PainelController::class, 'conta']);
    Route::get('admin-edit/{id}', [AdminController::class, 'show']);
    Route::post('admin-update/{id}', [AdminController::class, 'update']);
    Route::post('admin-pass-update/{id}', [AdminController::class, 'uppass']);
});

Route::middleware(['auth'])->group(function () { 
    Route::get('/minha-conta', [SiteController::class, 'minhaConta']);
    Route::get('/pedidos-show/{id}', [SiteController::class, 'showOrder']);
});

// Route::middleware(['auth', 'permission'])->get('/dashboard', function () {
//     return view('painel.dashboard');
// })->name('dashboard');

Route::get('/link', function () {
    $exitCode = Artisan::call('storage:link');
});
Route::get('/teste', [SiteController::class, 'teste']);