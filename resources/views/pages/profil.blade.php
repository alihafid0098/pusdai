@extends('layouts.app')

@section('title', 'Profil & Struktur DKM - PUSDAI Jawa Barat')

@section('content')

{{-- HERO --}}
<section class="inner-hero">

    <div class="inner-hero-overlay"></div>

    <div class="inner-hero-content">

        <span class="section-label">
            TENTANG KAMI
        </span>

        <h1>Profil &amp; Struktur DKM</h1>

        <p>
            Susunan kepengurusan Dewan Kemakmuran Masjid (DKM)
            Pusat Dakwah Islam (PUSDAI) Jawa Barat beserta
            tugas pokok dan fungsi masing-masing bidang.
        </p>

    </div>

</section>

{{-- PENGURUS DKM --}}
<section class="dkm-section">

    <div class="container">

        <div class="dkm-intro">

            <span class="section-label">
                PENGURUS DKM
            </span>

            <h2>Struktur Organisasi &amp; Tupoksi</h2>

            <p>
                DKM PUSDAI Jawa Barat dikelola oleh pengurus yang
                terdiri dari pembina, penasehat, pengarah, imam besar,
                ketua, kesekretariatan, keuangan, serta tiga bidang kerja:
                Idarah, Imarah, dan Riayah.
            </p>

        </div>

        <div class="dkm-grid">

            {{-- PEMBINA, PENASEHAT, PENGARAH --}}
            <article class="dkm-card dkm-card-wide">

                <h3>Pembina &amp; Pengarah Kehormatan</h3>

                <div class="dkm-subgrid">

                    <div class="dkm-subcard">

                        <h4>I. Pembina</h4>

                        <ul class="dkm-list">
                            <li>Gubernur Jawa Barat</li>
                            <li>Wakil Gubernur Jawa Barat</li>
                        </ul>

                    </div>

                    <div class="dkm-subcard">

                        <h4>II. Penasehat</h4>

                        <ul class="dkm-list">
                            <li>Sekretaris Daerah Provinsi Jawa Barat</li>
                            <li>Asisten Pemerintahan dan Kesejahteraan Rakyat</li>
                            <li>Kepala Kanwil Kementerian Agama Provinsi Jawa Barat</li>
                            <li>Kepala Biro Kesejahteraan Rakyat</li>
                            <li>Ketua MUI Jawa Barat</li>
                            <li>Ketua PW DMI Provinsi Jawa Barat</li>
                        </ul>

                    </div>

                    <div class="dkm-subcard">

                        <h4>III. Pengarah</h4>

                        <ul class="dkm-list">
                            <li>Ketua PW NU Jawa Barat</li>
                            <li>Ketua PW Muhammadiyah Jawa Barat</li>
                            <li>Ketua PW Persis Jawa Barat</li>
                            <li>Ketua ICMI Jawa Barat</li>
                        </ul>

                    </div>

                </div>

            </article>

            {{-- IMAM BESAR --}}
            <article class="dkm-card">

                <h3>IV. Imam Besar</h3>

                <p class="dkm-role">Imam Besar</p>
                <p class="dkm-name">Prof. Dr. KH. Rahmat Syafei</p>

                <p class="dkm-role">Wakil Imam Besar</p>
                <p class="dkm-name">Prof. Dr. H. Rosihon Anwar, M.Ag</p>

            </article>

            {{-- KETUA DKM --}}
            <article class="dkm-card">

                <h3>V. Ketua DKM</h3>

                <p class="dkm-name">Dr. KH. Jujun Junaedi, M.A</p>

                <p class="dkm-desc">
                    Mengoordinasikan, memimpin, dan mengawasi jalannya
                    roda organisasi DKM Pusdai.
                </p>

            </article>

            {{-- KESEKRETARIATAN --}}
            <article class="dkm-card">

                <h3>VI. Kesekretariatan</h3>

                <p class="dkm-role">Sekretaris DKM</p>
                <p class="dkm-name">Dr. H. Ijang Falsal</p>

                <p class="dkm-role">Wakil Sekretaris</p>
                <p class="dkm-name">Hendy Hermawan, S.Sos</p>

            </article>

            {{-- KEUANGAN --}}
            <article class="dkm-card">

                <h3>VII. Keuangan &amp; Kebendaharaan</h3>

                <p class="dkm-role">Bendahara DKM</p>
                <p class="dkm-name">H. Agus Salman, M.Ag</p>

                <p class="dkm-role">Wakil Bendahara</p>
                <p class="dkm-name">H. Ahmad Zen Zaeni</p>

            </article>

        </div>

    </div>

