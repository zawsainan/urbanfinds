@extends('layouts.app')

@section('content')
<section class="bg-dark py-5 text-white hero d-flex align-items-center justify-content-center">
    <div class="wrapper"></div>
    <div class="container-fluid p-5 text-center font-bold text-white">
        <h1 class="display-4 fw-bold">Discover Amazing Products</h1>
        <p class="lead">Exclusive deals and offers await you.</p>
        <a href="{{url("/products")}}" class="btn btn-primary btn-lg">Explore Now</a>
    </div>
</section>
@endsection
