@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <div class="container">
            <h1>Hello, world!</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam asperiores doloremque praesentium alias neque modi dolore, repellat tempore ex natus veritatis excepturi minus eligendi fugit odit velit facere dolores placeat.</p>
            <a class="btn btn-primary btn-lg" href="{{ route('products.index') }}" role="button">Go to store</a>
        </div>
    </div>

    <section>
        <div class="row mt-4">
            @foreach ($latestProducts as $product)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ $product->image }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->title }}</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Buy Now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>
@endsection
