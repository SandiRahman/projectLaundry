@extends('layouts.app')

@section('content')
<style>
/* Global Styles */
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f4f6f9;
    color: #333;
}

/* Container */
.container {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

/* Header */
h1 {
    color: #333;
    font-weight: 600;
}

/* Button Styling */
.btn {
    border-radius: 5px;
    padding: 8px 16px;
    font-size: 14px;
}

.btn-primary {
    background-color: #0d6efd; /* Biru lebih netral */
    border-color: #0d6efd;
}

.btn-primary:hover {
    background-color: #025ce2;
    border-color: #025ce2;
}

.btn-warning {
    background-color: #ffc107;
    border-color: #ffc107;
    color: #333;
}

.btn-warning:hover {
    background-color: #e0a800;
    border-color: #d39e00;
}

.btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
}

.btn-danger:hover {
    background-color: #c82333;
    border-color: #bd2130;
}

/* Table Styling */
.table-responsive {
    overflow-x: auto;
}

.table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    border-radius: 8px;
    overflow: hidden;
}

.table th {
    background-color: #6A4ACB; /* Warna biru yang lebih netral */
    color: white;
    padding: 12px;
    text-align: left;
}

.table td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

.table-striped tbody tr:nth-of-type(odd) {
    background-color: #f2f2f2;
}

/* Alert Messages */
.alert {
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 15px;
}

.alert-success {
    background-color: #6A4ACB;
    color: white;
}

.alert-danger {
    background-color: #6A4ACB;
    color: white;
}
</style>

<div class="container">
    <h1 class="mb-4">Daftar Paket Cucian</h1>

    <!-- Tombol Tambah Paket -->
    <a href="{{ route('paket.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Paket
    </a>
    <h1> </h1>
    <h1> </h1>

    <!-- Pesan Sukses -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel Daftar Paket -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Paket</th>
                    <th>Jenis</th>
                    <th>Outlet</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pakets as $paket)
                <tr>
                    <td>{{ $paket->id }}</td>
                    <td>{{ $paket->nama_paket }}</td>
                    <td>{{ ucfirst($paket->jenis) }}</td>
                    <td>{{ $paket->outlet->nama }}</td>
                    <td>{{ $paket->jumlah }}</td>
                    <td>Rp {{ number_format($paket->harga, 2) }}</td>
                    <td>
                        <a href="{{ route('paket.edit', $paket->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('paket.destroy', $paket->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus paket ini?')">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
