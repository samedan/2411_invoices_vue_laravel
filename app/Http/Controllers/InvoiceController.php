<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;


class InvoiceController extends Controller
{
    public function get_all_invoices() {
        $invoices = Invoice::with('customer')->orderBy('id', 'DESC')->get();
        // $invoices = Invoice::with('customer')->all();
        // dd($invoices);
        return response()->json([
            'invoices' => $invoices
        ], 200  );
    }
}
