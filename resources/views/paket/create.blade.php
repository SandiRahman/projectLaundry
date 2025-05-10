@extends('layouts.app')


<style>
    /* Styling untuk container utama */
    .container {
        margin-top: 20px;
    }

    /* Styling untuk card */
    .card {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        font-size: 18px;
        font-weight: bold;
        background-color: #007bff;
        color: white;
        text-align: center;
        border-radius: 10px 10px 0 0;
    }

    /* Styling untuk input form */
    .form-control {
        border-radius: 5px;
        padding: 10px;
        font-size: 16px;
    }

    /* Styling untuk select dropdown */
    select.form-control {
        cursor: pointer;
    }

    /* Styling untuk tombol */
    .btn-primary {
        background-color: #007bff;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        transition: background 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-secondary {
        background-color: #6c757d;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        transition: background 0.3s ease;
    }

    .btn-secondary:hover {
        background-color: #545b62;
    }

    /* Styling untuk pesan sukses dan error */
    .alert {
        border-radius: 5px;
        padding: 10px;
        font-size: 14px;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border-color: #c3e6cb;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border-color: #f5c6cb;
    }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Paket Cucian') }}</div>

                <div class="card-body">
                    <!-- Pesan Sukses -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Pesan Error -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Form Tambah Paket -->
                    <form method="POST" action="{{ route('paket.store') }}">
                        @csrf

                        <!-- ID Outlet -->
                        <div class="mb-3">
                            <label for="id_outlet" class="col-form-label text-md-end">{{ __('Outlet') }}</label>
                            <select id="id_outlet" class="form-control @error('id_outlet') is-invalid @enderror" name="id_outlet" required>
                                <option value="" disabled selected>Pilih Outlet</option>
                                @foreach($outlets as $outlet)
                                    <option value="{{ $outlet->id }}">{{ $outlet->nama }}</option>
                                @endforeach
                            </select>
                            @error('id_outlet')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Jenis Paket -->
                        <div class="mb-3">
                            <label for="jenis" class="col-form-label text-md-end">{{ __('Jenis') }}</label>
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

                        <!-- Nama Paket -->
                        <div class="mb-3">
                            <label for="nama_paket" class="col-form-label text-md-end">{{ __('Nama Paket') }}</label>
                            <input id="nama_paket" type="text" class="form-control @error('nama_paket') is-invalid @enderror" name="nama_paket" value="{{ old('nama_paket') }}" required>
                            @error('nama_paket')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Jumlah -->
                        <div class="mb-3">
                            <label for="jumlah" class="col-form-label text-md-end">{{ __('Jumlah') }}</label>
                            <input id="jumlah" type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" value="{{ old('jumlah') }}" required>
                            @error('jumlah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Harga -->
                        <div class="mb-3">
                            <label for="harga" class="col-form-label text-md-end">{{ __('Harga') }}</label>
                            <input id="harga" type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') }}" required readonly>
                            @error('harga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Tombol Submit dan Kembali -->
                        <div class="mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Simpan Paket') }}
                                </button>
                                <a href="{{ route('paket.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script untuk Menghitung Harga Otomatis -->
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

        // Hitung harga saat halaman pertama kali dimuat
        updateHarga();
    });
</script>
@endsection