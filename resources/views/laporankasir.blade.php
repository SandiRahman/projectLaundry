@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Laporan Kasir') }}</div>

                <div class="card-body">
                    @if(session('transaksi'))
                        <table class="table table-bordered">
                            <tr>
                                <td>{{ session('transaksi.id_outlet') }}</td>
                                <td>{{ session('transaksi.id_pelanggan') }}</td>
                                <td>{{ session('transaksi.id_paket') }}</td>
                                <td>{{ session('transaksi.tgl') }}</td>
                                <td>{{ session('transaksi.batas_waktu') }}</td>
                                <td>{{ session('transaksi.diskon') }}%</td>
                                <td>Rp. {{ session('transaksi.pajak') }}</td>
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