</section>

{{-- BIDANG KERJA --}}
<section class="dkm-bidang">

    <div class="container">

        <div class="dkm-intro dkm-intro-left">

            <span class="section-label">
                BIDANG KERJA
            </span>

            <h2>Ketua &amp; Anggota Bidang</h2>

            <p>
                Tiga bidang kerja DKM PUSDAI menjalankan fungsi
                kesekretariatan (Idarah), pemakmuran masjid (Imarah),
                serta pemeliharaan sarana dan prasarana (Riayah).
            </p>

        </div>

        <div class="dkm-bidang-grid">

            <article class="dkm-bidang-card">

                <span class="dkm-bidang-number">IX</span>

                <h3>Bidang Idarah</h3>

                <p class="dkm-role">Ketua Bidang</p>
                <p class="dkm-name">Dr. H. Rohmanul Aziz, M.Ag</p>

                <p class="dkm-role">Anggota</p>

                <ul class="dkm-list dkm-list-anggotas">
                    <li>Dr. Hj. Diah Fatma Sjoeraida, M.Si</li>
                    <li>Dr. H. Achmad Ridwan, S.E.</li>
                    <li>H. Dendi Abdul Aziz, M.S.</li>
                    <li>Saepudin Zuhri</li>
                </ul>

            </article>

            <article class="dkm-bidang-card">

                <span class="dkm-bidang-number">X</span>

                <h3>Bidang Imarah</h3>

                <p class="dkm-role">Ketua Bidang</p>
                <p class="dkm-name">Dr. H. Rohmanul Aziz, M.Ag</p>

                <p class="dkm-role">Anggota</p>

                <ul class="dkm-list dkm-list-anggotas">
                    <li>Dr. H. Fathurrohman El Basyari, Lc., M.A.</li>
                    <li>H. Asep Jazuli</li>
                    <li>H. Nurdin Hidayat</li>
                    <li>Arif Nurjaman, M.Ikom.</li>
                </ul>

            </article>

            <article class="dkm-bidang-card">

                <span class="dkm-bidang-number">XI</span>

                <h3>Bidang Riayah</h3>

                <p class="dkm-role">Ketua Bidang</p>
                <p class="dkm-name">H. Budi Kurnia, S.Ag.</p>

                <p class="dkm-role">Anggota</p>

                <ul class="dkm-list dkm-list-anggotas">
                    <li>Dr. H. Ramdan Fauzie, M.Ag</li>
                    <li>Ir. Toni Kusnadi</li>
                    <li>Sri Nurfadilah</li>
                    <li>Fauzan, S.Pd.</li>
                </ul>

            </article>

        </div>

    </div>

</section>

{{-- TUPOKSI --}}
<section class="dkm-tupoksi">

    <div class="container">

        <div class="dkm-intro">

            <span class="section-label">
                TUPOKSI
            </span>

            <h2>Tugas Pokok &amp; Fungsi Pengurus DKM</h2>

            <p>
                Rincian tugas pokok, fungsi, dan rincian tugas setiap
                unsur kepengurusan DKM PUSDAI Jawa Barat.
            </p>

        </div>

        <div class="dkm-accordion">

            {{-- KPM --}}
            <details class="dkm-acc-item">

                <summary>
                    <span>Ketua Koordinator Pengelola Masjid (KPM)</span>
                </summary>

                <div class="dkm-acc-body">

                    <h4>Tugas Pokok</h4>
                    <p>
                        Membantu melaksanakan tugas Kepala BPIC dalam
                        pengelolaan asset dan kemakmuran masjid.
                    </p>

                    <h4>Fungsi</h4>
                    <ul class="dkm-list">
                        <li>Pelaksanaan koordinasi, perencanaan, evaluasi, pelaporan pengelolaan asset dan kemakmuran masjid.</li>
                        <li>Pelaksanaan pengelolaan, pemanfaatan, pengembangan, serta pengamanan asset dan kemakmuran masjid.</li>
                    </ul>

                    <h4>Rincian Tugas</h4>
                    <ul class="dkm-list">
                        <li>Mengoordinasikan perencanaan/penyusunan program kerja pengelolaan asset dan kemakmuran masjid.</li>
                        <li>Mengoordinasikan penggunaan, pemanfaatan, dan pengelolaan asset dan kemakmuran masjid.</li>
                        <li>Melaksanakan koordinasi dengan instansi terkait.</li>
                        <li>Melaksanakan penyelesaian dan pengambilan tindakan untuk mengatasi permasalahan yang terjadi di lapangan.</li>
                        <li>Mengoordinasikan evaluasi dan pelaporan bulanan, semesteran, dan tahunan pengelolaan dan kemakmuran masjid.</li>
                        <li>Melaksanakan tugas lain yang diberikan oleh pimpinan BPIC.</li>
                    </ul>

                </div>

            </details>

            {{-- WAKIL KPM --}}
            <details class="dkm-acc-item">

                <summary>
                    <span>Wakil Koordinator Pengelola Masjid</span>
                </summary>

                <div class="dkm-acc-body">

                    <h4>Tugas Pokok</h4>
                    <p>
                        Membantu melaksanakan tugas KPM dalam pengelolaan asset
                        dan kemakmuran masjid serta melakukan koordinasi dan
                        pengawasan pelaksanaan ketatausahaan, personalia,
                        keuangan, dan kehumasan masjid.
                    </p>

                    <h4>Fungsi</h4>
                    <ul class="dkm-list">
                        <li>Pelaksanaan tugas membantu pengkoordinasian, perencanaan, evaluasi, pelaporan pengelolaan asset dan kemakmuran masjid.</li>
                        <li>Pelaksanaan koordinasi dan pengawasan ketatausahaan, personalia, keuangan, dan kehumasan masjid.</li>
                    </ul>

                    <h4>Rincian Tugas</h4>
                    <ul class="dkm-list">
                        <li>Membantu mengoordinasikan perencanaan/penyusunan program kerja pengelolaan asset dan kemakmuran masjid.</li>
                        <li>Membantu mengoordinasikan penggunaan, pemanfaatan, dan pengelolaan asset dan kemakmuran masjid.</li>
                        <li>Mengoordinasikan dan mengawasi pelaksanaan ketatausahaan, personalia, keuangan dan kehumasan masjid.</li>
                        <li>Mengoordinasikan penyusunan evaluasi dan laporan bulanan, semesteran, dan tahunan pengelolaan asset dan kemakmuran masjid.</li>
                        <li>Melaksanakan tugas lain yang diberikan oleh pimpinan BPIC.</li>
                    </ul>

                </div>

            </details>

            {{-- KETUA DKM --}}
            <details class="dkm-acc-item">

                <summary>
                    <span>Ketua DKM</span>
                </summary>

                <div class="dkm-acc-body">

                    <h4>Tugas Pokok</h4>
                    <p>
                        Memimpin, mengoordinasikan, merencanakan, melaksanakan,
                        dan mengevaluasi program kerja dan kegiatan DKM untuk
                        meningkatkan pelayanan ibadah, dakwah dan syiar Islam.
                    </p>

                    <h4>Fungsi</h4>
                    <ul class="dkm-list">
                        <li>Pelaksanaan koordinasi, memimpin, merencanakan, melaksanakan dan mengevaluasi program kerja dan kegiatan DKM.</li>
                        <li>Pelaksanaan pelayanan ibadah, dakwah dan syiar Islam.</li>
                    </ul>

                    <h4>Rincian Tugas</h4>
                    <ul class="dkm-list">
                        <li>Merumuskan rencana Program Kerja dan Anggaran kegiatan DKM untuk disampaikan kepada Kepala BPIC melalui Koordinator Pengelola Masjid.</li>
                        <li>Mengelola dana dan mengatur keuangan yang bersumber dari infak masyarakat untuk merealisasikan Program Kerja dan kegiatan DKM.</li>
                        <li>Melaksanakan program kerja dan kegiatan DKM untuk meningkatkan pelayanan ibadah, dakwah dan syiar Islam.</li>
                        <li>Memimpin rapat-rapat DKM.</li>
                        <li>Menandatangani surat, sertifikat, dan/atau piagam yang berhubungan dengan program kerja dan kegiatan yang dilaksanakan DKM.</li>
                        <li>Melakukan kerjasama atau penyertaan dalam berbagai bentuk kegiatan sesuai lingkup program kerja dan kegiatan DKM dengan sepengetahuan Kepala BPIC.</li>
                        <li>Melaksanakan pembinaan terhadap kinerja personalia DKM.</li>
                        <li>Memberikan pertimbangan kepada Kepala BPIC mengenai penyelesaian masalah-masalah yang timbul melalui Koordinator Pengelola Masjid.</li>
                        <li>Melaksanakan evaluasi dan melaporkan hasil pelaksanaan kegiatan kepada Kepala BPIC melalui Koordinator Pengelola Masjid, dalam bentuk laporan bulanan, semesteran, dan tahunan atau sewaktu-waktu apabila diperlukan.</li>
                        <li>Melaksanakan tugas lain sesuai dengan tugas pokok dan fungsinya.</li>
                    </ul>

                </div>

            </details>

            {{-- WAKIL KETUA DKM --}}
            <details class="dkm-acc-item">

                <summary>
                    <span>Wakil Ketua DKM</span>
                </summary>

                <div class="dkm-acc-body">

                    <h4>Tugas Pokok</h4>
                    <p>
                        Membantu Ketua DKM dalam memimpin, mengoordinasikan,
                        merencanakan, melaksanakan dan mengevaluasi program
                        kerja dan kegiatan DKM untuk meningkatkan pelayanan
                        ibadah, dakwah dan syiar Islam.
                    </p>

                    <h4>Fungsi</h4>
                    <ul class="dkm-list">
                        <li>Pelaksanaan tugas membantu pengoordinasian, perencanaan, pelaksanaan, dan evaluasi program kerja dan kegiatan.</li>
                        <li>Pelaksanaan tugas bersama Ketua DKM meningkatkan pelayanan ibadah, dakwah, dan syiar Islam.</li>
                    </ul>

                    <h4>Rincian Tugas</h4>
                    <ul class="dkm-list">
                        <li>Mewakili pelaksanaan tugas-tugas Ketua DKM apabila Ketua DKM memandatkan atau berhalangan.</li>
                        <li>Mewakili Ketua DKM dalam beberapa kegiatan di dalam dan di luar Pusdai yang berkaitan dengan kegiatan.</li>
                        <li>Bersama Ketua DKM merumuskan rencana program kerja dan anggaran.</li>
                        <li>Bersama Ketua DKM melaksanakan program kerja dan kegiatan.</li>
                        <li>Bersama Ketua DKM melaksanakan evaluasi dan melaporkan hasil pelaksanaan kegiatan kepada Kepala BPIC.</li>
                        <li>Melaksanakan tugas lain sesuai dengan tugas pokok dan fungsinya.</li>
                    </ul>

                </div>

            </details>

            {{-- SEKRETARIS --}}
            <details class="dkm-acc-item">

                <summary>
                    <span>Sekretaris DKM</span>
                </summary>

                <div class="dkm-acc-body">

                    <h4>Tugas Pokok</h4>
                    <p>
                        Membantu Ketua DKM dalam mengatur organisasi dan
                        pengelolaan kesekretariatan untuk merealisasikan
                        Program Kerja dan kegiatan DKM.
                    </p>

                    <h4>Fungsi</h4>
                    <ul class="dkm-list">
                        <li>Pelaksanaan pengaturan organisasi dan pengelolaan kesekretariatan.</li>
                        <li>Pelaksanaan koordinasi perencanaan dan evaluasi program kerja dan kegiatan.</li>
                    </ul>

                    <h4>Rincian Tugas</h4>
                    <ul class="dkm-list">
                        <li>Melaksanakan pengaturan organisasi dan pengelolaan kesekretariatan.</li>
                        <li>Melaksanakan koordinasi perumusan rencana program kerja dan kegiatan.</li>
                        <li>Melaksanakan koordinasi pelaksanaan kegiatan dan acara.</li>
                        <li>Melaksanakan koordinasi dengan pihak-pihak terkait.</li>
                        <li>Melaksanakan koordinasi penyusunan evaluasi dan pelaporan program kerja dan kegiatan.</li>
                        <li>Melaksanakan tugas lain sesuai dengan tugas pokok dan fungsinya.</li>
                    </ul>

                </div>

            </details>

            {{-- BENDAHARA --}}
            <details class="dkm-acc-item">

                <summary>
                    <span>Bendahara DKM</span>
                </summary>

                <div class="dkm-acc-body">

                    <h4>Tugas Pokok</h4>
                    <p>
                        Membantu Ketua DKM dalam mengelola dana dan mengatur
                        keuangan yang bersumber dari infak masyarakat untuk
                        merealisasikan Program Kerja dan kegiatan DKM.
                    </p>

                    <h4>Fungsi</h4>
                    <ul class="dkm-list">
                        <li>Pelaksanaan pengelolaan dana dan pengaturan keuangan yang bersumber dari infak masyarakat.</li>
                        <li>Pelaksanaan fasilitasi ketersediaan anggaran untuk merealisasikan Program Kerja dan kegiatan.</li>
                    </ul>

                    <h4>Rincian Tugas</h4>
                    <ul class="dkm-list">
                        <li>Melaksanakan pengelolaan dana dan pengaturan keuangan.</li>
                        <li>Menyusun rencana anggaran program kerja dan kegiatan.</li>
                        <li>Melaksanakan koordinasi penerimaan dana yang bersumber dari infak masyarakat.</li>
                        <li>Melaksanakan koordinasi penggunaan anggaran kegiatan.</li>
                        <li>Menyusun laporan pertanggungjawaban keuangan secara periodik kepada BPIC.</li>
                        <li>Melaksanakan tugas lain sesuai dengan tugas pokok dan fungsinya.</li>
                    </ul>

                </div>

            </details>

            {{-- BIDANG IDARAH --}}
            <details class="dkm-acc-item">

                <summary>
                    <span>Bidang Idarah</span>
                </summary>

                <div class="dkm-acc-body">

                    <h4>Tugas Pokok</h4>
                    <p>Melaksanakan tugas-tugas yang berhubungan dengan kesekretariatan.</p>

                    <h4>Fungsi</h4>
                    <ul class="dkm-list">
                        <li>Pelaksanaan tugas kesekretariatan.</li>
                    </ul>

                    <h4>Rincian Tugas</h4>
                    <ul class="dkm-list">
                        <li>Memberikan pelayanan administrasi data, pengarsipan, dokumentasi, akomodasi, logistik dan kehumasan.</li>
                        <li>Memberikan pelayanan fasilitasi dan informasi kegiatan kepada jamaah.</li>
                        <li>Melaksanakan koordinasi teknis perencanaan, pelaksanaan dan evaluasi program kerja dan pengelolaan anggaran kepada semua bidang kerja.</li>
                        <li>Menyampaikan program kegiatan dan anggaran bidang kerja bulanan dan insidental.</li>
                        <li>Melaksanakan program kegiatan dengan tertib dan disiplin.</li>
                        <li>Menyampaikan laporan pelaksanaan kegiatan dan keuangan bidang kerja bulanan atau insidental.</li>
                        <li>Melaksanakan tugas lain sesuai dengan tugas pokok dan fungsinya.</li>
                    </ul>

                </div>

            </details>

            {{-- BIDANG IMARAH --}}
            <details class="dkm-acc-item">

                <summary>
                    <span>Bidang Imarah</span>
                </summary>

                <div class="dkm-acc-body">

                    <h4>Tugas Pokok</h4>
                    <p>Melaksanakan tugas-tugas yang berhubungan dengan kegiatan pemakmuran DKM.</p>

                    <h4>Fungsi</h4>
                    <ul class="dkm-list">
                        <li>Pelaksanaan tugas pemakmuran DKM.</li>
                    </ul>

                    <h4>Rincian Tugas</h4>
                    <ul class="dkm-list">
                        <li>Memberikan pelayanan kegiatan ibadah, pendidikan, kajian dan syiar Islam kepada jamaah.</li>
                        <li>Menyampaikan program kegiatan dan anggaran bidang kerja bulanan atau insidental.</li>
                        <li>Melaksanakan program kegiatan dengan tertib dan disiplin.</li>
                        <li>Menyampaikan laporan pelaksanaan kegiatan dan keuangan bidang kerja bulanan atau insidental.</li>
                        <li>Melaksanakan tugas lain sesuai dengan tugas pokok dan fungsinya.</li>
                    </ul>

                </div>

            </details>

            {{-- BIDANG RIAYAH --}}
            <details class="dkm-acc-item">

                <summary>
                    <span>Bidang Riayah</span>
                </summary>

                <div class="dkm-acc-body">

                    <h4>Tugas Pokok</h4>
                    <p>
                        Melaksanakan tugas-tugas yang berhubungan dengan
                        pemeliharaan dan pemanfaatan sarana dan prasarana Masjid.
                    </p>

                    <h4>Fungsi</h4>
                    <ul class="dkm-list">
                        <li>Pelaksanaan tugas pemeliharaan dan pemanfaatan sarana dan prasarana Masjid.</li>
                    </ul>

                    <h4>Rincian Tugas</h4>
                    <ul class="dkm-list">
                        <li>Memberikan layanan kebersihan, keamanan, parkir dan pemeliharaan lingkungan Masjid.</li>
                        <li>Menyampaikan program kegiatan dan anggaran unit kerja bulanan atau insidental.</li>
                        <li>Melaksanakan program kegiatan dengan tertib dan disiplin.</li>
                        <li>Menyampaikan laporan pelaksanaan kegiatan dan keuangan bidang kerja bulanan atau insidental.</li>
                        <li>Melaksanakan tugas lain sesuai dengan tugas pokok dan fungsinya.</li>
                    </ul>

                </div>

            </details>

        </div>

    </div>

</section>

@endsection
