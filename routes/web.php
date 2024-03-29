<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ExpenseReportsController;
use App\Http\Controllers\ExpensesController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect("expense_reports");
});

Route::resource('/expense_reports', ExpenseReportsController::class);
Route::get('/expense_reports/{expense_report}/confirmDelete', [ExpenseReportsController::class, 'confirmDelete']);
Route::get('/expense_reports/{expense_report}/confirmSendEmail', [ExpenseReportsController::class, 'confirmSendEmail']);
Route::post('/expense_reports/{expense_report}/sendEmail', [ExpenseReportsController::class, 'sendEmail']);


Route::resource('/expense_reports/{expense_report}/expenses', ExpensesController::class);
Route::get('/expense_reports/expenses/{id_expense}/confirmDelete', [ExpensesController::class, 'confirmDelete']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');