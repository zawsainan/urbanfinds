@extends('admin.layouts.layout')
@section('admin_layout')
    <div class="container">
    <form action="" method="post">
        @csrf
            <div class="mb-3">
                <label class="form-label" for="title">Title</label>
                <input type="text" name="title" id="title" placeholder="Enter Product Title" class="form-control" required value="{{$product->title}}">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="category" id="category" class="form-select">
                    @foreach ($categories as $category)
                        <option @selected($category->id == $product->category_id) value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="description">Description</label>
                <textarea name="description" id="description" placeholder="Enter Product Title" class="form-control" rows="4">
                    {{$product->description}}
                </textarea>
            </div>
            <div class="row">
                <div class="col-4 mb-3 d-flex align-items-center">
                    <label class="form-label" for="price">Price </label>
                    <input type="number" name="price" id="price" class="form-control" required step="0.01" value="{{$product->price}}">
                </div>
                <div class="col-4 mb-3 d-flex align-items-center">
                    <label class="form-label" for="discountPercentage">Discount(%) </label>
                    <input type="number" name="discountPercentage" id="discountPercentage" class="form-control" step="0.01" value="{{$product->discountPercentage}}">
                </div>
                <div class="col-4 mb-3 d-flex align-items-center">
                    <label class="form-label" for="stock">Stock </label>
                    <input type="number" name="stock" id="stock" class="form-control" required step="1" value="{{$product->stock}}">
                </div>
            </div>
            <div class="row">
                <div class="col-4 mb-3 d-flex align-items-center">
                    <label for="brand" class="form-label">Brand </label>
                    <input type="text" name="brand" id="brand" class="form-control" value="{{$product->brand}}">
                </div>
                <div class="col-4 mb-3 d-flex align-items-center">
                    <label for="sku" class="form-label">SKU </label>
                    <input type="text" name="sku" id="sku" class="form-control" value="{{$product->sku}}">
                </div>
            </div>
            <div class="mb-3">
                <label for="tags" class="form-label">Tags (comma-separated)</label>
                <input type="text" name="tags" id="tags" class="form-control" value="{{implode(",",json_decode($product->tags))}}">
            </div>
            <div class="mb-3">
                <label for="images" class="form-label">Images (comma-separated)</label>
                <textarea name="images" id="images" rows="3" class="form-control">
                    {{implode(",",json_decode($product->images))}}
                </textarea>
            </div>
            <div class="mb-3">
                <label for="thumbnail" class="form-label">Thumbnail URL</label>
                <input type="text" name="thumbnail" class="form-control" id="thumbnail" value="{{$product->thumbnail}}">
            </div>
            <button class="btn btn-primary w-100">Update</button>
        </form>
    </div>
@endsection