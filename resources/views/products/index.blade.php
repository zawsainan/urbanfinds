@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="container my-3">
            @if ($selectedCategory == 0)
            <h3 class="h1 text-center my-3">We got {{$productCount}} products in total</h3>
            @else
            <h3 class="h1 text-center my-3">We got {{$productCount}} products</h3>
                
            @endif
                    <form action="/products/sort" class="d-flex" method="GET" onchange="this.submit()">
                        <select style="max-width: 160px" name="categoryBy" class="form-select me-2">
                            <option @selected($selectedCategory == 0) value="0">All Products</option>
                            @foreach ($categories as $category)
                                <option @selected($category->id == $selectedCategory) value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <select style="max-width: 170px" name="orderBy" class="form-select">
                            <option value="lth" @selected("lth" == $selectedOrder)>Price: Low to High</option>
                            <option value="htl" @selected("htl" == $selectedOrder)>Price: High to Low</option>
                            <option value="atz" @selected("atz" == $selectedOrder)>Title: A to Z</option>
                            <option value="zta" @selected("zta" == $selectedOrder)>Title: Z to A</option>
                        </select>
                    </form>
        </div>
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