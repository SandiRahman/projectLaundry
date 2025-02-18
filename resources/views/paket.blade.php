@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Entry Register') }}</div>
                <a href="{{ route('registrasi') }}">Logout</a>
                <h1>{{ session('pelanggan')->nama }}</h1>

                <div class="card-body">
                    <form method="POST" action="{{ route('paket.store') }}">
                        @csrf

                        {{-- ID Outlet --}}
                        <div class="row mb-3">
                            <label for="id_outlet" class="col-md-4 col-form-label text-md-end">{{ __('Outlet') }}</label>
                            <div class="col-md-6">
                                <select id="id_outlet" class="form-control @error('id_outlet') is-invalid @enderror" name="id_outlet" required>
                                    <option value="" disabled selected>Pilih Outlet</option>
                                    @foreach($outlet as $outlet)
                                        <option value="{{ $outlet->id }}">{{ $outlet->nama }}</option>
                                    @endforeach
                                </select>

                                @error('id_outlet')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Jenis --}}
                        <div class="row mb-3">
                            <label for="jenis" class="col-md-4 col-form-label text-md-end">{{ __('Jenis') }}</label>
                            <div class="col-md-6">
                                <select id="jenis" class="form-control @error('jenis') is-invalid @enderror" name="jenis" required>
                                    <option value="kiloan">Kiloan</option>
                                    <option value="selimut">Selimut</option>
                                    <option value="bed_cover">Bed Cover</option>y
                                </select>

                                @error('jenis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Nama Paket --}}
                        <div class="row mb-3">
                            <label for="nama_paket" class="col-md-4 col-form-label text-md-end">{{ __('Nama Paket') }}</label>
                            <div class="col-md-6">
                                <input id="nama_paket" type="text" class="form-control @error('nama_paket') is-invalid @enderror" name="nama_paket" value="{{ old('nama_paket') }}" required>

                                @error('nama_paket')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Jumlah --}}
                        <div class="row mb-3">
                            <label for="jumlah" class="col-md-4 col-form-label text-md-end">{{ __('Jumlah') }}</label>
                            <div class="col-md-6">
                                <input id="jumlah" type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" value="{{ old('jumlah') }}" required>

                                @error('jumlah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Harga --}}
                        <div class="row mb-3">
                            <label for="harga" class="col-md-4 col-form-label text-md-end">{{ __('Harga') }}</label>
                            <div class="col-md-6">
                                <input id="harga" type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') }}" required readonly>

                                @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Tombol Submit --}}
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Simpan Paket') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Script untuk menghitung harga otomatis --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const jenisElement = document.getElementById("jenis");
        const jumlahElement = document.getElementById("jumlah");
        const hargaElement = document.getElementById("harga");

        // Harga per jenis (bisa disesuaikan sesuai kebutuhan)
        const hargaPerJenis = {
            kiloan: 6000,
            selimut: 16000,
            bed_cover: 15000,
        };

        function updateHarga() {
            const jenis = jenisElement.value;
            const jumlah = parseInt(jumlahElement.value) || 0;
            const hargaSatuan = hargaPerJenis[jenis] || 0;
            hargaElement.value = jumlah * hargaSatuan;
        }

        jenisElement.addEventListener("change", updateHarga);
        jumlahElement.addEventListener("input", updateHarga);
    });
</script>
@endsection
