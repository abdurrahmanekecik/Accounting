<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customercontroller;
use App\Http\Controllers\Expensescontroller;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\Managerscontroller;
use App\Http\Controllers\Revenuescontroller;


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
    return view('welcome');
});

Route::get('/dashboard', [Homecontroller::class, 'index'])->middleware(['auth']);

require __DIR__.'/auth.php';


Route::group(['middleware' => ['auth']], function() {
   /**
   * Logout Route
   */
   Route::get('/logout', [Homecontroller::class, 'logout']);
});



Route::get('/customers', [Customercontroller::class, 'index']);
Route::get('/customer-add', [Customercontroller::class, 'show']);
Route::post('/customer-add', [Customercontroller::class, 'create'])->name("customeradd");
Route::get('/customer-detail/{id}', [Customercontroller::class, 'edit'])->name("customerdetail");
Route::post('/customer-detail/{id}', [Customercontroller::class, 'update'])->name("customerupdate");
Route::get('/customer-delete/{id}', [Customercontroller::class, 'delete'])->name("customerdelete");



Route::get('/revenues', [Revenuescontroller::class, 'list']);
Route::get('/revenues-add', [Revenuescontroller::class, 'index']);
Route::post('/revenues-add', [Revenuescontroller::class, 'create'])->name("revenuesadd");
Route::get('/revenues-delete/{id}', [Revenuescontroller::class, 'delete'])->name("revenuesdelete");
Route::get('/revenues-detail/{id}', [Revenuescontroller::class, 'edit'])->name("revenuesdetail");
Route::post('/revenues-detail/{id}', [Revenuescontroller::class, 'update'])->name("revenuesupdate");



Route::get('/revenues', [Revenuescontroller::class, 'list']);
Route::get('/revenues-add', [Revenuescontroller::class, 'index']);
Route::post('/revenues-add', [Revenuescontroller::class, 'create'])->name("revenuesadd");
Route::get('/revenues-delete/{id}', [Revenuescontroller::class, 'delete'])->name("revenuesdelete");
Route::get('/revenues-detail/{id}', [Revenuescontroller::class, 'edit'])->name("revenuesdetail");
Route::post('/revenues-detail/{id}', [Revenuescontroller::class, 'update'])->name("revenuesupdate");



Route::get('/expenses', [Expensescontroller::class, 'list']);
Route::get('/expense-add', [Expensescontroller::class, 'index']);
Route::post('/expense-add', [Expensescontroller::class, 'create'])->name("expenseadd");
Route::get('/expense-detail/{id}', [Expensescontroller::class, 'edit'])->name("expensedetail");
Route::get('/expense-delete/{id}', [Expensescontroller::class, 'delete'])->name("expensedelete");
Route::post('/expense-detail/{id}', [Expensescontroller::class, 'update'])->name("expenseupdate");




Route::get('/managers', [Managerscontroller::class, 'list']);
Route::get('/manager-add', [Managerscontroller::class, 'create'])->name("manageradd");
Route::get('/manager-add', [Expensescontroller::class, 'show']);