<h1>Thank you for your order, {{ $checkout->first_name }}!</h1>
<p>Your order details:</p>
<p>Email: {{ $checkout->email }}</p>
<p>Address: {{ $checkout->address }}, {{ $checkout->city }}, {{ $checkout->postal_code }}</p>
<p>Phone: {{ $checkout->phone }}</p>
<p>Order Notes: {{ $checkout->order_notes }}</p>
