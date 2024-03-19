@extends('layout')

@section('title', 'List Products')

@section('content')
<section class=" trending-product " id="trending ">
    <div class=" center-text ">
        <h2>Product</h2>
        <div class="ngancach">
            <hr>
        </div>
        <div class="products ">
            <div class="row ">
                @foreach($productList as $product)

                <img src="{{ $product->img }}" alt=" ">
                <div class=" product-text ">
                    <h5>New</h5>
                </div>
                <div class="heart-icon ">
                    <i class='bx bx-heart'></i>
                </div>
                <div class="ratting ">
                    <i class='bx bx-star'></i>
                    <i class='bx bx-star'></i>
                    <i class='bx bx-star'></i>
                    <i class='bx bx-star'></i>
                    <i class='bx bxs-star-half'></i>
                </div>
                <div class="pricee ">
                    <h4>{{ $product->name }}</h4>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</section>
@endsection