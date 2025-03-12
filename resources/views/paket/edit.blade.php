@extends('layouts.admin')

@section('content')
    <h1>Edit Paket</h1>

    <form action="{{ route('paket.update', $paket->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_outlet">Outlet</label>
            <select name="id_outlet" class="form-control" required>
                @foreach($outlets as $outlet)
                    <option value="{{ $outlet->id }}" {{ $outlet->id == $paket->id_outlet ? 'selected' : '' }}>
                        {{ $outlet->nama_outlet }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="jenis">Jenis</label>
            <input type="text" name="jenis" class="form-control" value="{{ $paket->jenis }}" required>
        </div>

        <div class="form-group">
            <label for="nama_paket">Nama Paket</label>
            <input type="text" name="nama_paket" class="form-control" value="{{ $paket->nama_paket }}" required>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="{{ $paket->jumlah }}" required>
        </div>

        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ $paket->harga }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
