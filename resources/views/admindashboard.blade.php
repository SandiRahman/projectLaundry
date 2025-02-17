<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>

    <div class="welcome">
        <h1>Welcome to Admin Dashboard</h1>
        <p>Only accessible by users with the 'admin' role.</p>
    </div>

    <div class="logout">
        <a href="{{ route('login') }}" class="btn btn-sm btn-danger">Logout</a>
    </div>

    <div class="Req-Reg">
        <h1>Daftar Pengguna</h1>
        <p>Berikut adalah daftar pengguna yang terdaftar.</p>

        <div class="container">
            <h2>Daftar User</h2>

            @isset($users)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Telepon</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ ucfirst($user->role ?? 'user') }}</td>
                        <td>{{ $user->phone ?? '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <p>Tidak ada data pengguna tersedia.</p>
            @endisset
        </div>
    </div>

</body>
</html>
