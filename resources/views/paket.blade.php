@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Entry Register') }}</div>
                <a href="{{ route('register') }}" class="btn btn-danger">Logout</a>

                <div class="card-body">
                    <form method="POST" action="{{ route('paket.store') }}">
                        @csrf

                        {{-- ID Outlet --}}
                        <div class="mb-3">
                            <label for="id_outlet" class="form-label">{{ __('Outlet') }}</label>
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

                        {{-- Jenis --}}
                        <div class="mb-3">
                            <label for="jenis" class="form-label">{{ __('Jenis') }}</label>
                            <select id="jenis" class="form-control @error('jenis') is-invalid @enderror" name="jenis" required>
                                <option value="kiloan">Kiloan</option>
                                <option value="selimut">Selimut</option>
                                <option value="bed_cover">Bed Cover</option>
                            </select>
                            @error('jenis')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Nama Paket --}}
                        <div class="mb-3">
                            <label for="nama_paket" class="form-label">{{ __('Nama Paket') }}</label>
                            <input id="nama_paket" type="text" class="form-control @error('nama_paket') is-invalid @enderror" name="nama_paket" value="{{ old('nama_paket') }}" required>
                            @error('nama_paket')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Jumlah --}}
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">{{ __('Jumlah') }}</label>
                            <input id="jumlah" type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" value="{{ old('jumlah') }}" required>
                            @error('jumlah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Harga --}}
                        <div class="mb-3">
                            <label for="harga" class="form-label">{{ __('Harga') }}</label>
                            <input id="harga" type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') }}" required readonly>
                            @error('harga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Tombol Submit --}}
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Simpan Paket') }}
                            </button>
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

{{-- CSS tambahan --}}
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #7B61FF, #A385FF);
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .container {
        width: 100%;
        max-width: 600px;
        background: white;
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
        padding: 40px;
    }

    .card-header {
        font-size: 24px;
        font-weight: bold;
        color: #6A4ACB;
        text-align: center;
        margin-bottom: 20px;
    }

    .form-control {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 16px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #7B61FF, #6A4ACB);
        color: white;
        border: none;
        padding: 12px;
        font-size: 16px;
        font-weight: bold;
        border-radius: 8px;
        cursor: pointer;
        transition: background 0.3s ease;
    }
</style>
@endsection
