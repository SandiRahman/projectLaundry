<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        /* Reset dasar */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #dbeafe, #bfdbfe);
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #1e40af;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            text-align: left;
            font-weight: bold;
            margin-bottom: 5px;
            color: #475569;
        }

        input, select, textarea {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #94a3b8;
            border-radius: 5px;
            margin-bottom: 15px;
            transition: 0.3s;
        }

        input:focus, select:focus, textarea:focus {
            border-color: #3b82f6;
            outline: none;
            box-shadow: 0 0 5px rgba(59, 130, 246, 0.5);
        }

        button {
            background: #3b82f6;
            color: white;
            padding: 12px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #2563eb;
        }

        p {
            margin-top: 15px;
            font-size: 14px;
        }

        a {
            color: #2563eb;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Register</h2>
        <form action="register.php" method="POST">
            <label for="NamaLengkap">Nama Lengkap</label>
            <input type="text" name="NamaLengkap" id="NamaLengkap" required>

            <label for="Username">Username</label>
            <input type="text" name="Username" id="Username" required>

            <label for="Email">Email</label>
            <input type="email" name="Email" id="Email" required>

            <label for="Password">Password</label>
            <input type="password" name="Password" id="Password" required>

            <label for="Alamat">Alamat</label>
            <textarea name="Alamat" id="Alamat" rows="3" required></textarea>

            <label for="Role">Role</label>
            <select name="Role" id="Role" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>

            <button type="submit">Daftar</button>
        </form>

        <p>Sudah punya akun? <a href= {{ route('login') }}>Login di sini</a></p>
    </div>

</body>
</html>
