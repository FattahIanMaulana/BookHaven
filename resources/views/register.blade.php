```php
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(to right, #1E3A5F, #5E83B5);
            padding: 20px;
        }

        .register-container {
            width: 100%;
            max-width: 900px;
            background: #F5F5F5;
            border: 3px solid #111;
            border-radius: 28px;
            padding: 35px 50px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            text-align: center;
        }

        .logo-wrapper {
            margin-bottom: 20px;
        }

        .logo-image {
            width: 80px;
            height: 80px;
            margin: 0 auto 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .logo-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .logo-placeholder {
            width: 100%;
            height: 100%;
            border: 2px dashed #999;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #777;
            font-size: 11px;
            border-radius: 12px;
        }

        .logo-title {
            font-size: 34px;
            font-weight: 700;
            color: #001B4E;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
            margin-bottom: 24px;
        }

        .form-title {
            font-size: 18px;
            font-weight: 700;
            color: #111;
            margin-bottom: 20px;
        }

        .success,
        .error {
            display: inline-block;
            padding: 10px 18px;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 14px;
            text-align: left;
        }

        .success {
            background: green;
            color: white;
        }

        .error {
            background: #b91c1c;
            color: white;
        }

        .error ul {
            padding-left: 18px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group input {
            width: 100%;
            max-width: 360px;
            padding: 12px 16px;
            border: 1.5px solid #111;
            border-radius: 12px;
            outline: none;
            font-size: 15px;
            background: white;
            box-shadow: 0 3px 6px rgba(0,0,0,0.15);
        }

        .submit-btn {
            width: 100%;
            max-width: 360px;
            margin-top: 18px;
            padding: 12px;
            border: none;
            border-radius: 12px;
            background: #1E3A5F;
            color: white;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            transition: 0.2s ease;
        }

        .submit-btn:hover {
            background: #16304f;
            transform: translateY(-2px);
        }

        .bottom-text {
            margin-top: 18px;
            font-size: 15px;
            color: #111;
        }

        .bottom-text a {
            color: #111;
            font-weight: 600;
            margin-left: 5px;
        }

        @media (max-width: 768px) {
            .register-container {
                max-width: 95%;
                padding: 25px 20px;
                border-radius: 22px;
            }

            .logo-title {
                font-size: 28px;
            }

            .form-title {
                font-size: 16px;
            }

            .form-group input,
            .submit-btn {
                max-width: 100%;
                font-size: 14px;
                padding: 12px 14px;
            }
        }
    </style>
</head>
<body>

    <div class="register-container">
        <div class="logo-wrapper">
            <div class="logo-image">
                <!-- Ganti placeholder ini dengan gambar logo kamu -->
                <!-- Contoh: <img src="{{ asset('images/logo.png') }}" alt="Logo"> -->
                <img src="{{ asset('storage/Logo.png') }}" alt="Login Image">
            </div>

            <div class="logo-title">BookHaven</div>
        </div>

        <div class="form-title">Daftar Akun BookHaven</div>

        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <input type="text" name="name" placeholder="Nama" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <input type="email" name="email" placeholder="Email (@gmail.com)" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <div class="form-group">
                <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
            </div>

            <input type="hidden" name="role" value="user">

            <button type="submit" class="submit-btn">Register</button>
        </form>

        <div class="bottom-text">
            Sudah punya akun?
            <a href="{{ route('login') }}">Login
</body>
</html>