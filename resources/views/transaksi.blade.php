@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f0f8ff;
        font-family: 'Poppins', sans-serif;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .card {
        width: 100%;
        max-width: 700px;
        border-radius: 12px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        background: #ffffff;
        padding: 30px;
    }
    .card-header {
        background-color: #007bff;
        color: white;
        font-weight: bold;
        font-size: 22px;
        border-radius: 12px 12px 0 0;
        text-align: center;
        padding: 18px;
    }
    .form-group {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 12px;
    }
    .form-label {
        width: 40%;
        font-weight: 600;
        color: #333;
        font-size: 16px;
    }
    .form-control {
        width: 60%;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 16px;
        padding: 10px;
        transition: 0.3s;
    }
    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
    }
    .btn-primary {
        background-color: #007bff;
        border: none;
        padding: 14px;
        font-size: 18px;
        border-radius: 8px;
        width: 100%;
        transition: 0.3s;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        transform: scale(1.05);
    }
</style>

<div class="card">
    <div class="card-header">{{ __('Tambah Transaksi') }}</div>

    <div class="card-body">
        <form method="POST" action="{{ route('transaksi.store') }}">
            @csrf

            <div class="form-group">
                <label for="id_outlet" class="form-label">Outlet</label>
                <select id="id_outlet" class="form-control" name="id_outlet" required>
                    <option value="" disabled selected>Pilih Outlet</option>
                    @foreach($outlet as $outlet)
                        <option value="{{ $outlet->id }}">{{ $outlet->nama }}</option>
                    @endforeach                           
                </select>
            </div>

            <div class="form-group">
                <label for="id_pelanggan" class="form-label">Pelanggan</label>
                <select id="id_pelanggan" name="id_pelanggan" class="form-control" required>
                    <option value="" disabled selected>Pilih Pelanggan</option>
                    @foreach($pelanggan as $pelanggan)
                        <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="id_paket" class="form-label">Paket</label>
                <select id="id_paket" name="id_paket" class="form-control" required onchange="hitungPajak()">
                    <option value="" disabled selected>Pilih Paket</option>
                    @foreach($paket as $paket)
                        <option value="{{ $paket->id }}" data-harga="{{ $paket->harga }}">{{ $paket->nama_paket }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tgl" class="form-label">Tanggal Transaksi</label>
                <input type="datetime-local" id="tgl" name="tgl" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="batas_waktu" class="form-label">Batas Waktu</label>
                <input type="datetime-local" id="batas_waktu" name="batas_waktu" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="diskon" class="form-label">Diskon</label>
                <input type="number" id="diskon" name="diskon" class="form-control" step="0.01">
            </div>

            <div class="form-group">
                <label for="pajak" class="form-label">Pajak (8%)</label>
                <input type="number" id="pajak" name="pajak" class="form-control" readonly>
            </div>

            <div class="form-group">
                <label for="status" class="form-label">Status</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="baru">Baru</option>
                    <option value="proses">Proses</option>
                    <option value="diantar">Diantar</option>
                    <option value="selesai">Selesai</option>
                </select>
            </div>

            <div class="form-group">
                <label for="pembayaran" class="form-label">Pembayaran</label>
                <select id="pembayaran" name="pembayaran" class="form-control" required>
                    <option value="belum_dibayar">Belum Dibayar</option>
                    <option value="sudah_dibayar">Sudah Dibayar</option>
                </select>
            </div>

            <div class="form-group">
                <label for="id_user" class="form-label">User</label>
                <select id="id_user" name="id_user" class="form-control" required>
                    <option value="" disabled selected>Pilih User</option>
                    @foreach($user as $user)
                        <option value="{{ $user->id }}">{{ $user->nama }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<script>
function hitungPajak() {
    const paketSelect = document.getElementById('id_paket');
    const harga = paketSelect.options[paketSelect.selectedIndex].getAttribute('data-harga');
    const pajakField = document.getElementById('pajak');

    if (harga) {
        const pajak = harga * 0.08;
        pajakField.value = pajak.toFixed(2);
    } else {
        pajakField.value = '';
    }
}
</script>

@endsection
