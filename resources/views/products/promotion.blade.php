@extends('layouts.app')
@section('content')
    <div class="container">
        <h4 class="h4 text-center my-4">Promotion Items</h4>
        <div class="row g-0">
            @foreach ($products as $product)
            <div class="col-12 col-lg-3 col-md-4 col-sm-6">
                <a style="all:unset" href="{{url("/products/detail/$product->id")}}">
                    <div class="card card-custom">
                        @if ($product->discountPercentage)
                            <span class="badge bg-danger position-absolute p-2" style="top: 10px; left: 10px; border-radius: 0;">-{{$product->discountPercentage}}%</span>             
                        @endif
                            <img src="{{$product->thumbnail}}" alt="{{$product->title}} Image" class="card-img-top d-block mx-auto" style="max-width: 200px">
                            <div class="card-body">
                                <h6 class="card-text mb-2">{{$product->title}}</h6>
                                <div class="d-flex justify-content-between">
                                    @if ($product->discountPercentage)
                                        <span class="text-danger text-decoration-line-through">${{$product->price}}</span>
                                        <span class="text-muted">${{number_format($product->price  * (100 - $product->discountPercentage) / 100,2)}}</span>
                                    @else
                                        <span class="text-muted">${{$product->price}}</span>
                                    @endif
                                    <a href="{{url("/cart/add/$product->id")}}" class="btn btn-sm btn-secondary">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
        </div>
        <div class="d-flex justify-content-center mt-3">
            {{$products->links()}}
        </div>
    </div>
@endsection