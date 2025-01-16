<!DOCTYPE html>
<html>
<head>
    <title>Orders Report</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
        .text-right { text-align: right; }
        .total { font-weight: bold; background-color: #f9f9f9; }
    </style>
</head>
<body>
    <h2>Orders Report</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Email</th>
                <th>Customer Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Status</th>
                <th>Total Price (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->status }}</td>
                    <td class="text-right">{{ number_format($order->totalPrice, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
