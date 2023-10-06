<!DOCTYPE html>
<html>
<head>
<style>
  /* Gaya untuk thead */
  thead {
    background-color: lightblue;
  }

  /* Gaya untuk sel-sel tabel */
  table {
    border-collapse: collapse;
    width: 100%;
  }

  th, td {
    border: 1px solid black;
    padding: 8px;
    text-align: left;
  }
</style>
</head>
<body>
<center>    
    <h2>Daftar Transaksi selama 30 Hari dari tanggal {{ $startDate }} - {{ $endDate }}</h2>
</center>
<table>
  <thead>
    <tr>
      <th>Tanggal</th>
      <th>ID</th>
      <th>Produk ID</th>
      <th>Nama Pemesan</th>
      <th>Jumlah barang</th>
      <th>Total Harga</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($transaksis as $transaksi)
    <tr>
      <td>{{ $transaksi->created_at }}</td>
      <td>{{ $transaksi->id_xendit }}</td>
      <td>{{ $transaksi->product_id }}</td>
      <td>{{ $transaksi->name }}</td>
      <td>{{ $transaksi->qty }}</td>
      <td>{{ $transaksi->harga_total }}</td>
      <td>{{ $transaksi->status }}</td>
    </tr>
    @endforeach
  
  </tbody>
</table>

</body>
</html>
