<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function product(){
        return $this->belongsToMany(Product::class, 'cart_products');
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
