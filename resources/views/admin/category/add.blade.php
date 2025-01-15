@extends('admin.layouts.layout')
@section('admin_layout')
    
<form method="POST">
    @csrf
    <div class="d-flex align-items-center mb-3">
        <label for="name" class="form-label me-2">Name: </label>
        <input type="text" name="name" id="name" placeholder="Category Name" required class="form-control">
    </div>
    <div class="d-flex align-items-center mb-3">
        <label for="slug" class="form-label me-2">Slug: </label>
        <input type="text" name="slug" id="slug" placeholder="Category Slug" required class="form-control">
    </div>
    <button class="btn btn-primary w-100">Add Category</button>
</form>
@endsection