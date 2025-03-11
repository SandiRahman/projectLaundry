<!DOCTYPE html>
<html>
<head>
    <title>Struk Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .struk {
            width: 250px;
            margin: auto;
            padding: 10px;
            border: 1px dashed black;
        }
        table {
            width: 100%;
            font-size: 14px;
        }
        td {
            text-align: left;
        }
        .total {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="struk">
        <h3>Struk Transaksi</h3>
        <hr>
        <table>
            <tr>
                <td>Outlet</td>
                <td>: {{ $transaksi['id_outlet'] }}</td>
            </tr>
            <tr>
                <td>Paket</td>
                <td>: {{ $transaksi['id_pelanggan'] }}</td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>: {{ $transaksi['tgl'] }}</td>
            </tr>
            <tr>
                <td>Batas Waktu</td>
                <td>: {{ $transaksi['batas_waktu'] }}</td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>: Rp. {{ number_format($transaksi['harga'], 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Diskon</td>
                <td>: {{ $transaksi['diskon'] }}%</td>
            </tr>
            <tr>
                <td>Pajak</td>
                <td>: Rp. {{ number_format($transaksi['pajak'], 0, ',', '.') }}</td>
            </tr>
            <tr class="total">
                <td>Total</td>
                <td>: Rp. {{ $totalHarga }}</td>
            </tr>
        </table>
        <hr>
        <p>Terima kasih atas kunjungan Anda!</p>
    </div>
</body>
</html>
