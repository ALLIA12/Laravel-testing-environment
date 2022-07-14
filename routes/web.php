<?php

use App\Http\Controllers\EmailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestNotificationController;
use App\Models\Waifu;
use Illuminate\Http\Request;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WaifuController;
use Illuminate\Support\Facades\Auth;

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



// Show all waifus
Route::get('/', [WaifuController::class, 'index']);

//Show create form
Route::get('/waifus/create', [WaifuController::class, 'create'])->middleware(['auth', 'verified']);

//Store Waifu data
Route::post('/waifus', [WaifuController::class, 'store'])->middleware(['auth', 'verified']);

// Show Edit form
Route::get('/waifus/{waifu}/edit', [WaifuController::class, 'edit'])->middleware(['auth', 'verified']);

// Manage Waifus
Route::get('/waifus/manage', [WaifuController::class, 'manage'])->middleware(['auth', 'verified']);

// Update waifu
Route::put('/waifus/{waifu}', [WaifuController::class, 'update'])->middleware(['auth', 'verified']);

//Show single waifu
Route::get('/waifus/{waifu}', [WaifuController::class, 'show']);

//Delete single waifu
Route::delete('/waifus/{waifu}', [WaifuController::class, 'destroy'])->middleware(['auth', 'verified']);

// Send email
Route::get('/email', [EmailController::class, 'sendEmail']);

Route::get('/private', [HomeController::class, 'private']);

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('send-testNotification', [TestNotificationController::class, 'sendTestNotification']);

Route::get('/users/{userID}/acceptDean', [App\Http\Controllers\HomeController::class, 'acceptDean'])->name('acceptDean')->middleware(['auth']);

Route::get('/users/{userID}/denyDean', [App\Http\Controllers\HomeController::class, 'denyDean'])->name('denyDean')->middleware(['auth']);


// Route::delete('/hello/{id}', function ($id) {
//     return 'hello world' . $id;
// });



// Route::get('/posts/{id}', function ($id) {
//     to debug use dd
//     ddd($id);
//     or use ddd for more info
//     return Response('posts ' . $id);
//     You can add headers using ->header('foo','bar'); to the response
// })->where('id', '[0-9]+');


// Route::get('/search', function (Request $request) {
//     return $request;
// });