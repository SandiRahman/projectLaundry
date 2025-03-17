@extends('layouts.app')

@section('content')
    <h1>Edit Paket</h1>

    <form action="{{ route('paket.update', $paket->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_outlet">Outlet</label>
            <select id="id_outlet" class="form-control @error('id_outlet') is-invalid @enderror" name="id_outlet" required>
                                    <option value="" disabled selected>Pilih Outlet</option>
                                    @foreach($outlets as $outlet)
                                        <option value="{{ $outlet->id }}">{{ $outlet->nama }}</option>
                                    @endforeach
                                </select>
        </div>

        <div class="form-group">
        <label for="jenis" class="col-md-4 col-form-label text-md-end">{{ __('Jenis') }}</label>
        <select id="jenis" class="form-control @error('jenis') is-invalid @enderror" name="jenis" required>
            <option value="kiloan">Kiloan</option>
            <option value="selimut">Selimut</option>
            <option value="bed_cover">Bed Cover</option>
        </select>
        </div>

        <div class="form-group">
            <label for="nama_paket">Nama Paket</label>
            <input type="text" name="nama_paket" class="form-control" value="{{ $paket->nama_paket }}" required>
        </div>

        <div class="form-group">
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

        <div class="form-group">
        <label for="harga" class="col-md-4 col-form-label text-md-end">{{ __('Harga') }}</label>
                            <div class="col-md-6">
                                <input id="harga" type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') }}" required readonly>

                                @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>

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
