<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .invoice {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .invoice-header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        .invoice-body {
            padding: 20px;
        }
        .invoice-body p {
            margin: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .invoice-footer {
            text-align: center;
            padding: 10px;
            background-color: #333;
            color: #fff;
        }
        .total {
            text-align: right;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="invoice">
        <div class="invoice-header">
            <h1>Digital Printing</h1>
        </div>
        <div class="invoice-body">
            <p><strong>Nomor Invoice:</strong> {{ $invoice['id'] }}</p>
            <p><strong>Tanggal:</strong> {{ $invoice['created'] }}</p>
            <p><strong>Pelanggan:</strong>{{ $invoice['customer']['given_names'] }}</p>
            <p><strong>No Hp:</strong>{{ $invoice['customer']['mobile_number'] }}</p>
            <p><strong>Status:</strong>{{ $invoice['status'] }}</p>
            <table>
                <tr>
                    <th>Deskripsi</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total</th>
                </tr>
                <tr>
                    <td>{{ $invoice['items'][0]['name'] }}</td>
                    <td>{{ $invoice['items'][0]['quantity'] }}</td>
                    <td>{{ $invoice['items'][0]['price'] }}</td>
                    <td>{{ $invoice['amount'] }}</td>
                </tr>
            </table>
            <p class="total"><strong>Total:</strong> {{ $invoice['amount'] }}</p>
        </div>
        <div class="invoice-footer">
            Terima kasih telah berbelanja di toko kami!
        </div>
    </div>
</body>
</html>
