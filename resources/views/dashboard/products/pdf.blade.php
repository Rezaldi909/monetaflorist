<!DOCTYPE html>
<html>
<head>
    <title>Products Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Products Report</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Tipe Bunga</th>
                <th>Tipe Produk</th>
                <th>Event</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <img src="{{ public_path('storage/' . $product->image) }}" style="height: 50px; width: 50px;" alt="Foto Produk">
                </td>
                <td>{{ $product->nama }}</td>
                <td>{{ number_format($product->harga, 0, ',', '.') }}</td>
                <td>{{ $product->flowerType->nama }}</td>
                <td>{{ $product->productType->nama }}</td>
                <td>{{ $product->event->nama }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
