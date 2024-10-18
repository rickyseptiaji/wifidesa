<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 100%; }
        .header { text-align: center; margin-bottom: 20px; }
        .header img {
            width: 100px;
        }
        .header img { max-width: 150px; }
        .title { text-align: center; font-size: 24px; font-weight: bold; margin-top: 10px; }
        .details {
            width: 100%;
            margin-top: 20px;
        }
        .details td {
            padding: 5px;
        }
        .details th {
            text-align: left;
        }
        .invoice-table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .invoice-table th, .invoice-table td { border: 1px solid #000; padding: 10px; text-align: left; }
        .total { font-weight: bold; }
        .notes { margin-top: 30px; }
        .notes p { margin: 0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ public_path('images/image.png') }}" alt="Logo">
            <h1>BADAN USAHA MILIK DESA</h1>
            <h2>PEMA BERSAMA</h2>
            <p>Jl. Puri Permai 2 Blok B1 No.1A RT.007 RW.006, Pete - Tigaraksa - Tangerang</p>
        </div>
        <div class="title">INVOICE</div>

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
                <td>{{$client->id}}/PEMA/{{\Carbon\Carbon::now()->format('Y')}}</td>
            </tr>
            <tr>
                <th>No. HP:</th>
                <td>{{ $bill->client->telp }}</td>
                <th>Tanggal:</th>
                <td>{{\Carbon\Carbon::now()->format('d-m-y')}}</td>
            </tr>
        </table>

        <table class="invoice-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Keterangan</th>
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
                    <td>Tagihan bulan {{ \Carbon\Carbon::parse($item->tgl_tagihan)->format('F Y') }}</td>
                    <td>Rp {{ number_format($bill->client->tarif, 0, ',', '.') }}</td> <!-- Gantilah 'jumlah' dengan atribut yang sesuai -->
                    @php
                        $totalTagihan += $bill->client->tarif; // Tambahkan jumlah ke total
                    @endphp
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" class="total">TOTAL TAGIHAN</td>
                    <td>Rp {{ number_format($totalTarif, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>

        <div class="notes">
            <p><strong>Catatan:</strong></p>
            <p>A. Pembayaran selambat-lambatnya tgl <strong>25 {{\Carbon\Carbon::parse($curentTagihan[0]->tgl_tagihan)->format('F Y')}}</strong></p>
            <p>B. Pembayaran dapat dilakukan melalui Transfer Rekening:</p>
            <ul>
                <li>BANK CENTRAL ASIA (BCA) - 7111798501 - Mimim Aminah</li>
                <li>BANK RAKYAT INDONESIA (BRI) - 3850-01-070782-53-1 - Mimim Aminah</li>
            </ul>
            <p>C. Pembayaran Cash/Tunai dilakukan di Kantor Pema.Net</p>
            <p>D. Untuk keterangan lebih lanjut, hubungi Customer Service di Phone/WA: 0813 8537 9602</p>
        </div>
    </div>
</body>
</html>
