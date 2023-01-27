<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Http;
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

Route::get('/', [ContactController::class, 'contactsHome'])->name('contactsHome');

Route::get('/new-contact', function () {
    return view('new_contact');
})->name('newContact');

Route::get('/login', function () {
    return view('login');
})->name('loginPage');

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login')->name('login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::controller(ContactController::class)->group(function () {
    Route::post('contact/register', 'register')->name('registerContact');
    Route::get('contact/delete/{id}', 'destroy')->name('deleteContact');
    Route::get('contacts', 'getAllContacts');
    Route::get('contact/{id}', 'getContact')->name('getContact');
});
