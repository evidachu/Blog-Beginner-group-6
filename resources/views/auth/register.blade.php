<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(90deg, #4b79a1, #283e51);
        }

        .register-container {
            width: 100%;
            max-width: 400px;
            background: #ffffff;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .register-container h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .register-container form {
            display: flex;
            flex-direction: column;
        }

        .register-container input {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .register-container button {
            background: #4b79a1;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }

        .register-container button:hover {
            background: #f06292;
        }

        .register-container .login-link {
            margin-top: 10px;
            font-size: 14px;
        }

        .register-container .login-link a {
            color: #4b79a1;
            text-decoration: none;
            font-weight: bold;
        }

        .register-container .login-link a:hover {
            text-decoration: underline;
        }

        /* Styling for error messages */
        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h1>Daftar Sekarang!</h1>
        <p>Buat akun untuk mulai menggunakan layanan kami</p>

        <!-- Menampilkan pesan error jika ada -->
        @if ($errors->has('email'))
            <div class="error-message">
                {{ $errors->first('email') }}
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Nama Lengkap" required value="{{ old('name') }}">
            <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}">
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
            <button type="submit">Daftar</button>
        </form>
        <div class="login-link">
            Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
        </div>
    </div>
</body>
</html>
