<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Edit Outlet</h2>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<form action="{{ route('outlet.update', $outlet->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nama:</label>
    <input type="text" name="nama" value="{{ $outlet->nama }}" required>

    <label>Alamat:</label>
    <textarea name="alamat" required>{{ $outlet->alamat }}</textarea>

    <label>Telepon:</label>
    <input type="text" name="tlp" value="{{ $outlet->tlp }}" required>

    <button type="submit">Update</button>
</form>

</body>
</html>