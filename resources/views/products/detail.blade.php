@extends('layouts.app')
@section('content')
    @php
        $images = json_decode($product->images);
    @endphp
    <div class="container mt-3">
        <div class="row">
            <div class="col-12 col-md-6">
                @if (count($images) > 1)
                <div id="carouselExampleIndicators" class="carousel slide position-relative border rounded-1">
                    @if ($product->discountPercentage)
                                    <span class="badge bg-danger position-absolute p-2" style="top: 10px; left: 10px; border-radius: 0;">-{{$product->discountPercentage}}%</span>             
                    @endif
                    <div class="carousel-indicators">
                        @foreach ($images as $key => $image)
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$key}}" class="{{$key == 0 ? "active" : ""}}" aria-current="true" aria-label="Slide 1"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach ($images as $key => $image)
                            <div class="carousel-item {{$key == 0 ? "active" : ""}}">
                                <img src="{{$image}}" class="d-block w-100 mx-auto" alt="{{$product->title}} Image" style="width: 500px; height: 500px; object-fit: contain;">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                </div>
                @else
                    <img src="{{$images[0]}}" class="d-block w-100" alt="{{$product->title}} Image" style="max-width: 500px;">
                @endif
            </div>
            <div class="col-12 col-md-6">
                <h2 class="mb-3">{{ $product->title }}</h2>
            <p class="text-muted">{{ $product->category->name }}</p>
            @if ($product->discountPercentage)
                <span class="lead text-danger text-decoration-line-through">${{ number_format($product->price, 2) }}</span>
                <span class="lead">${{ number_format(($product->price * (100 - $product->discountPercentage)/100), 2) }}</span>
                
            @else
                <p class="lead">${{ number_format($product->price, 2) }}</p>
            @endif
            
            <p>{{ $product->description }}</p>
            
            <ul class="list-unstyled">
                <li><strong>Brand:</strong> {{ $product->brand }}</li>
                <li><strong>SKU:</strong> {{ $product->sku }}</li>
                <li><strong>Stock:</strong> {{ $product->stock }}</li>
                <li><strong>Warranty:</strong> {{ $product->warrantyInformation }}</li>
                <li><strong>Shipping:</strong> {{ $product->shippingInformation }}</li>
            </ul>
            
            <form action="{{url("/cart/add/$product->id")}}" class="d-flex align-items-center">
                <input type="number" name="quantity" style="width: 100px" max="{{$product->stock}}" value="1" class="form-control">
                <button class="btn btn-primary me-2">Add to Cart</button>
            </form>
            </div>
        </div>
        <h3 class="h3 my-3">You may also like</h3>
        <div class="row mb-2">
            @foreach ($similarProducts as $item)
                <div class="card" style="width: 120px; height: 190px;">
                            <a href="{{url("/products/detail/$item->id")}}" style="all: unset;">
                            <img src="{{$item->thumbnail}}" alt="{{$item->title}} Image" class="card-img-top">
                            <div class="card-body">
                                <h6 class="h6 card-text">{{$item->title}}</h6>
                            </div>
                        </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection