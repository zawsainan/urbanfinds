@extends('admin.layouts.layout')

@section('admin_layout')
<h1>Order Details</h1>
<p><strong>Order ID:</strong> {{ $order->id }}</p>
<p><strong>User:</strong> {{ $order->user->name }}</p>
<p><strong>Total Amount:</strong> {{ $order->total_amount }}</p>
<p><strong>Status:</strong> {{ $order->status }}</p>
<p><strong>Date:</strong> {{ $order->created_at }}</p>

<h2>Items</h2>
<table class="table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Cost</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($order->items as $item)
        <tr>
            <td>{{ $item->product->title }}</td>
            <td>{{ $item->quantity }}</td>
            <td>${{ $item->price }}</td>
            <td>${{ $item->price * $item->quantity }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@if ($order->status == 'pending')
    <a href="{{url("admin/order/confirm/$order->id")}}" class="btn btn-success">Confirm</a>
@endif
@if ($order->status != "refunded")
    <a href="{{url("admin/order/refund/$order->id")}}" class="btn btn-danger">Refund</a>
@endif
@endsection
