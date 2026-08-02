<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Invoice</title>

<style>
    * {
        font-family: Verdana, Arial, sans-serif;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 12px;
    }

    .header {
        background: #F7F7F7;
        padding: 15px;
    }

    .logo {
        color: green;
        font-size: 26px;
        font-weight: bold;
    }

    .right {
        text-align: right;
    }

    .section {
        background: #F7F7F7;
        padding: 10px 15px;
        margin-top: 10px;
    }

    .products th {
        background: green;
        color: #fff;
        padding: 8px;
        text-align: center;
    }

    .products td {
        padding: 8px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }

    .total {
        text-align: right;
        padding: 10px;
    }

    .thanks {
        margin-top: 20px;
        color: green;
        font-size: 14px;
    }

    .signature {
        margin-top: 40px;
        text-align: right;
    }

</style>
</head>

<body>

<!-- HEADER -->
<table class="header">
    <tr>
        <td>
            <div class="logo">EasyShop</div>
        </td>
        <td class="right">
            EasyShop Head Office <br>
            Email: support@easylearningbd.com <br>
            Mobile: 1245454545 <br>
            Dhaka 1207, Dhanmondi #4
        </td>
    </tr>
</table>

<!-- CUSTOMER + INVOICE -->
<table class="section">
    <tr>
        <td>
            <strong>Customer:</strong> {{ $order->customer->name }} <br>
            <strong>Email:</strong> {{ $order->customer->email }} <br>
            <strong>Phone:</strong> {{ $order->customer->phone }} <br>
            <strong>Address:</strong> {{ $order->customer->address }} <br>
            <strong>Shop:</strong> {{ $order->customer->shopname }}
        </td>

        <td class="right">
            <h3 style="color:green;">Invoice #{{ $order->invoice_no }}</h3>
            Date: {{ $order->order_date }} <br>
            Status: {{ $order->order_status }} <br>
            Payment: {{ $order->payment_status }} <br>
            Paid: ${{ $order->pay }} <br>
            Due: ${{ $order->due }}
        </td>
    </tr>
</table>

<br>

<h3>Products</h3>

<!-- PRODUCT TABLE -->
<table class="products">
    <thead>
        <tr>
            <th>Image</th>
            <th>Product Name</th>
            <th>Code</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
    </thead>

    <tbody>
        @foreach($orderItem as $item)
        <tr>
            <td>
                <img src="{{ public_path($item->product->product_image) }}"
                     width="50" height="50">
            </td>

            <td>{{ $item->product->product_name }}</td>
            <td>{{ $item->product->product_code }}</td>
            <td>{{ $item->quantity }}</td>
            <td>${{ $item->product->selling_price }}</td>
            <td>${{ $item->total }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- TOTAL -->
<div class="total">
    <h3>Subtotal: ${{ $order->sub_total ?? $order->total }}</h3>
    <h3>Total: ${{ $order->total }}</h3>
</div>

<!-- THANK YOU -->
<div class="thanks">
    <strong>Thanks For Buying Products!</strong>
</div>

<!-- SIGNATURE -->
<div class="signature">
    -------------------------- <br>
    Authority Signature
</div>

</body>
</html>