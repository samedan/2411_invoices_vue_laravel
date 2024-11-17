<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\InvoiceItem;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'total',
        'customer_id',
        'number',
        'sub_total',
        'date',
        'due_date',
        'reference',
        'discount',
        'terms_and_conditions',
    ];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function invoice_items() {
        return $this->hasMany(InvoiceItem::class);
    }
}
