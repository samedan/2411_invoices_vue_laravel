<?php

namespace App\Http\Controllers;

use App\Models\Counter;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;


class InvoiceController extends Controller
{
    // GET ALL invoices
    public function get_all_invoices() {
        $invoices = Invoice::with('customer')->orderBy('id', 'DESC')->get();
        // $invoices = Invoice::with('customer')->all();
        // dd($invoices);
        return response()->json([
            'invoices' => $invoices
        ], 200  );
    }

    // SEARH Get invoice
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

    // GET New Default Form invoice
    public function create_invoice(Request $request) {
        $counter = Counter::where('key', 'invoice')->first();
        $random = Counter::where('key', 'invoice')->first();
        $invoice = Invoice::orderBy('id', 'DESC')->first();
        if($invoice) {
            $invoice = $invoice->id+1;
            $counters = $counter->value + $invoice;
        } else {
            $counters = $counter->value;
        }
        // dd(prefix.$counters);

        $formData = [
            'number' => $counter->prefix.$counters,
            'customer_id' =>null,
            'customer' => null,
            'date'=> date('Y-m-d'),
            'due_date'=> null,
            'reference'=> null,
            'discount'=> 0,
            'terms_and_conditions'=> 'Default',
            'items' => [
                [
                    'product_id' =>null,
                    'product' =>null,
                    'unit_price' =>0,
                    'quantity' =>1,
                ]
            ]
        ];
        // dd($formData);
        return response()->json($formData);
    }
    

    // POST New Invoice
    public function add_invoice(Request $request) {
        $invoiceItem = $request->input('invoice_item');
        $invoiceData['sub_total'] = $request->input('sub_total');
        $invoiceData['total'] = $request->input('total');
        $invoiceData['number'] = $request->input('number');
        $invoiceData['customer_id'] = $request->input('customer_id');
        $invoiceData['date'] = $request->input('date');
        $invoiceData['due_date'] = $request->input('due_date');
        $invoiceData['discount'] = $request->input('discount');
        $invoiceData['reference'] = $request->input('reference');
        $invoiceData['terms_and_conditions'] = $request->input('terms_and_conditions');
        
        $invoice = Invoice::create($invoiceData);

        foreach (json_decode($invoiceItem) as $item) {
            $itemData['product_id'] = $item->id;
            $itemData['invoice_id'] = $invoice->id;
            $itemData['quantity'] = $item->quantity;
            $itemData['unit_price'] = $item->unit_price;

            InvoiceItem::create($itemData);

        }
    }

    // GET One invoice
    public function show_invoice($id){
        $invoice = Invoice::with(['customer', 'invoice_items.product'])->find($id);
        return response()->json([
            'invoice' => $invoice        
            ], 200);
    }

    // EDIT Invoice
    public function edit_invoice($id){
        $invoice = Invoice::with(['customer', 'invoice_items.product'])->find($id);
        return response()->json([
            'invoice' => $invoice        
            ], 200);
    }

    // DELETE Invoice Item
    public function delete_invoice_items ($id){
        $invoiceItem = InvoiceItem::findOrFail($id);
        $invoiceItem->delete();

    }

    // UPDATE Invoice
    public function update_invoice(Request $request, $id) {
        $invoice = Invoice::where('id', $id)->first();
        $invoice->sub_total = $request->subtotal;
        $invoice->total = $request->total;
        $invoice->customer_id = $request->customer_id;
        $invoice->number = $request->number;
        $invoice->date = $request->date;
        $invoice->due_date = $request->due_date;
        $invoice->discount = $request->discount;
        $invoice->reference = $request->reference;
        $invoice->terms_and_conditions = $request->terms_and_conditions;

        $invoice->update($request->all());
        $invoiceItem = $request->input('invoice_item');
        $invoice->invoice_items()->delete();
        foreach(json_decode($invoiceItem) as $item){
            $itemData['product_id'] = $item->product_id;
            $itemData['invoice_id'] = $invoice->id;
            $itemData['quantity'] = $item->quantity;
            $itemData['unit_price'] = $item->unit_price;

            InvoiceItem::create($itemData);
        }
    }
}
