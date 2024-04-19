<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(Customer::class);
    }

    public function cartProducts()
    {
        return $this->hasMany(CartProduct::class);
    }

    // public function product(){
    //     return $this->belongsToMany(Product::class, 'cart_products');
    // }

    public function order()
    {
        return $this->hasOne(Order::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function totalAmount()
    {
        return $this->cartProducts->sum(function($cartProduct){
            return $cartProduct->product->price * $cartProduct->quantity;
        });
    }
}
