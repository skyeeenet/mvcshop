@extends('layouts.basic_layout')

@section('content')
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2> @if(isset($title)) {{ $title }} @else {{ "Shop" }} @endif</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
        @foreach($products as $product)
            <div class="col-md-3 col-sm-6">
                <div class="single-shop-product">
                    <div class="product-upper">
                        <img src="/{{ $product->image }}" alt="">
                    </div>
                    <h2><a href="/product/{{ $product->id }}">{{ $product->name }}</a></h2>
                    <div class="product-carousel-price">
                        <ins>{{ $product->price }}</ins> <del>$999.00</del>
                    </div>

                    <div class="product-option-shop">
                        <a class="add_to_cart_button add-to-cart" data-id="{{ $product->id }}" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="#">Add to cart</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        {{ $products->links() }}
    </div>
</div>
@endsection