<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kwitansi</title>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.receipt-container {
    padding: 20px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    border: 1px solid #ccc;
    position: relative;
}

.header {
    text-align: center;
    border-bottom: 1px solid #000;
    padding-bottom: 10px;
}

.logo {
    width: 100px;
    height: auto;
}

.title h1 {
    font-size: 24px;
    letter-spacing: 2px;
}

.title p {
    font-size: 16px;
}

.details {
    margin-top: 20px;
}

.flex-row {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    gap: 2px
}

.flex-col {
    display: flex;
    flex-direction: column;
}

.amount {
    margin: 20px 0;
}

.amount p {
    font-size: 18px;
}

.rupiah {
    font-size: 24px;
    font-weight: bold;
    border: 1px solid #000;
    display: inline-block;
    padding: 5px 10px;
    margin-top: 10px;
}

.description {
    margin: 20px 0;
}

.footer {
    text-align: right;
    margin-top: 40px;
}

.stamp {
    width: 80px;
}

    </style>
</head>
<body>
    <div class="receipt-container">
        <div class="header">
            <img src="{{ public_path('images/image.png') }}" alt="Logo" class="logo">
            <div class="title">
                <h1>KWITANSI</h1>
                <p>{{$client->id}}/PEMA/{{$tahun}}</p>
            </div>
        </div>

        <div class="details">
            <div class="flex-row">
                <p><strong>Sudah Terima Dari:</strong></p>
                <div class="flex-col">
                    <p>{{$bill->client->nama}}</p>
                    <p>{{$bill->client->alamat}}</p>
                    <p>{{$bill->client->telp}}</p>
                </div>
            </div>
        </div>

        <div class="amount">
            <p><strong>Banyaknya Uang:</strong></p>
            <p class="rupiah">Rp <span>{{ number_format($bill->client->tarif, 0, ',', '.') }}</span></p>
        </div>

        <div class="description">
            <p><strong>Untuk Pembayar:</strong></p>
            <p>Pembayaran Internet Bulan September 2024<br>(Periode Pemakaian Internet Bulan Agustus 2024)</p>
        </div>

        <div class="footer">
            <p>Tigaraksa, September 2024</p>
            <img src="{{ public_path('images/pema.png') }}" alt="PemaNet" class="stamp">
        </div>
    </div>
</body>
</html>
