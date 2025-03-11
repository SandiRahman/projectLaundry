@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Laporan Kasir') }}</div>

                <div class="card-body">
                    @if(session('transaksi_data'))
                        <table class="table table-bordered">
                            <tr>
                                <td>Outlet</td>
                                <td>: {{ session('transaksi_data.id_outlet') }}</td>
                            </tr>
                            <tr>
                                <td>Paket</td>
                                <td>: {{ session('transaksi_data.id_pelanggan') }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Transaksi</td>
                                <td>: {{ session('transaksi_data.id_paket') }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Transaksi</td>
                                <td>: {{ session('transaksi_data.tgl') }}</td>
                            </tr>
                            <tr>
                                <td>Batas Waktu</td>
                                <td>: {{ session('transaksi_data.batas_waktu') }}</td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td>: {{ session('transaksi_data.harga') ?? 'Data tidak tersedia' }}</td>
                            </tr>
                            <tr>
                                <td>Diskon</td>
                                <td>: {{ session('transaksi_data.diskon') }}%</td>
                            </tr>
                            <tr>
                                <td>Pajak</td>
                                <td>: Rp. {{ session('transaksi_data.pajak') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Total Harga</strong></td>
                                <td>:
                                    @php
                                        $harga = session('transaksi_data.harga') ?? 0;
                                        $diskon = session('transaksi_data.diskon') ?? 0;
                                        $pajak = session('transaksi_data.pajak') ?? 0;
                                        $totalHarga = ($harga - ($harga * $diskon / 100)) + $pajak;
                                    @endphp
                                    <strong>Rp. {{ number_format($totalHarga, 0, ',', '.') }}</strong>
                                </td>
                            </tr>
                            <a href="{{ route('laporan.download') }}" class="btn btn-danger">Download PDF</a>

                        </table>
                    @else
                        <p>Belum ada data transaksi.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection