<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OtherController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StrukController;

// Route::get('/', function () {
//     return redirect('home');
// });

Route::middleware(['guest'])->group(function () {

    Route::get('/', function () {
        return view('home');
    });
    // Route::get('login', [HomeController::class, 'login'])->name('login');
    // Route::get('register', [HomeController::class, 'register'])->name('register');
    Route::get('home', [OtherController::class, 'index'])->name('home');
    Route::get('about', [OtherController::class, 'about'])->name('about');
    Auth::routes();
});




Route::middleware(['auth', 'checklevel:admin', 'checkstatus:blokir'])->prefix('admin')->group(function () {
    Route::get('/home', [HomeController::class, 'indexA'])->name('admin.home');

    Route::get('/profile', [HomeController::class, 'profileA'])->name('admin.profile');
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'store'])->name('settings.store');
    Route::resource('customers', CustomerController::class);

    Route::get('/user/index', [HomeController::class, 'indexLA'])->name('user.index');
    Route::get('/create', [HomeController::class, 'indexCreate'])->name('admin.user.create');
    Route::get('/edit/{id}', [HomeController::class, 'indexEdit'])->name('admin.edit');
    Route::post('/admin/user/indexStore', [HomeController::class, 'indexStore'])->name('admin.user.indexStore');

    Route::post('/simpan', [HomeController::class, 'simpanA'])->name('admin.simpan');
    Route::post('/update/{id}', [HomeController::class, 'updateA'])->name('admin.update');

    Route::post('/block/{id}', [CustomerController::class, 'block'])->name('block');

    Route::get('/blocked', [HomeController::class, 'blockedA'])->name('admin.blocked');
});

// User routes
Route::middleware(['auth', 'checklevel:user', 'checkstatus:blokir'])->prefix('user')->group(function () {
    // Define user-specific routes here
    Route::get('/home', [HomeController::class, 'indexU'])->name('user.home');
    Route::get('/profile', [HomeController::class, 'profile'])->name('user.profile');
    Route::resource('products', ProductController::class);
    Route::resource('orders', OrderController::class);
    Route::get('/cart', [CartController::class, 'index'])->name('user.cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::post('/cart/change-qty', [CartController::class, 'changeQty']);
    Route::delete('/cart/delete', [CartController::class, 'delete']);
    Route::delete('/cart/empty', [CartController::class, 'empty']);
    // Route::get('/orders/struk', [StrukController::class, 'struk'])->name('orders.struk');
    Route::get('/orders/print/{orderId}', [StrukController::class, 'print'])->name('orders.print');
    Route::get('/edit', [HomeController::class, 'edit'])->name('user.edit');
    Route::post('/simpan', [HomeController::class, 'simpan'])->name('user.simpan');

    Route::get('/blocked', [HomeController::class, 'blocked'])->name('blocked');
    Route::get('/blokir', [HomeController::class, 'blokir'])->name('user.blokir');
    Route::post('/crop', [SettingController::class, 'cropImage'])->name('crop');
});

// Route::post('/postLogin', [HomeController::class, 'postLogin'])->name('postLogin');
// Route::post('/postRegister', [HomeController::class, 'postRegister'])->name('postRegister');
Route::post('/logout', [HomeController::class, 'logout'])->name('logout');