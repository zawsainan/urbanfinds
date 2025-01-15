<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Checkout</h1>
        <form  method="POST">
            @csrf

            <!-- User Details -->
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name ?? '' }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email ?? '' }}" required>
            </div>

            <!-- Address -->
            <div class="mb-3">
                <label for="address" class="form-label">Shipping Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            </div>

            <!-- Payment Method -->
            <div class="mb-3">
                <label for="payment_method" class="form-label">Payment Method</label>
                <select class="form-select" id="payment_method" name="payment_method" required>
                    <option value="credit_card">Credit Card</option>
                    <option value="paypal">PayPal</option>
                    <option value="cash_on_delivery">Cash on Delivery</option>
                </select>
            </div>

            <!-- Cart Summary -->
            <h4 class="mb-3">Order Summary</h4>
            <ul class="list-group mb-4">
                @foreach ($orderItems as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>{{ $item['title'] }} (x{{ $item['quantity'] }})</span>
                        <span>${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                    </li>
                @endforeach
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Total:</strong>
                    {{-- <strong>${{ number_format($total, 2) }}</strong> --}}
                </li>
            </ul>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100">Place Order</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
