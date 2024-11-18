<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
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

////// INVOICES //////
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


////// CUSTOMERS //////
// GET All Customers
Route::get('/customers', [
    CustomerController::class, 'all_customers'
]);


////// PRODUCTS //////
// GET All Products
Route::get('/products', [
    ProductController::class, 'all_products'
]);


///// INVOICES ///////
// POST Invoice
Route::post('/add_invoice', [
    InvoiceController::class, 'add_invoice'
]);

// GET One Invoice
Route::get('/show_invoice/{id}', [
    InvoiceController::class, 'show_invoice'
]);
// GET Form EDIT  Invoice
Route::get('/edit_invoice/{id}', [
    InvoiceController::class, 'edit_invoice'
]);
// DELETE Form EDIT  Invoice
Route::get('/delete_invoice_items/{id}', [
    InvoiceController::class, 'delete_invoice_items'
]);
// UPDATE EDIT  Invoice
Route::post('/update_invoice/{id}', [
    InvoiceController::class, 'update_invoice'
]);
// DELETE  Invoice
Route::get('/delete_invoice/{id}', [
    InvoiceController::class, 'delete_invoice'
]);
