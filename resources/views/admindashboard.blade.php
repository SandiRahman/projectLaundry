<h2>Manajemen Outlet</h2>

<!-- Notifikasi -->
@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<!-- Form Tambah Outlet -->
<h3>Tambah Outlet</h3>
<form action="{{ route('outlet.store') }}" method="POST">  <!-- Correct route here -->
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
   <!-- Blade View -->
@foreach($outlet as $outlets) <!-- Iterasi data outlet -->
<tr>
    <td>{{ $outlets->nama }}</td>
    <td>{{ $outlets->alamat }}</td>
    <td>{{ $outlets->tlp }}</td>
    <td>
        <!-- Form Edit -->
        <form action="{{ route('outlet.update', $outlets->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="nama" value="{{ $outlets->nama }}" required>
            <input type="text" name="alamat" value="{{ $outlets->alamat }}" required>
            <input type="text" name="tlp" value="{{ $outlets->tlp }}" required>
            <button type="submit">Update</button>
        </form>

        <!-- Form Hapus -->
        <form action="{{ route('outlet.destroy', $outlets->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Hapus outlet ini?')">Hapus</button>
        </form>
    </td>
</tr>
@endforeach

</table>
