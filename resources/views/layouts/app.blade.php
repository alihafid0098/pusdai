<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'PUSDAI Jawa Barat')</title>

    <link rel="stylesheet" href="{{ asset('css/pusdai.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chat-widget.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animations.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

    {{-- AI Chat Widget --}}
    @include('components.chat-widget')

    {{-- Scripts --}}
    <script src="https://unpkg.com/lucide@latest"></script>

    {{-- Smooth Scroll: Lenis --}}
    <script src="https://unpkg.com/lenis@1.1.18/dist/lenis.min.js"></script>

    {{-- GSAP & ScrollTrigger --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

    {{-- Motion One (Motion One / Motion) --}}
    <script src="https://cdn.jsdelivr.net/npm/motion@10.18.0/dist/motion.umd.min.js"></script>

    <script src="{{ asset('js/pusdai.js') }}"></script>
    <script src="{{ asset('js/animations.js') }}"></script>

</body>
</html>