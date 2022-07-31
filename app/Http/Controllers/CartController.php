<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    public function addToCart(Product $product) {
        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = new Cart();
        }
        $cart->addToCart($product);
        
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Cart added successfully');
    }

    public function shop_cart() {
        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = null;
        }

        return view('cart.cart', compact('cart'));
    }

    public function check_out($amount) {
        return view('cart.check_out', compact('amount'));
    }

    public function charge(Request $request) {
        \Stripe\Stripe::setApiKey('sk_test_51LPu9mHJkee76k8rBclWKt58qp62XtDXOLBJJ1XXX4rd3Oz73N0sOcRBZ9HxRecVd6y5TBtK4IIn3pGyzAQQmR1r005RFDaW4C');
        $charge = \Stripe\Charge::create([
          'amount' => $request->amount * 100,
          'currency' => 'usd',
          'description' => 'Example charge',
          'source' => $request->stripeToken,
        ]);

        $chargeId = $charge['id'];
        if($chargeId) {
            session()->forget('cart');  
            return redirect()->route('products.index')->with('success', "Payment was done. Thanks");
        } else {
            return redirect()->back();
        }
    }
}
