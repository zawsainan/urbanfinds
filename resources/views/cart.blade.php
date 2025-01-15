<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
</head>
<body>
    <div class="container px-3 py-4">
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Sub-total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp
                @if (!session()->get('cart'))
                    <h1 class="alert">Your cart is empty!!</h1>
                @else    
                    @foreach (session()->get('cart') as $id => $item)
                    @php
                        $subTotal = $item['price'] * $item['quantity'];
                        $total += $subTotal;
                    @endphp
                    <tr>
                        <td>
                            <img src="{{$item['thumbnail']}}" alt="{{$item['title']}} image" style="max-width: 120px;" class="img-thumbnail">
                            <span>{{$item['title']}}</span>
                        </td>
                        <td style="vertical-align: middle;">${{$item['price']}}</td>
                        <td style="vertical-align: middle;">
                            <form action="{{url("cart/update/$id")}}" method="post">
                                @csrf
                                <input type="number" name="quantity" style="width: 100px" max="{{$item['stock']}}"  value="{{$item['quantity']}}" class="form-control" onchange="this.closest('form').submit();">
                            </form>
                        </td>
                        <td style="vertical-align: middle;">${{$subTotal}}</td>
                        <td style="vertical-align: middle;"><a href="{{url("cart/remove/$id")}}"><i class="fa-solid fa-xmark text-danger"></i></a></td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"></td>
                    <td>Total ${{$total}}</td>
                </tr>
            </tfoot>
        </table>
        <div class="d-flex">
            <a href="{{url("/products")}}" class="btn btn-primary me-2">Back to Products</a>
            <a href="{{url("/cart/clear")}}" class="btn btn-danger me-auto">Clear</a>
            <a href="{{url("/checkout")}}" class="btn btn-success">Checkout</a>
        </div>
    </div>
</body>
</html>
