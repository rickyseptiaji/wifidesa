<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            width: 100px;
        }
        .header h1 {
            font-size: 24px;
            margin: 0;
        }
        .header h2 {
            font-size: 20px;
            margin: 5px 0;
        }
        .details {
            width: 100%;
            margin-bottom: 20px;
        }
        .details td {
            padding: 5px;
        }
        .details th {
            text-align: left;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table, .table th, .table td {
            border: 1px solid black;
        }
        .table th, .table td {
            padding: 10px;
            text-align: left;
        }
        .total {
            text-align: right;
            margin-right: 20px;
            font-size: 16px;
        }
        .notes {
            margin-top: 30px;
            font-size: 12px;
        }
        .notes p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('images/image.png') }}" class="logo" alt="Logo">
        <h1>Badan Usaha Milik Desa Pema Bersama</h1>
        <h2>INVOICE</h2>
    </div>

    <table class="details">
        <tr>
            <th>Kepada Yth:</th>
            <td>{{ $bill->client->nama }}</td>
            <th>No. Register:</th>
            <td>{{ $bill->id }}</td>
        </tr>
        <tr>
            <th>Alamat:</th>
            <td>{{ $bill->client->alamat }}</td>
            <th>No. Invoice:</th>
            <td>{{$client->id}}/PEMA/{{$tahun}}</td>
        </tr>
        <tr>
            <th>No. HP:</th>
            <td>{{ $bill->client->telp }}</td>
            <th>Tanggal:</th>
            <td>{{$tanggal}}</td>
        </tr>
    </table>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Tagihan</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalTagihan = 0; // Inisialisasi total tagihan
            @endphp
            @foreach ($unpaidBills as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->tgl_tagihan }}</td>
                <td>Rp {{ number_format($bill->client->tarif, 0, ',', '.') }}</td> <!-- Gantilah 'jumlah' dengan atribut yang sesuai -->
                @php
                    $totalTagihan += $bill->client->tarif; // Tambahkan jumlah ke total
                @endphp
            </tr>
            @endforeach
            <tr>
                <th>Total Tagihan:</th>
                <td colspan="2">Rp {{ number_format($totalTarif, 0, ',', '.') }}</td> <!-- Menampilkan total tagihan -->
            </tr>
        </tbody>
    </table>
    
</body>
</html>
