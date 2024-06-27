<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Site\BookController;
use App\Http\Controllers\Site\CartControler;
use App\Http\Controllers\Site\HideController;
use App\Http\Controllers\Site\PaymentController;
use App\Http\Controllers\Site\UploadController;
use App\Http\Controllers\User\UserController;
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

Route::get('', [BookController::class, 'showHome'])->name('site.home');


Route::get('/login', function () {
    return view('site.login');
})->name('site.login');

Route::post('/login/do', [AuthController::class, 'login'])->name('site.login.do');
Route::post('/logout', [AuthController::class, 'logout'])->name('site.logout');

Route::post('/login/register', [UserController::class, 'store'])->name('site.register');

Route::get('/jogos', [BookController::class, 'show'])->name('site.books');

Route::get('/Jogos/{id}', [BookController::class, 'index'])->name('site.books.index');


Route::get('/bookstore', function () {
    return view('site.upload.form');
})->name('site.upload.form');

Route::post('/Jogos/form/upload', [BookController::class, 'store'])->name('site.upload.store');

Route::get('/Vendas', [HideController::class, 'index'])->name('site.rents');

Route::middleware(['auth:web'])->group(function () {

    Route::get('/carrinho', [CartControler::class, 'showCart'])->name('site.cart');
    Route::delete('/carrinho/delete', [CartControler::class, 'deleteCart'])->name('site.cart.delete');
    Route::post('/carrinho/checkout/do', [PaymentController::class, 'paymentPost'])->name('site.checkout.do');

    Route::get('/perfil', function () {
        return view('site.profile');
    })->name('site.profile');

    Route::get('/perfil/vender', function () {
        return view('site.hire');
    })->name('site.hire');

    Route::get('/perfil/endereco', function () {
        return view('site.address');
    })->name('site.address');

    Route::get('/perfil/seus-pedidos', [UserController::class, 'showDemands'])->name('site.demand');

    Route::post('/perfil/endereco/do', [UserController::class, 'storeAdress'])->name('site.adress.do');

    Route::post('/perfil/Vender/do', [HideController::class, 'store'])->name('site.hire.do');
});
