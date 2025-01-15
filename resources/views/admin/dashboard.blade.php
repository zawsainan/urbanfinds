@extends('admin.layouts.layout')

@section('admin_layout')
<div class="container py-5">
    <div class="row">
        <!-- Total Sales Card -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-gradient-primary text-white">
                    <h5 class="m-0">Total Sales</h5>
                </div>
                <div class="card-body text-center">
                    <h3 class="display-4 text-success">$3,124</h3>
                    <p class="text-muted">Total sales today</p>
                </div>
            </div>
        </div>

        <!-- Number of Products Card -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-gradient-success text-white">
                    <h5 class="m-0">Number of Products</h5>
                </div>
                <div class="card-body text-center">
                    <h3 class="display-4 text-info">1,243</h3>
                    <p class="text-muted">Total products in store</p>
                </div>
            </div>
        </div>

        <!-- Number of Orders Card -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-gradient-warning text-white">
                    <h5 class="m-0">Number of Orders</h5>
                </div>
                <div class="card-body text-center">
                    <h3 class="display-4 text-danger">567</h3>
                    <p class="text-muted">Total orders placed</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Orders Table -->
    <div class="col-md-12 mb-4">
        <div class="card shadow-lg border-0 rounded-lg">
            <div class="card-header bg-gradient-dark text-white">
                <h5 class="m-0">Recent Orders</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Order ID</th>
                            <th>User</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#ORD12345</td>
                            <td>John Doe</td>
                            <td>$124.99</td>
                            <td><span class="badge bg-success">Completed</span></td>
                            <td>2025-01-12</td>
                        </tr>
                        <tr>
                            <td>#ORD12346</td>
                            <td>Jane Smith</td>
                            <td>$55.00</td>
                            <td><span class="badge bg-warning">Pending</span></td>
                            <td>2025-01-14</td>
                        </tr>
                        <tr>
                            <td>#ORD12347</td>
                            <td>Tom Lee</td>
                            <td>$200.75</td>
                            <td><span class="badge bg-danger">Cancelled</span></td>
                            <td>2025-01-13</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
