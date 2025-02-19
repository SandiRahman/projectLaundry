@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Transaksi') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('transaksi.store') }}">
                        @csrf

                        {{-- Outlet --}}
                        <div class="mb-3">
                            <label for="id_outlet" class="form-label">Outlet</label>
                            <select id="id_outlet" name="id_outlet" class="form-control" required>
                                <option value="" disabled selected>Pilih Outlet</option>
                                @foreach($outlet as $outlet)
                                    <option value="{{ $outlet->id }}">{{ $outlet->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Pelanggan --}}
                        <div class="mb-3">
                            <label for="id_pelanggan" class="form-label">Pelanggan</label>
                            <select id="id_pelanggan" name="id_pelanggan" class="form-control" required>
                                <option value="" disabled selected>Pilih Pelanggan</option>
                                @foreach($pelanggan as $pelanggan)
                                    <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Paket --}}
                        <div class="mb-3">
                            <label for="id_paket" class="form-label">Paket</label>
                            <select id="id_paket" name="id_paket" class="form-control" required>
                                <option value="" disabled selected>Pilih Paket</option>
                                @foreach($paket as $paket)
                                    <option value="{{ $paket->id }}">{{ $paket->nama_paket }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Tanggal Transaksi --}}
                        <div class="mb-3">
                            <label for="tgl" class="form-label">Tanggal Transaksi</label>
                            <input type="datetime-local" id="tgl" name="tgl" class="form-control" required>
                        </div>

                        {{-- Batas Waktu --}}
                        <div class="mb-3">
                            <label for="batas_waktu" class="form-label">Batas Waktu</label>
                            <input type="datetime-local" id="batas_waktu" name="batas_waktu" class="form-control" required>
                        </div>

                        {{-- Diskon --}}
                        <div class="mb-3">
                            <label for="diskon" class="form-label">Diskon</label>
                            <input type="number" id="diskon" name="diskon" class="form-control" step="0.01">
                        </div>

                        {{-- Pajak --}}
                        <div class="mb-3">
                            <label for="pajak" class="form-label">Pajak</label>
                            <input type="number" id="pajak" name="pajak" class="form-control">
                        </div>

                        {{-- Status --}}
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" name="status" class="form-control" required>
                                <option value="baru">Baru</option>
                                <option value="proses">Proses</option>
                                <option value="diantar">Diantar</option>
                                <option value="selesai">Selesai</option>
                            </select>
                        </div>

                        {{-- Pembayaran --}}
                        <div class="mb-3">
                            <label for="pembayaran" class="form-label">Pembayaran</label>
                            <select id="pembayaran" name="pembayaran" class="form-control" required>
                                <option value="belum_dibayar">Belum Dibayar</option>
                                <option value="sudah_dibayar">Sudah Dibayar</option>
                            </select>
                        </div>

                        {{-- Tombol Submit --}}
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
