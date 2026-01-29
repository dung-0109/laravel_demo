<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AgeController;

Route::get('/', function () {
    return view('home.index');
});

// Product
Route::prefix('product')->group(function () {
    // Matches The "/admin/users" URL
    Route::get('/', function () {
        return view('product.index');
    })->name('product');

    Route::get('/add', function () {
        return view('product.add');
    })->name('add');

    Route::get('/{id?}', function (?string $id = "123") {
        return view('product.product-detail', ['id' => $id]);
    })->name('detail');
});

// Page Not Found
Route::fallback(function () {
    return View("error.404");
});

// Sinh viên
Route::get('/sinhvien/{name?}/{mssv?}', function (?string $name = "Luong Xuan Hieu", ?string $mssv = "123456") {
    return view('sinhvien.index', ['name' => $name, 'mssv' => $mssv]);
});

// Bàn cờ
Route::get('/banco/{n}', function (int $n) {
    return view('banco.index', ['n' => $n]);
});
Route::get('/login', function () {
    return view('login.index');
});

Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::get('/signin', 'signIn')->name('signin');
    Route::post('/check-signin', 'checkSignIn')->name('check.signin');
});

Route::get('/age', [AgeController::class, 'index']);
Route::post('/age/store', [AgeController::class, 'store']);

Route::get('/age/check', [AgeController::class, 'check'])
    ->middleware('check.age');