<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
</head>
<body>
    <h1>Thank you for your order, {{ $checkout->first_name }} {{ $checkout->last_name }}</h1>

    <h2>Order Details:</h2>
    <ul>
        @foreach ($checkoutItems as $item)
            <li>
                <strong>{{ $item['name'] }}</strong><br>
                Price: {{ $item['price'] }}<br>
                Delivery Date: {{ $item['delivery_date'] }}<br>
                Message: {{ $item['message'] ?? 'No message' }}
            </li>
        @endforeach
    </ul>

    <p>Please send your proof of payment and we will processed your order shortly</p>
    <p>Thank you for place your order with us!</p>
</body>
</html>
