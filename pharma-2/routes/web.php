<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/stu', [App\Http\Controllers\HomeController::class, 'stud']);
Route::get('/ps',[App\Http\Controllers\HomeController::class, 'prnpriview']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home', [App\Http\Controllers\HomeController::class, 'addsel'])->name('addsel');
Route::post('/viewtb', [App\Http\Controllers\HomeController::class, 'viewtb'])->name('viewtb');
Route::post('/undo', [App\Http\Controllers\HomeController::class, 'undo'])->name('undo');
Route::post('/invoice', [App\Http\Controllers\HomeController::class, 'invoice'])->name('invoice');
Route::get('/print_item', [App\Http\Controllers\HomeController::class, 'print_item'])->name('print_item');
Route::post('/addCuont', [App\Http\Controllers\HomeController::class, 'addCuont'])->name('addCuont');
Route::get('/clean', [App\Http\Controllers\HomeController::class, 'clean'])->name('clean');
Route::get('/printP', [App\Http\Controllers\HomeController::class, 'printP']);


// casher
Route::get('/Casher', [App\Http\Controllers\HomeController::class, 'inCasher'])->name('Casher');
Route::post('/Casher', [App\Http\Controllers\HomeController::class, 'addcasher'])->name('addcasher');

// supplier
Route::get('/Supplier', [App\Http\Controllers\HomeController::class, 'supplier'])->name('supplier');
Route::post('/Supplier/{status}/{id}', [App\Http\Controllers\HomeController::class, 'addSupplier'])->name('addSupplier');

// buy
Route::get('/Buy', [App\Http\Controllers\HomeController::class, 'buy'])->name('buy');
Route::post('/Buy/{status}/{id}', [App\Http\Controllers\HomeController::class, 'addbuy'])->name('addbuy');

// not lift
Route::get('/notleft', [App\Http\Controllers\HomeController::class, 'notleft'])->name('notleft');

// debt list
Route::get('/debtlist', [App\Http\Controllers\HomeController::class, 'debtlist'])->name('debtlist');

// expier date
Route::get('/expire', [App\Http\Controllers\HomeController::class, 'expire'])->name('expire');
// sellers
Route::get('/sellers', [App\Http\Controllers\HomeController::class, 'sellers'])->name('sellers');
Route::get('/profit', [App\Http\Controllers\HomeController::class, 'profit'])->name('profit');
Route::Post('/profit', [App\Http\Controllers\HomeController::class, 'search'])->name('search');

Auth::routes([
    'register'=>false,
    'verify'=>false,
    'password.request'=>false,
    'password.reset'=>false,
    'password.update'=>false
]);


