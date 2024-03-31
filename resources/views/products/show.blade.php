@extends('layout')

@section('title', 'List Product')

@section('content')
<div class="row gx-5">
    <input type="hidden" id="productId" value="${product.id}">
    <input type="hidden" id="productName" value="${product.name}">
    <input type="hidden" id="productImage" value="${product.image}">
    <input type="hidden" id="productPrice" value="${product.price}">
    <aside class="col-lg-6">
        <div class="border rounded-4 mb-3 d-flex justify-content-center">
            <a href="">
                <img style="max-width: 80%; max-height: 80vh; margin: auto;" class="rounded-4 fit" src="{{ url($product-> img)}}" />
            </a>
        </div>
        <div class="d-flex justify-content-center mb-3">
            <a class="border mx-1 rounded-2" href="#">
                <img width="120" height="120" class="rounded-2" src="../img/product-1.jpg" />
            </a>
            <a class="border mx-1 rounded-2" href="#">
                <img width="120" height="120" class="rounded-2" src="../img/product-4.jpg" />
            </a>
            <a class="border mx-1 rounded-2" href="#">
                <img width="120" height="120" class="rounded-2" src="../img/product-6.jpg" />
            </a>
            <a class="border mx-1 rounded-2" href="#">
                <img width="120" height="120" class="rounded-2" src="../img/product-2.jpg" />
            </a>
            <a class="border mx-1 rounded-2" href="#">
                <img width="120" height="120" class="rounded-2" src="../img/product-8.jpg" />
            </a>
        </div>
    </aside>
    <main class="col-lg-6">
        <div class="ps-lg-3">
            <h4 class="title text-dark">
                {{$product-> name}}
            </h4>
            <div class="d-flex flex-row my-3">
                <div class="text-warning mb-1 me-2">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <span class="ms-1">
                        4.5
                    </span>
                </div>
            </div>

            <div class="mb-3">
                <span class="h5">{{$product-> price}}</span>

            </div>

            <p>
                {{$product-> desc}}
            </p>

            <div class="row">
                <dt class="col-3">Type:</dt>
                <dd class="col-9">...</dd>

                <dt class="col-3">Color</dt>
                <dd class="col-9">...</dd>

                <dt class="col-3">Material</dt>
                <dd class="col-9">...</dd>

                <dt class="col-3">Brand</dt>
                <dd class="col-9">...</dd>
            </div>

            <hr />

            <div class="row mb-4">


                <label class="mb-2 d-block">Quantity</label>
                <div class="input-group mb-3" style="width: 170px;">
                    <input id="quantity" type="number" value="1" max="10" name="quantity" min="1" class="form-control quantity-input">
                </div>
                <div class="col-md-4 col-6">
                    <button id="btnAddToCart" href="#" class="btn btn-warning shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> Add to
                        cart </button>
                </div>

            </div>
        </div>
    </main>
</div>
@endsection