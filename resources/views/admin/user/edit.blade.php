@extends('admin.layouts.layout')
@section('admin_layout')
    <form method="POST">
        @csrf
        <div class="d-flex column-gap-2 mb-2">
            <label for="name" class="form-label">Name: </label>
            <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
        </div>
        <div class="d-flex column-gap-2 mb-2">
            <label for="email" class="form-label">Email: </label>
            <input type="text" name="email" id="email" class="form-control" value="{{$user->email}}">
        </div>
        <div class="d-flex column-gap-2 mb-2">
            <label for="role" class="form-label">Role: </label>
            <select id="role" name="role" class="form-select">
                <option @selected($user->role == 0) value="{{0}}">Admin</option>
                <option @selected($user->role == 1) value="{{1}}">Customer</option>
            </select>
        </div>
        <button class="btn btn-primary w-100">Update</button>
    </form>
@endsection