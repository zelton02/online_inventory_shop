<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    // id	customer_id	cart_id	payment_method	card_number	expiry_date	cvv	billing_address	created_at	updated_at

    protected $fillable = [
        'cart_id', 'payment_method', 'card_number', 'expiry_date', 'cvv', 'billing_address'
    ];

    public function user()
    {
        return $this->belongsTo(Customer::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
