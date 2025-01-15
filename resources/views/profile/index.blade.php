@extends('layouts.app')
@section('content')
    
<div class="container my-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Customer Profile</h3>
                </div>
                
                <div class="card-body">
                    <div class="mb-3">
                        <h5><strong>Name:</strong> {{ Auth::user()->name }}</h5>
                    </div>
                    
                    <div class="mb-3">
                        <h5><strong>Email:</strong> {{ Auth::user()->email }}</h5>
                    </div>
                    
                    <div class="mb-3">
                        <h5><strong>Joined At:</strong> {{ Auth::user()->created_at->format('d M Y') }}</h5>
                    </div>
                    
                    <div class="text-center">
                        <a class="btn btn-warning btn-sm mb-2">Edit Profile</a>
                    </div>
                    
                    <div class="text-center">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection