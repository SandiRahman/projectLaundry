 <h2>Manajemen Outlet</h2>

    <!-- Notifikasi -->
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <!-- Form Tambah Outlet -->
    <h3>Tambah Outlet</h3>
    <form action="{{ route('outlet.store') }}" method="POST">
        @csrf
        <label>Nama:</label>
        <input type="text" name="nama" required>
        
        <label>Alamat:</label>
        <textarea name="alamat" required></textarea>
        
        <label>Telepon:</label>
        <input type="text" name="tlp" required>

        <button type="submit">Tambah</button>
    </form>

    <hr>

    <!-- Daftar Outlet -->
    <h3>Daftar Outlet</h3>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>
        @foreach($outlet as $outlet)
            <tr>
                <td>{{ $outlet->nama }}</td>
                <td>{{ $outlet->alamat }}</td>
                <td>{{ $outlet->tlp }}</td>
                <td>
                    <!-- Form Edit -->
                    <form action="{{ route('outlet.update', $outlet->id) }}" method="POST">
                        @csrf
                        <input type="text" name="nama" value="{{ $outlet->nama }}" required>
                        <input type="text" name="alamat" value="{{ $outlet->alamat }}" required>
                        <input type="text" name="tlp" value="{{ $outlet->tlp }}" required>
                        <button type="submit">Update</button>
                    </form>

                    <!-- Form Hapus -->
                    <form action="{{ route('outlet.destroy', $outlet->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" onclick="return confirm('Hapus outlet ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <h2>Manajemen Outlet</h2>

<!-- Notifikasi -->
@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<!-- Form Tambah Outlet -->
<h3>Tambah Outlet</h3>
<form action="{{ route('outlet.store') }}" method="POST">
    @csrf
    <label>Nama:</label>
    <input type="text" name="nama" required>
    
    <label>Alamat:</label>
    <textarea name="alamat" required></textarea>
    
    <label>Telepon:</label>
    <input type="text" name="tlp" required>

    <button type="submit">Tambah</button>
</form>

<hr>

<!-- Daftar Outlet -->
<h3>Daftar Outlet</h3>
<table border="1">
    <tr>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Telepon</th>
        <th>Aksi</th>
    </tr>
    @foreach($outlet as $outlet)
        <tr>
            <td>{{ $outlet->nama }}</td>
            <td>{{ $outlet->alamat }}</td>
            <td>{{ $outlet->tlp }}</td>
            <td>
                <!-- Form Edit -->
                <form action="{{ route('outlet.update', $outlet->id) }}" method="POST">
                    @csrf
                    <input type="text" name="nama" value="{{ $outlet->nama }}" required>
                    <input type="text" name="alamat" value="{{ $outlet->alamat }}" required>
                    <input type="text" name="tlp" value="{{ $outlet->tlp }}" required>
                    <button type="submit">Update</button>
                </form>

                <!-- Form Hapus -->
                <form action="{{ route('outlet.destroy', $outlet->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" onclick="return confirm('Hapus outlet ini?')">Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>