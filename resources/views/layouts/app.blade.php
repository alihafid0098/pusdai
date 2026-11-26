<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'PUSDAI Jawa Barat')</title>

    <link rel="stylesheet" href="{{ asset('css/pusdai.css') }}">
</head>

<body>

    {{-- Header --}}
    @include('components.header')

    {{-- Isi halaman --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.footer')

        <script src="https://unpkg.com/lucide@latest"></script>

    <script src="{{ asset('js/pusdai.js') }}"></script>

</body>
</html>