<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SectionsController;

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
Route::resource('invoices',InvoicesController::class);
Route::resource('sections',SectionsController::class);
Route::resource('products',ProductsController::class);
Route::get('section/{id}',[InvoicesController::class,'product_add']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/{page}', [AdminController::class,'index']);





