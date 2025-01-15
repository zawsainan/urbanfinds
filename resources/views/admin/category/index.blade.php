@extends('admin.layouts.layout')
@section('admin_layout')
    @if (session('success'))
        <div class="alert alert-info">
            {{session('success')}}
        </div>
    @endif
    <h1>Category Management</h1>
    <div class="d-flex justify-content-between align-items-center my-3">
        <form action="{{url("admin/category/search")}}" class="w-50">
            <div class="input-group">
                <input type="text" name="searchBy" class="form-control rounded-start-pill" placeholder="Search categories...">
                <button class="btn btn-primary rounded-end-pill">Search</button>
            </div>
        </form>
        <a href="{{url("admin/category/add")}}" class="btn btn-outline-primary rounded-pill">Add New Category</a>
    </div>
    <table class="table table-rounded">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>slug</th>
                <th>created at</th>
                <th>updated at</th>
                <th>actions</th>
            </tr>
        </thead>
        @foreach ($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->slug}}</td>
                <td>{{$category->created_at}}</td>
                <td>{{$category->updated_at}}</td>
                <td>
                    <a href="" class="btn btn-sm btn-primary">Edit</a>
                    <a href="{{url("admin/category/delete/$category->id")}}" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="d-flex justify-content-center align-items-center">
        {{$categories->links()}}
    </div>
@endsection