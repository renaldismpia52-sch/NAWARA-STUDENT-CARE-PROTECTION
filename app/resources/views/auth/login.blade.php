
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login NAWARA</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #F8F7F1;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .container {
            width: 100%;
            max-width: 430px;
        }

        .brand {
            text-align: center;
            margin-bottom: 28px;
        }

        .logo {
            width: 68px;
            height: 68px;
            background: #102B55;
            color: #D9B64F;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 35px;
        }

        .brand h1 {
            color: #102B55;
            font-size: 34px;
            letter-spacing: 4px;
            margin: 0;
        }

        .brand p {
            color: #183D64;
            font-size: 12px;
            letter-spacing: 2px;
        }

        .card {
            background: white;
            padding: 35px;
            border: 1px solid #EBD58F;
            border-radius: 18px;
            box-shadow: 0 12px 35px rgba(16,43,85,.10);
        }

        .card h2 {
            color: #102B55;
            text-align: center;
            margin: 0 0 10px;
        }

        .description {
            text-align: center;
            color: #777;
            font-size: 14px;
            margin-bottom: 28px;
        }

        label {
            display: block;
            color: #102B55;
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 8px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 13px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 14px;
        }

        input:focus {
            outline: 2px solid #D9B64F;
            border-color: #D9B64F;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #666;
            font-size: 13px;
            margin-bottom: 22px;
        }

        .remember label {
            margin: 0;
            color: #666;
            font-weight: normal;
        }

        button {
            width: 100%;
            padding: 14px;
            background: #102B55;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            letter-spacing: 1px;
        }

        button:hover {
            background: #183D64;
        }

        .error {
            color: #b91c1c;
            font-size: 13px;
            margin: -12px 0 15px;
        }

        .footer {
            border-top: 1px solid #eee;
            margin-top: 25px;
            padding-top: 20px;
            text-align: center;
            color: #777;
            font-size: 12px;
            line-height: 1.8;
        }

        .school {
            color: #102B55;
            font-weight: bold;
        }

        .copyright {
            text-align: center;
            color: #888;
            font-size: 11px;
            margin-top: 25px;
            line-height: 1.8;
        }
    </style>
</head>

<body>
    <main class="container">

        <header class="brand">
            <div class="logo">✦</div>
            <h1>NAWARA</h1>
            <p>STUDENT CARE & PROTECTION</p>
            <p>Setiap Anak Berharga, Setiap Suara Bermakna</p>
        </header>

        <section class="card">
            <h2>Selamat Datang</h2>
            <p class="description">
                Silakan masuk ke akun NAWARA Anda
            </p>

            @if (session('status'))
                <p>{{ session('status') }}</p>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <label for="email">Email</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email Anda"
                    required
                    autofocus
                    autocomplete="username"
                >

                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="password">Password</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    placeholder="Masukkan password"
                    required
                    autocomplete="current-password"
                >

                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror

                <div class="remember">
                    <input
                        id="remember_me"
                        type="checkbox"
                        name="remember"
                    >
                    <label for="remember_me">Ingat saya</label>
                </div>

                <button type="submit">MASUK KE NAWARA</button>
            </form>

            <div class="footer">
                Sistem Perlindungan dan Pendampingan Murid
                <br>
                <span class="school">
                    SMP Islam Al Azhar 52 Bengkulu
                </span>
            </div>
        </section>

        <div class="copyright">
            © 2026 NAWARA. All Rights Reserved.
            <br>
            Designed & Developed by Renaldi
        </div>

    </main>
</body>
</html>
