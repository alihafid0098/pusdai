<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Admin - PUSDAI Jawa Barat</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="login-body">

<div class="login-card">

    <div class="login-brand">
        <span class="admin-brand-mark">P</span>
        <h1>Admin PUSDAI</h1>
        <p>Masuk untuk mengelola agenda dan informasi beranda.</p>
    </div>

    @if ($errors->any())
        <div class="admin-alert error">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.login.store') }}">
        @csrf

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="password">Kata Sandi</label>
            <input type="password" id="password" name="password" required>
        </div>

        <label class="login-remember">
            <input type="checkbox" name="remember" value="1"> Ingat saya
        </label>

        <button type="submit" class="admin-btn">Masuk</button>
    </form>

    <a class="login-back" href="{{ route('beranda') }}">← Kembali ke situs</a>

</div>

</body>
</html>
