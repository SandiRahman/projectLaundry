@extends('layouts.app')

@section('content')
<a href="{{ route('laporankasir.pdf') }}" class="btn btn-danger">Download PDF</a>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Laporan Kasir') }}</div>

                <div class="card-body">
                    @if(session('transaksi'))
                        <table class="table table-bordered">
                            <tr>
                                <td>Outlet</td>
                                <td>: {{ session('transaksi.id_outlet') }}</td>
                            </tr>
                            <tr>
                                <td>Paket</td>
                                <td>: {{ session('transaksi.id_pelanggan') }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Transaksi</td>
                                <td>: {{ session('transaksi.id_paket') }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Transaksi</td>
                                <td>: {{ session('transaksi.tgl') }}</td>
                            </tr>
                            <tr>
                                <td>Batas Waktu</td>
                                <td>: {{ session('transaksi.batas_waktu') }}</td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td>: {{ session('transaksi_data.harga') ?? 'Data tidak tersedia' }}</td>
                            </tr>
                            <tr>
                                <td>Diskon</td>
                                <td>: {{ session('transaksi.diskon') }}%</td>
                            </tr>
                            <tr>
                                <td>Pajak</td>
                                <td>: Rp. {{ session('transaksi.pajak') }}</td>
                            </tr>

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
