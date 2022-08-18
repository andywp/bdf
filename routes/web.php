<?php

use Illuminate\Support\Facades\Route;
use App\Events\OrderStatusUpdated;
use App\Http\Controllers\Admin\AdminController;
use App\Models\Admin;
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
    //event(new OrderStatusUpdated('Hello Echo'));
    return view('welcome');
});

Route::get('/send', function () {
    event(new OrderStatusUpdated('Hello Echo'));
   echo 'ekekeke';
});

/* Route::get('/admin', function () {
    Admin::create(
        [
            'name' => 'Andi Wijang Prasetyo',
            'email' => 'andy.wijang@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('andi//123'), // password
            'remember_token' => Str::random(10),
        ]
        );
}); */

Auth::routes();

Route::prefix('awp-admin')->name('admin.')->group(function(){
    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
        Route::view('/login','admin.auth.login')->name('login');
        Route::post('/login',[AdminController::class,'check'])->name('login');
    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::view('/','admin.home')->name('home');
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
    });

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
