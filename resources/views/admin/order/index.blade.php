@extends('admin.layouts.layout')
@section('admin_layout')
    <h1 class="h3 my-3">Purchase History</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th>Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->user->name}}</td>
                    <td>${{$order->total_amount}}</td>
                    <td>
                        <span class="badge
                            @if ($order->status == 'complete')
                                bg-success
                            @elseif ($order->status == "refunded")
                                bg-danger
                            @elseif ($order->status == "pending")
                                bg-warning
                            @endif
                        ">
                            {{$order->status}}
                        </span>
                    </td>
                    <td>{{$order->created_at}}</td>
                    <td><a href="{{url("admin/order/detail/$order->id")}}" class="btn btn-primary btn-sm">View</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection