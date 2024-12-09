<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Montserrat', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background: linear-gradient(90deg, #4b79a1, #283e51);
        }

        .page-title {
            text-align: center;
            color: #fff;
            font-size: 60px;
            font-weight: bold;
            margin-bottom: 50px;
            opacity: 0;
            transform: translateY(-50px);
            animation: fadeInFromTop 2s forwards;
        }

        @keyframes fadeInFromTop {
            0% {
                opacity: 0;
                transform: translateY(-50px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            background: #ffffff;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .login-container h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .login-container form {
            display: flex;
            flex-direction: column;
        }

        .login-container input {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .login-container button {
            background: #4facfe;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }

        .login-container button:hover {
            background: #00aef0;
        }

        .login-container .register-link {
            margin-top: 10px;
            font-size: 14px;
        }

        .login-container .register-link a {
            color: #4facfe;
            text-decoration: none;
            font-weight: bold;
        }

        .login-container .register-link a:hover {
            text-decoration: underline;
        }

        /* Menambahkan styling untuk pesan error */
        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 20px; /* Memberikan jarak lebih pada bagian atas pesan error */
            margin-bottom: 15px; /* Memberikan jarak bawah untuk menghindari terlalu mepet dengan elemen lainnya */
        }
    </style>
</head>
<body>
    <div class="page-title">
        ArticleCraft
    </div>

    <div class="login-container">
        <h1>Selamat Datang!</h1>
        <p>Silakan login untuk melanjutkan</p>

        <!-- Menampilkan pesan error jika ada -->
        @if(session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <div class="register-link">
            Belum punya akun? <a href="{{ route('register') }}">Daftar Sekarang</a>
        </div>
    </div>
</body>
</html>
