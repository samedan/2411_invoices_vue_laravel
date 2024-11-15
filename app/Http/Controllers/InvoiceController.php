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

    public function search_invoice(Request $request){
        $search = $request->get('s');
        if($search != null){
            $invoices = Invoice::with('customer')
                                    ->where('id', 'LIKE', "%$search%")
                                    ->get();
            return response()->json([
                'invoices' => $invoices
            ], 200);
        } else {
            return $this->get_all_invoices();
        }
    }
}
