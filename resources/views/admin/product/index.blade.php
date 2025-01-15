@extends('admin.layouts.layout')
@section('admin_layout')
    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-info">
                {{ session('success') }}
            </div>
        @endif
        <nav class="navbar">
            <div class="container-fluid">
                    <form action="{{url("admin/product/search")}}" class="input-group w-50">
                        <input type="search" name="search" class="form-control input-group-item rounded-start-pill" placeholder="Search products..." >
                        <button class="btn btn-primary input-group-item rounded-end-pill">
                            Search
                        </button>
                    </form>
    
                    <form class="ms-auto" action="{{url("admin/product/sort")}}" onchange="this.submit()">
                        <select name="sortBy" id="" class="form-select">
                            <option selected disabled>Sort by</option>
                            <option value="price-asc">Price: Low to High</option>
                            <option value="price-desc">Price: High to Low</option>
                            <option value="rating">Rating</option>
                            <option value="stock">Stock</option>
                        </select>
                    </form>
                    <a href="{{url("admin/product/add")}}" class="btn btn-outline-primary ms-3 rounded-pill">+ New Product</a>
            </div>
        </nav>
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Rating</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            @foreach ($products as $product)
                <tr>
                    <td>
                        <img src="{{$product->thumbnail}}" alt="" style="width: 50px; height: 50px;" class="img-fluid">    
                    </td>    
                    <td>{{$product->title}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->stock}}</td>
                    <td>{{$product->rating ?? 'N/A'}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>
                        <a href="{{url("/admin/product/edit/$product->id")}}" class="btn btn-secondary">Edit</a>
                        <a href="{{url("/admin/product/delete/$product->id")}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>                
            @endforeach
        </table>
        <div class="my-3 d-flex justify-content-center">
            {{$products->links()}}
        </div>
    </div>
@endsection
