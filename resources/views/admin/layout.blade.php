<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') - PUSDAI Jawa Barat</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

<div class="admin-shell">

    <aside class="admin-sidebar">

        <div class="admin-brand">
            <span class="admin-brand-mark">P</span>
            <div>
                <strong>PUSDAI Admin</strong>
                <small>Panel Pengelolaan</small>
            </div>
        </div>

        <nav class="admin-nav">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                Dashboard
            </a>
            <a href="{{ route('admin.agenda.index') }}" class="{{ request()->routeIs('admin.agenda.*') ? 'active' : '' }}">
                Agenda &amp; Kajian
            </a>
            <a href="{{ route('admin.announcement.index') }}" class="{{ request()->routeIs('admin.announcement.*') ? 'active' : '' }}">
                Informasi Beranda
            </a>
            <a href="{{ route('beranda') }}" target="_blank" rel="noopener">
                Lihat Situs ↗
            </a>
        </nav>

        <form method="POST" action="{{ route('admin.logout') }}" class="admin-logout">
            @csrf
            <button type="submit">Keluar</button>
        </form>

    </aside>

    <main class="admin-main">

        <header class="admin-topbar">
            <div>
                <h1>@yield('heading', 'Dashboard')</h1>
                <p>@yield('subheading', 'Kelola konten PUSDAI Jawa Barat')</p>
            </div>
            <div class="admin-user">{{ auth()->user()->name ?? 'Admin' }}</div>
        </header>

        @if (session('status'))
            <div class="admin-alert">{{ session('status') }}</div>
        @endif

        @if ($errors->any())
            <div class="admin-alert error">
                <strong>Periksa kembali isian berikut:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')

    </main>

</div>

</body>
</html>
