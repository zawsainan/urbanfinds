@extends('admin.layouts.layout')
@section('admin_layout')
    <h3 class="h3 mb-3">User Management</h3>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role == 0 ? "Admin" : "Customer"}}</td>
                    <td>
                        <a href="{{url("/admin/user/edit/$user->id")}}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{url("/admin/user/ban/$user->id")}}" class="btn btn-warning btn-sm">Ban</a>
                        <a href="{{url("/admin/user/delete/$user->id")}}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection