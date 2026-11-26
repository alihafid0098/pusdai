<header id="site-header" class="site-header">
    <div class="header-container">

        {{-- LOGO --}}
        <a href="{{ route('beranda') }}" class="header-logo group">

            <div class="header-logo-box">
                <span>P</span>
            </div>

            <div class="header-logo-text">
                <div class="header-logo-title">
                    PUSDAI Jabar
                </div>

                <div class="header-logo-subtitle">
                    Pusat Dakwah Islam Jawa Barat
                </div>
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
                class="nav-link {{ request()->routeIs('berita*') ? 'active' : '' }}"
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
                aria-label="Menu"
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

            </div>

        </div>


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