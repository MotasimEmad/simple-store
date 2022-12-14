@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if($cart)
            <div class="col-md-8">
                @foreach($cart->items as $product)
                        <div class="card mb-2">
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ $product['title'] }}
                                </h5>
                                <div class="card-text">
                                    ${{ $product['price'] }}
                                    <span>({{ $product['qty'] }} piece)</span>
                                </div>
                            </div>
                        </div>
                @endforeach
                <p><strong>Total : $ {{ $cart->totalPrice }}</strong></p>
            </div>
            <div class="col-md-4">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h3 class="card-titel">
                            Your Cart
                            <hr>    
                        </h3>
                        <div class="card-text">
                            <p>
                                Total Amount is ${{ $cart->totalPrice }}
                            </p>
                            <p>
                                Total Quantities is {{ $cart->totalQty }}
                            </p>
                            <a href="/check-out/{{ $cart->totalPrice }}" class="btn btn-info">Chekout</a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <p>There is no items</p>
        @endif
    </div>
</div>
@endsection
