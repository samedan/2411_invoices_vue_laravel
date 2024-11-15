<?php

use App\Http\Controllers\InvoiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// GET All Invoices
Route::get('/get_all_invoices', [
    InvoiceController::class, 'get_all_invoices'
]);

// GET Search invoice
Route::get('/search_invoice', [
    InvoiceController::class, 'search_invoice'
]);

// GET Form New Invoice
Route::get('/create_invoice', [
    InvoiceController::class, 'create_invoice'
]);
