@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Daftar Outlet</h2>
                </div>

                                                                    <!-- Tombol Tambah Paket -->
    <a href="{{ route('outlet.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah outlet </a>

                <div class="card-body">
                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Table Container -->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($outlet as $outlet)
                                <tr>
                                    <td>{{ $outlet->id }}</td>
                                    <td>{{ $outlet->nama }}</td>
                                    <td>{{ $outlet->alamat }}</td>
                                    <td>{{ $outlet->tlp }}</td>
                                    <td>
                                        <!-- Edit Button -->
                                        <a href="{{ route('outlet.edit', $outlet->id) }}" class="btn btn-primary btn-sm">
                                            Edit
                                        </a>

                                        <!-- Delete Form -->
                                        <form action="{{ route('outlet.destroy', $outlet->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus outlet ini?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection