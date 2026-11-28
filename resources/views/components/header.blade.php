<header id="site-header" class="site-header">
    <div class="header-container">

        {{-- LOGO (Logo Pusdai Saja Tanpa Tulisan) --}}
        <a href="{{ route('beranda') }}" class="header-logo group" title="PUSDAI Jawa Barat" style="display: flex; align-items: center;">

            <div class="header-logo-box" style="background: transparent !important; box-shadow: none !important; width: auto; height: 50px; display: flex; align-items: center; justify-content: center;">
                <img src="{{ asset('images/pusdai-icon.png') }}" alt="Logo PUSDAI Jawa Barat" style="height: 48px; width: auto; max-width: 160px; object-fit: contain; filter: drop-shadow(0 2px 4px rgba(0,0,0,0.06));">
            </div>

        </a>


        {{-- DESKTOP NAVIGATION --}}
        <nav class="desktop-nav">

            {{-- BERANDA --}}
            <a
                href="{{ route('beranda') }}"
                class="nav-link {{ request()->routeIs('beranda') ? 'active' : '' }}"
            >
                Beranda
            </a>


            {{-- TENTANG KAMI --}}
            <div class="nav-dropdown">

                <button class="nav-link dropdown-trigger" type="button">
                    <span>Tentang Kami</span>
                    <i data-lucide="chevron-down"></i>
                </button>

                <div class="dropdown-menu">

                    <a href="{{ route('sejarah') }}" class="dropdown-link">
                        Sejarah
                    </a>

                    <a href="{{ route('profil') }}" class="dropdown-link">
                        Profil DKM
                    </a>

                    <a href="{{ route('galeri') }}" class="dropdown-link">
                        Galeri Foto
                    </a>

                </div>

            </div>


            {{-- LAYANAN --}}
            <div class="nav-dropdown">

                <button class="nav-link dropdown-trigger" type="button">
                    <span>Layanan</span>
                    <i data-lucide="chevron-down"></i>
                </button>

                <div class="dropdown-menu">

                    <a href="{{ route('layanan') }}" class="dropdown-link">
                        Layanan Fasilitas
                    </a>

                    <a href="{{ route('konsultasi') }}" class="dropdown-link">
                        Konsultasi Syariah
                    </a>

                    <a href="{{ route('layanan.sewa') }}" class="dropdown-link">
                        Penggunaan Fasilitas
                    </a>

                    <a href="{{ route('layanan.jenazah') }}" class="dropdown-link">
                        Layanan Jenazah
                    </a>

                    <a href="{{ route('streaming') }}" class="dropdown-link">
                        Pusdai TV (Streaming)
                    </a>

                    <a href="{{ route('academy') }}" class="dropdown-link">
                        Pusdai Academy
                    </a>

                    <a href="{{ route('perpustakaan') }}" class="dropdown-link">
                        Perpustakaan Digital
                    </a>

                    <a href="{{ route('faraid') }}" class="dropdown-link">
                        Kalkulator Faraid
                    </a>

                </div>

            </div>


            {{-- BERITA --}}
            <a
                href="{{ route('berita') }}"
                class="nav-link {{ request()->routeIs('berita', 'berita.detail') ? 'active' : '' }}"
            >
                Berita
            </a>


            {{-- AGENDA --}}
            <a
                href="{{ route('agenda') }}"
                class="nav-link {{ request()->routeIs('agenda') ? 'active' : '' }}"
            >
                Agenda
            </a>


            {{-- KONTAK --}}
            <a
                href="{{ route('kontak') }}"
                class="nav-link {{ request()->routeIs('kontak') ? 'active' : '' }}"
            >
                Kontak
            </a>

        </nav>


        {{-- RIGHT SIDE --}}
        <div class="header-right">

            {{-- DONASI --}}
            <a href="{{ route('donasi') }}" class="donation-button">

                <i data-lucide="heart"></i>

                <span>Donasi</span>

            </a>


            {{-- MOBILE MENU BUTTON --}}
            <button
                type="button"
                class="mobile-menu-button"
                id="mobile-menu-button"
                aria-label="Buka menu"
                aria-controls="mobile-menu"
                aria-expanded="false"
            >
                <i data-lucide="menu" id="menu-icon"></i>
                <i data-lucide="x" id="close-icon"></i>
            </button>

        </div>

    </div>


    {{-- MOBILE MENU --}}
    <nav id="mobile-menu" class="mobile-menu">

        <a
            href="{{ route('beranda') }}"
            class="mobile-nav-link"
        >
            Beranda
        </a>


        {{-- TENTANG KAMI --}}
        <div class="mobile-nav-group">

            <div class="mobile-nav-title">
                Tentang Kami
            </div>

            <div class="mobile-nav-children">

                <a href="{{ route('sejarah') }}">
                    Sejarah
                </a>

                <a href="{{ route('profil') }}">
                    Profil DKM
                </a>

                <a href="{{ route('galeri') }}">
                    Galeri Foto
                </a>

            </div>

        </div>


        {{-- LAYANAN --}}
        <div class="mobile-nav-group">

            <div class="mobile-nav-title">
                Layanan
            </div>

            <div class="mobile-nav-children">

                <a href="{{ route('layanan') }}">
                    Layanan Fasilitas
                </a>

                <a href="{{ route('konsultasi') }}">
                    Konsultasi Syariah
                </a>

                <a href="{{ route('perpustakaan') }}">
                    Perpustakaan Digital
                </a>

                <a href="{{ route('faraid') }}">
                    Kalkulator Faraid
                </a>

                <a href="{{ route('layanan.sewa') }}">
                    Penggunaan Fasilitas
                </a>

                <a href="{{ route('layanan.jenazah') }}">
                    Layanan Jenazah
                </a>

            </div>

        </div>


        <a
            href="{{ route('streaming') }}"
            class="mobile-nav-link"
        >
            Pusdai TV
        </a>

        <a
            href="{{ route('academy') }}"
            class="mobile-nav-link"
        >
            Pusdai Academy
        </a>


        <a
            href="{{ route('berita') }}"
            class="mobile-nav-link"
        >
            Berita
        </a>

        <a
            href="{{ route('agenda') }}"
            class="mobile-nav-link"
        >
            Agenda
        </a>

        <a
            href="{{ route('kontak') }}"
            class="mobile-nav-link"
        >
            Kontak
        </a>


        {{-- MOBILE DONATION --}}
        <a
            href="{{ route('donasi') }}"
            class="mobile-donation-button"
        >

            <i data-lucide="heart"></i>

            <span>Donasi (Pusdai Care)</span>

        </a>

    </nav>

</header>