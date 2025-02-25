@extends('layouts.app')

@section('content')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #1e3a8a, #2563eb, #60a5fa);
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .card {
    width: 100%;
    max-width: 900px;
    background: white;
    border-radius: 20px;
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
    padding: 50px;
    display: flex;
    flex-direction: column;
    align-items: center;

    }
    .card-body {
    width: 100%;
    max-width: 600px;
}

    .card-header {
        font-size: 32px;
        font-weight: bold;
        color: #1e40af;
        text-align: center;
        margin-bottom: 35px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        font-weight: 600;
        color: #444;
        font-size: 18px;
        display: block;
        margin-bottom: 8px;
    }

    .form-control {
        width: 100%;
        padding: 16px;
        border: 1px solid #ccc;
        border-radius: 12px;
        font-size: 17px;
    }

    .form-control:focus {
        border-color: #2563eb;
        outline: none;
    }

    .btn-primary {
        background: linear-gradient(135deg, #2563eb, #1e40af);
        color: white;
        border: none;
        padding: 16px;
        width: 100%;
        font-size: 17px;
        font-weight: bold;
        border-radius: 12px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #1e40af, #2563eb);
    }
</style>

<div class="card">
    <div class="card-header">{{ __('Entry Transaksi') }}</div>
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
                <select id="id_paket" name="id_paket" class="form-control" required onchange="setPaketData()">
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
                <label for="harga" class="form-label">Harga</label>
                <input type="number" id="harga" name="harga" class="form-control" readonly>
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

            <button type="submit" class="btn-primary">Simpan</button>
        </form>
    </div>
</div>

<script>
function setPaketData() {
    const paketSelect = document.getElementById('id_paket');
    const harga = paketSelect.options[paketSelect.selectedIndex].getAttribute('data-harga');
    const pajakField = document.getElementById('pajak');
    const hargaField = document.getElementById('harga');

    if (harga) {
        const pajak = harga * 0.08;
        pajakField.value = pajak.toFixed(2);
        hargaField.value = harga;
    } else {
        pajakField.value = '';
        hargaField.value = '';
    }
}
</script>

@endsection