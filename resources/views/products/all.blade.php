@extends('base')

@section('main')

    <div class="container">
        <div class="header"><h2>Header goes here</h2></div>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #6cb2eb;">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="product-section">
            @foreach($products as $product)
            <div class="product-box product-type-{{$product->productType->id}}">
                <div class="image-container">
                    <div class="ribbon"><span>Save &pound; {{number_format(($product->price - $product->discounted_price) / 100,2)}} !!</span></div>
                    <img class="product-image" src="images\{{$product->image_name}}" alt="{{$product->name}}">
                </div>
                <div class="product-name">{{$product->name}}</div>
                <div class="product-type">{{$product->productType->description}}</div>
                <div class="product-price"> Was &pound; {{number_format($product->price / 100,2)}}</div>
                <div class="product-price"><b> Now &pound; {{number_format($product->discounted_price / 100,2)}}</b></div>
                <div class="buy"><button class="btn btn-danger" type="submit">Buy Now</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection