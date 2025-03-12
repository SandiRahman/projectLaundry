<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Laundry Pro</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f4f4f4;
            color: #333;
        }

        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            background: #2563eb;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        header h1 {
            font-size: 2rem;
        }

        .cards {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            flex: 1;
            margin: 0 10px;
            text-align: center;
        }

        .card h2 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 1.2rem;
            color: #666;
        }

        .navigation {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .navigation ul {
            list-style: none;
            display: flex;
            justify-content: space-around;
        }

        .navigation ul li {
            margin: 0 10px;
        }

        .navigation ul li a {
            text-decoration: none;
            color: #2563eb;
            font-weight: bold;
            font-size: 1.1rem;
        }

        .navigation ul li a:hover {
            text-decoration: underline;
        }

        .content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .content h2 {
            font-size: 1.8rem;
            margin-bottom: 20px;
        }

        .content table {
            width: 100%;
            border-collapse: collapse;
        }

        .content table th,
        .content table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .content table th {
            background: #2563eb;
            color: white;
        }

        .content table tr:nth-child(even) {
            background: #f9f9f9;
        }

        .content table tr:hover {
            background: #f1f1f1;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <header>
            <h1>Dashboard Admin</h1>
        </header>

        <div class="cards">
            <div class="card">
                <h2>Jumlah Pelanggan</h2>
                <p>-</p>
            </div>
            <div class="card">
                <h2>Jumlah Transaksi</h2>
                <p>-</p>
            </div>
            <div class="card">
                <h2>Total Pendapatan</h2>
                <p>-</p>
            </div>
        </div>

        <div class="navigation">
            <ul>
                <li><a href="{{ route('paket.index') }}">Kelola Paket</a></li>
                <li><a href="{{ route('outlet.index') }}">Kelola Outlet</a></li>
                <li><a href="{{ route('user.index') }}">Kelola Pengguna</a></li>
                <li><a href="{{ route('transaksi.index') }}">Kelola Transaksi</a></li>
                <li><a href="{{ route('laporankasir.index') }}">Laporan Kasir</a></li>
            </ul>
        </div>

        <div class="content">
            <h2>Daftar Paket</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Paket</th>
                        <th>Jenis</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($paket as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->nama_paket }}</td>
                        <td>{{ $p->jenis }}</td>
                        <td>{{ $p->jumlah }}</td>
                        <td>{{ $p->harga }}</td>
                        <td>
                            <a href="{{ route('paket.edit', $p->id) }}">Edit</a>
                            <form action="{{ route('paket.destroy', $p->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <h2>Daftar Outlet</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($outlet as $o)
                    <tr>
                        <td>{{ $o->id }}</td>
                        <td>{{ $o->nama }}</td>
                        <td>{{ $o->alamat }}</td>
                        <td>{{ $o->tlp }}</td>
                        <td>
                            <a href="{{ route('outlet.edit', $o->id) }}">Edit</a>
                            <form action="{{ route('outlet.destroy', $o->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <h2>Daftar Pengguna</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $u)
                    <tr>
                        <td>{{ $u->id }}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->role }}</td>
                        <td>
                            <a href="{{ route('user.edit', $u->id) }}">Edit</a>
                            <form action="{{ route('user.destroy', $u->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>