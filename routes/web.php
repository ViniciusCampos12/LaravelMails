<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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
    return view('home');
});

/**
 * Grupo de rotas do mailable.
 */
Route::prefix('mailable')->group( function() {

    Route::get('write',[MailController::class,'write'])->name('mailable.write');

    Route::post('send',[MailController::class,'sendToJob'])->name('mailable.send');

});

/**
 * Grupo de rotas do  notification.
 */
Route::prefix('notification')->group( function() {

    Route::get('write',[NotificationController::class,'write'])->name('notification.write');

    Route::post('send',[NotificationController::class,'sendToJob'])->name('notification.send');

});
