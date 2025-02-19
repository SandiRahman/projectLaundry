<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4">Data Transaksi</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Outlet</th>
                    <th>Kode Invoice</th>
                    <th>Pelanggan</th>
                    <th>Paket</th>
                    <th>Tanggal</th>
                    <th>Batas Waktu</th>
                    <th>Tgl Bayar</th>
                    <th>Diskon</th>
                    <th>Pajak</th>
                    <th>Status</th>
                    <th>Pembayaran</th>
                    <th>User</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $t)
                <tr>
                    <td>{{ $t->id_transaksi }}</td>
                    <td>{{ $t->outlet->nama ?? 'Tidak ada data' }}</td>
                    <td>{{ $t->kode_invoice }}</td>
                    <td>{{ $t->pelanggan->nama ?? 'Tidak ada data' }}</td>
                    <td>{{ $t->id_paket }}</td>
                    <td>{{ $t->tgl }}</td>
                    <td>{{ $t->batas_waktu }}</td>
                    <td>{{ $t->tgl_bayar }}</td>
                    <td>{{ $t->diskon }}</td>
                    <td>{{ $t->pajak }}</td>
                    <td>{{ ucfirst($t->status) }}</td>
                    <td>{{ ucfirst($t->pembayaran) }}</td>
                    <td>{{ $t->user->name ?? 'Tidak ada data' }}</td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>
</body>
</html>
