<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Auth;
use App\Models\Payment;
use App\Models\Order;

class PaymentController extends Controller
{
    public function process(Request $request)
    {
        $cart_id = $request->input('cart_id');
        $totalAmount = $request->input('total_amount');

        // user_id	card_number	expiry_date	cvv	billing_address
        $payment = new Payment();
        $payment->user_id = Auth::user()->id;
        $payment->card_number = $request->input('card_number');
        $payment->expiry_date = $request->input('expiry_date');
        $payment->cvv = $request->input('cvv');
        $payment->billing_address = $request->input('billing_address');
        $payment->save();

        $paymentSuccessful = $this->processPayment($payment, $totalAmount);

        if ($paymentSuccessful) {
            $order = $this->createOrder($cart_id, $payment, $totalAmount);

            // Call createOrder method in OrderController
            return redirect()->route('order.show')->with('success', 'Payment successful. Order placed.');
        } else {
            return redirect()->route('cart.show')->with('error', 'Payment failed. Please try again.');
        }
    }

    private function processPayment($payment, $totalAmount)
    {
        // Process the payment using the payment gateway
        // For now, we'll just assume the payment was successful
        return true;
    }

    private function createOrder($cart_id, $payment, $totalAmount)
    {
        $order = new Order();
        $order->status = 'pending';
        $order->total_amount = $totalAmount;
        $order->user_id = Auth::user()->id;
        $order->cart_id = $cart_id;
        $order->payment_id = $payment->id;
        $order->save();

        foreach ($order->cart->cartProducts as $cartProduct) {
            $product = $cartProduct->product;
            $product->quantity -= $cartProduct->quantity; // Deduct the quantity of the product
            $product->save();
        }

        return $order;
    }
}
