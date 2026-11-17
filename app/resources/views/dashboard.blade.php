<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Murid | NAWARA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            color: #24344B;
            background: #F6F5EF;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            position: relative;
            overflow: hidden;
            width: 258px;
            flex-shrink: 0;
            padding: 30px 20px;
            color: white;
            background:
                radial-gradient(circle at 15% 15%, rgba(217,182,79,.13), transparent 30%),
                linear-gradient(160deg, #102B55, #142F53 65%, #0B2142);
        }

        .sidebar::before {
            content: "";
            position: absolute;
            inset: 0;
            pointer-events: none;
            opacity: .12;
            background-image:
                repeating-linear-gradient(45deg, transparent 0 19px, #D9B64F 20px, transparent 21px 39px),
                repeating-linear-gradient(-45deg, transparent 0 19px, #D9B64F 20px, transparent 21px 39px);
            mask-image: linear-gradient(to bottom, black, transparent 75%);
        }

        .sidebar-inner {
            position: relative;
            z-index: 1;
        }

        .brand {
            text-align: center;
            font-size: 30px;
            font-weight: 800;
            letter-spacing: 4px;
            color: #FFFFFF;
        }

        .brand-sub {
            text-align: center;
            font-size: 9px;
            letter-spacing: 1.7px;
            color: #EBD58F;
            margin-top: 7px;
        }

        .gold-line {
            height: 2px;
            margin: 25px 5px 27px;
            background: linear-gradient(90deg, transparent, #D9B64F, #F2DF9D, #D9B64F, transparent);
        }

        .nav-label {
            color: #D9B64F;
            font-size: 10px;
            letter-spacing: 2px;
            margin: 23px 12px 12px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 14px;
            margin-bottom: 6px;
            color: #E7ECF4;
            text-decoration: none;
            font-size: 13px;
            border: 1px solid transparent;
            border-radius: 9px;
            transition: .2s ease;
        }

        .nav-link:hover, .nav-link.active {
            color: #F3DEA0;
            background: rgba(255,255,255,.09);
            border-color: rgba(217,182,79,.25);
        }

        .nav-icon {
            width: 21px;
            text-align: center;
            font-size: 16px;
        }

        .sidebar-motto {
            margin-top: 40px;
            padding: 18px 12px;
            text-align: center;
            border: 1px solid rgba(217,182,79,.35);
            border-radius: 10px;
            color: #EBD58F;
            font-size: 12px;
            line-height: 1.9;
            background: rgba(255,255,255,.035);
        }

        .main {
            flex: 1;
            min-width: 0;
            padding: 30px 4%;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 25px;
        }

        .top-caption {
            color: #8A7440;
            font-size: 11px;
            letter-spacing: 2px;
        }

        .account {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .account-name {
            color: #102B55;
            font-size: 13px;
            font-weight: 700;
        }

        .account-link {
            color: #8A7440;
            text-decoration: none;
            font-size: 12px;
        }

        .account-link:hover { text-decoration: underline; }

        .pearl-panel {
            padding: 13px 18px;
            overflow: hidden;
            border-left: 3px solid #D9B64F;
            border-radius: 8px;
            background: linear-gradient(100deg, #102B55, #183D64);
            color: white;
            margin-bottom: 22px;
        }

        .pearl-heading {
            color: #EBD58F;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 2px;
            margin-bottom: 9px;
        }

        .marquee-window {
            overflow: hidden;
            min-height: 24px;
            display: flex;
            align-items: center;
        }

        .marquee-text {
            display: inline-block;
            white-space: nowrap;
        font-family: 'Segoe UI', Arial, sans-serif;
            font-size: 15px;
            letter-spacing: .2px;
            color: #FFFDF5;
            animation: pearlMove 18s linear forwards;
        }

        @keyframes pearlMove {
            from { transform: translateX(100%); }
            to { transform: translateX(-100%); }
        }

        .greeting {
            position: relative;
            overflow: hidden;
            padding: 30px;
            border: 1px solid #E9E1CE;
            border-radius: 15px;
            background: linear-gradient(115deg, #FFFFFF 65%, #F3EBD5);
            box-shadow: 0 7px 25px rgba(16,43,85,.045);
        }

        .greeting::after {
            content: "";
            position: absolute;
            width: 145px;
            height: 145px;
            right: -35px;
            top: -45px;
            border: 1px solid rgba(190,155,65,.25);
            transform: rotate(45deg);
            border-radius: 25px;
        }

        .greeting h1 {
            position: relative;
            z-index: 1;
            margin: 0 0 12px;
            color: #102B55;
        font-family: 'Segoe UI', Arial, sans-serif;
            font-size: 29px;
            font-weight: 600;
            line-height: 1.35;
        }

        .greeting p {
            position: relative;
            z-index: 1;
            max-width: 650px;
            margin: 0;
            color: #657286;
            font-size: 13px;
            line-height: 1.9;
        }

        .section-heading {
            margin: 31px 0 16px;
            color: #102B55;
        font-family: 'Segoe UI', Arial, sans-serif;
            font-size: 21px;
            font-weight: 600;
        }

        .section-subtitle {
            margin: -8px 0 18px;
            color: #87909C;
            font-size: 12px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
        }

        .menu-card {
display: block;
min-height: 165px;
padding: 21px;
border: 1px solid #E9E2D3;
border-radius: 12px;
background: #FFFFFF;
color: #24344B;
text-decoration: none;
box-shadow: 0 3px 12px rgba(16,43,85,.025);
transition: transform .2s, box-shadow .2s, border-color .2s;
}

a.menu-card:hover {
            transform: translateY(-3px);
            border-color: #D9B64F;
            box-shadow: 0 9px 23px rgba(16,43,85,.075);
        }

        .menu-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 39px;
            height: 39px;
            margin-bottom: 14px;
            border-radius: 10px;
            background: #F5F0E2;
            color: #8A7440;
            font-size: 19px;
        }

        .menu-card h3 {
            margin: 0 0 8px;
            color: #102B55;
            font-size: 14px;
            font-weight: 700;
        }

        .menu-card p {
            margin: 0;
            color: #778292;
            font-size: 11px;
            line-height: 1.7;
        }

        .coming {
            display: inline-block;
            margin-top: 11px;
            padding: 5px 9px;
            border-radius: 20px;
            background: #F5F0E2;
            color: #8A7440;
            font-size: 9px;
        }

        .reminder {
            margin-top: 24px;
            padding: 22px;
            border: 1px solid rgba(217,182,79,.35);
            border-radius: 12px;
            background: linear-gradient(110deg, #102B55, #183D64);
            color: #F8F7F1;
            text-align: center;
        font-family: 'Segoe UI', Arial, sans-serif;
            line-height: 1.8;
        }

        .reminder strong {
            color: #EBD58F;
            font-size: 17px;
        }

        footer {
            margin-top: 30px;
            padding: 18px 0 8px;
            border-top: 1px solid #E7E1D3;
            color: #89919C;
            font-size: 10px;
            text-align: center;
            line-height: 1.9;
        }

        footer span {
            color: #A88728;
            font-weight: 700;
        }

        @media(max-width: 950px) {
            .sidebar { width: 220px; padding: 25px 14px; }
            .cards { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }

        @media(max-width: 620px) {
            .layout { display: block; }
            .sidebar { width: 100%; padding: 18px; }
            .brand { font-size: 25px; }
            .gold-line { margin: 15px 5px; }
            .nav-label, .sidebar-motto { display: none; }
            .sidebar nav { display: flex; flex-wrap: wrap; gap: 5px; }
            .nav-link { padding: 9px 10px; margin: 0; font-size: 11px; }
            .main { padding: 20px 15px; }
            .cards { grid-template-columns: 1fr; }
            .greeting { padding: 23px; }
            .greeting h1 { font-size: 24px; }
            .top-caption { font-size: 9px; }
            .account-name { font-size: 11px; }
        }

        @media(prefers-reduced-motion: reduce) {
            .marquee-text { animation-duration: 14s; }
            .menu-card { transition: none; }
        }
    </style>

<style id="nawara-murid-design">
:root {
    --navy:#102855;
    --blue:#183D64;
    --gold:#D9B64F;
    --gold-light:#EBD58F;
    --ivory:#F8F7F1;
    --muted:#718096;
    --line:#e9e6de;
}
* { box-sizing:border-box; }
body {
    background:var(--ivory) !important;
    color:var(--navy) !important;
    font-family:'Segoe UI',Arial,sans-serif !important;
}
.layout { display:flex; min-height:100vh; }
.sidebar {
    width:250px !important;
    flex-shrink:0;
    padding:28px 19px !important;
    color:white;
    background:
      radial-gradient(circle at 15px 15px,rgba(217,182,79,.10) 1px,transparent 1.5px),
      linear-gradient(160deg,#102855,#0b2142) !important;
    background-size:22px 22px,auto !important;
}
.sidebar-inner {
    min-height:calc(100vh - 56px);
    display:flex;
    flex-direction:column;
}
.brand {
    text-align:center;
    padding:12px 0 5px;
    color:white !important;
    font-size:32px !important;
    font-weight:800;
    letter-spacing:5px;
}
.brand-sub {
    text-align:center;
    color:var(--gold-light) !important;
    font-size:9px;
    letter-spacing:1.8px;
    margin-top:5px;
}
.gold-line {
    height:1px;
    background:#d9b64f80;
    margin:18px 0 12px;
}
.nav-label {
    color:var(--gold) !important;
    font-size:10px;
    letter-spacing:2px;
    margin:22px 10px 9px;
}
.sidebar nav { display:block; }
.nav-link {
    display:flex;
    align-items:center;
    gap:10px;
    width:100%;
    padding:12px 13px !important;
    margin:4px 0;
    color:#e7edf5 !important;
    text-decoration:none;
    font-size:12px;
    border:1px solid transparent !important;
    border-radius:9px;
    background:transparent;
    text-align:left;
}
.nav-link:hover,.nav-link.active {
    background:#ffffff13 !important;
    color:var(--gold-light) !important;
    border-color:#ffffff18 !important;
}
.nav-icon {
    width:6px;
    height:6px;
    flex:0 0 6px;
    border-radius:50%;
    background:#9baec5;
}
.nav-link.active .nav-icon { background:var(--gold); }
.sidebar-motto {
    margin-top:auto !important;
    padding-top:25px;
    color:var(--gold-light) !important;
    text-align:center;
    font-size:11px;
    line-height:1.8;
}
.main {
    flex:1;
    min-width:0;
    padding:32px 36px 25px !important;
}
.topbar {
    display:flex;
    justify-content:space-between;
    align-items:center;
    flex-wrap:wrap;
    gap:15px;
    margin-bottom:22px;
}
.top-caption {
    color:#a17e24 !important;
    font-size:10px;
    font-weight:800;
    letter-spacing:2px;
}
.account {
    display:flex;
    align-items:center;
    flex-wrap:wrap;
    gap:12px;
}
.account-name {
    color:var(--navy);
    font-size:12px;
    font-weight:700;
}
.account-link {
    display:inline-block;
    padding:10px 16px;
    background:white;
    color:var(--navy) !important;
    border:1px solid #e8dfc8;
    border-radius:9px;
    text-decoration:none;
    font-size:11px;
    font-weight:700;
}
.account-link:hover { border-color:var(--gold); }
.pearl-panel {
    padding:22px 25px !important;
    margin-bottom:22px;
    color:white !important;
    background:linear-gradient(115deg,#102855,#183064 65%,#285783) !important;
    border-radius:16px !important;
    box-shadow:0 12px 28px #102b5520;
}
.pearl-heading {
    color:var(--gold-light) !important;
    font-size:10px;
    font-weight:800;
    letter-spacing:2px;
    margin-bottom:10px;
}
.marquee-text { color:white !important; }
.greeting {
    padding:25px 28px;
    margin-bottom:25px;
    background:white;
    border:1px solid var(--line);
    border-left:4px solid var(--gold);
    border-radius:13px;
}
.greeting h1 {
    color:var(--navy) !important;
    font-size:25px;
    line-height:1.4;
    margin:0 0 10px;
}
.greeting p {
    color:var(--muted);
    font-size:13px;
    line-height:1.8;
}
.section-heading {
    color:var(--navy) !important;
    font-size:19px;
    font-weight:800;
    margin:25px 0 8px;
}
.section-subtitle {
    color:var(--muted);
    font-size:12px;
    margin-bottom:16px;
}
.cards {
    display:grid;
    grid-template-columns:repeat(3,minmax(0,1fr));
    gap:16px;
}
.menu-card {
    display:block;
    min-width:0;
    padding:21px;
    color:var(--navy) !important;
    background:white !important;
    border:1px solid var(--line) !important;
    border-radius:13px !important;
    text-decoration:none !important;
    box-shadow:0 5px 16px #102b5508;
    transition:.2s;
}
.menu-card:hover {
    transform:translateY(-3px);
    border-color:var(--gold) !important;
    box-shadow:0 9px 22px #102b5512;
}
.menu-card h3 {
    color:var(--navy) !important;
    font-size:15px;
    margin:12px 0 8px;
}
.menu-card p {
    color:var(--muted) !important;
    font-size:12px;
    line-height:1.7;
}
.menu-icon {
    width:36px;
    height:36px;
    border-radius:10px;
    background:#f7f2e3;
}
.coming {
    display:inline-block;
    margin-top:8px;
    color:#a17e24;
    font-size:10px;
    font-weight:700;
}
.reminder {
    margin-top:25px;
    padding:20px 23px;
    color:var(--navy);
    background:#f7f2e3;
    border:1px solid #e8dfc8;
    border-radius:12px;
    font-size:12px;
    line-height:1.8;
}
.reminder strong { color:#a17e24; }
footer {
    margin-top:28px;
    color:var(--muted);
    text-align:center;
    font-size:10px;
}
@media(max-width:900px) {
    .cards { grid-template-columns:repeat(2,minmax(0,1fr)); }
    .main { padding:25px 20px !important; }
}
@media(max-width:600px) {
    .layout { display:block; }
    .sidebar { width:100% !important; padding:18px !important; }
    .sidebar-inner { min-height:0; }
    .sidebar-motto { margin-top:18px !important; }
    .main { padding:22px 15px !important; }
    .cards { grid-template-columns:1fr; }
    .greeting { padding:20px; }
    .greeting h1 { font-size:21px; }
}

.top-intro { min-width:0; flex:1; }
.top-intro h1 { color:var(--navy); font-size:25px; line-height:1.35; margin:7px 0; }
.top-sub { color:var(--muted); font-size:12px; line-height:1.7; max-width:680px; margin:0; }
@media(max-width:600px) { .top-intro h1 { font-size:21px; } }
</style>

</head>

<body>
<div class="layout">

    <aside class="sidebar">
        <div class="sidebar-inner">
            <div class="brand">NAWARA</div>
            <div class="brand-sub">STUDENT CARE &amp; PROTECTION</div>
            <div class="gold-line"></div>

            <div class="nav-label">MENU UTAMA</div>
            <nav>
                <a href="{{ url('/dashboard') }}" class="nav-link active">
                    <span class="nav-icon">⌂</span> Dashboard
                </a>
                <a href="{{ url('/murid/pengaduan') }}" class="nav-link">
                    <span class="nav-icon">▤</span> Pengaduan
                </a>
                <a href="{{ url('/murid/riwayat-pengaduan') }}" class="nav-link">
                    <span class="nav-icon">◷</span> Pantau Laporan
                </a>
                <a href="{{ url('/profile') }}" class="nav-link">
                    <span class="nav-icon">♙</span> Profil &amp; Pengaturan
                </a>
            </nav>

            <div class="nav-label">AKUN</div>
            <nav>
                <a href="{{ url('/profile') }}" class="nav-link">
                    <span class="nav-icon">⚙</span> Pengaturan Akun
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav-link"
                        style="width:100%;background:transparent;border:1px solid transparent;text-align:left;cursor:pointer;font-family:inherit;">
                        <span class="nav-icon">⇥</span> Keluar / Logout
                    </button>
                </form>
            </nav>

            <div style="color:#ffffff;font-size:12px;font-weight:600;letter-spacing:.3px;margin-top:12px;margin-bottom:10px;line-height:1.6;">
    SMP Islam Al Azhar 52 Bengkulu
</div>
<div class="sidebar-motto">
                Setiap Anak Berharga<br>
                Setiap Suara Bermakna
            </div>
        </div>
    </aside>

    <main class="main">
        <div class="topbar">
    <div class="top-intro">
        <div class="top-caption">NAWARA · STUDENT CARE &amp; PROTECTION</div>
        <h1>Sistem Perlindungan dan Pendampingan Murid</h1>
        <p class="top-sub">Pusat layanan untuk menerima aspirasi, menangani pengaduan, dan mewujudkan lingkungan sekolah yang aman, peduli, serta bebas perundungan.</p>
    </div>
    <a class="account-link" href="{{ url('/profile') }}">Profil Saya</a>
</div>

<section class="pearl-panel">
            <div class="pearl-heading">MUTIARA ISLAMI</div>
            <div class="marquee-window">
                <div class="marquee-text" id="pearlText">
                    Jagalah lisan, hormati sesama, dan tebarkan kebaikan.
                </div>
            </div>
        </section>

        <section class="greeting">
            <h1>Assalamu'alaikum,<br>{{ Auth::user()->name }}!</h1>
            <p>
                Selamat datang di NAWARA. Tempat yang aman untuk berbagi,
                mendapatkan pendampingan, dan bertumbuh menjadi pribadi
                yang berakhlak mulia.
            </p>
        </section>

        <h2 class="section-heading">Layanan NAWARA</h2>
        <p class="section-subtitle">
            Pilih layanan yang sesuai dengan kebutuhanmu.
        </p>

        <section class="cards">
<a href="{{ url('/murid/pengaduan') }}" class="menu-card">
<div class="menu-icon"></div>
<h3>Pengaduan</h3>
<p>Sampaikan laporan jika mengalami atau menyaksikan perundungan.</p>
</a>
<a href="{{ route('murid.stories.index') }}" class="menu-card">
<div class="menu-icon"></div>
<h3>Ruang Cerita</h3>
<p>Tempat aman untuk mencurahkan perasaan dan berbagi cerita.</p>
</a>
<a href="{{ route('consultations.index') }}" class="menu-card">
<div class="menu-icon"></div>
<h3>Konsultasi Guru BK</h3>
<p>Dapatkan pendampingan dan bantuan dari Guru BK.</p>
</a>
<a href="{{ url('/murid/riwayat-pengaduan') }}" class="menu-card">
<div class="menu-icon"></div>
<h3>Pantau Laporan</h3>
<p>Pantau perkembangan laporan yang telah kamu sampaikan.</p>
</a>
<a href="{{ route('violations.index') }}" class="menu-card">
<div class="menu-icon"></div>
<h3>Catatan Pelanggaran &amp; Pembinaan</h3>
<p>Lihat catatan pelanggaran dan proses pembinaanmu.</p>
<span class="menu-arrow">Buka catatan</span>
</a>
<a href="{{ route('character-notes.index') }}" class="menu-card">
<div class="menu-icon"></div>
<h3>Adab &amp; Akhlak</h3>
<p>Bangun kebiasaan baik dan tumbuhkan akhlak terpuji.</p>
<span class="menu-arrow">Buka layanan</span>
</a>
<a href="{{ route('education.index') }}" class="menu-card">
<div class="menu-icon"></div>
<h3>Edukasi Anti-Perundungan</h3>
<p>Pelajari cara mengenali dan mencegah tindakan perundungan.</p>
<span class="menu-arrow">Buka edukasi</span>
</a>
</section>

        <section class="reminder">
            <strong>Ingat, Kamu Berharga!</strong><br>
            Jangan takut untuk bercerita. Suaramu penting dan layak didengar.
        </section>

        <footer>
            © 2026 NAWARA. All Rights Reserved.<br>
            Designed &amp; Developed by <span>Renaldi</span>
        </footer>
    </main>
</div>

<script>
    const pearls = [
        'Jagalah lisan, hormati sesama, dan tebarkan kebaikan.',
        'QS. Al-Hujurat: 11 — Jangan saling mengolok-olok.',
        'Berkatalah yang baik atau diam. — HR. Bukhari dan Muslim',
        'QS. Al-Isra: 53 — Ucapkanlah perkataan yang lebih baik.',
        'Saling menghormati adalah awal dari persaudaraan.',
        'Jadilah pribadi yang membawa ketenangan bagi sesama.'
    ];

    let pearlIndex = 0;
    const pearlText = document.getElementById('pearlText');

    function changePearl() {
        pearlIndex = (pearlIndex + 1) % pearls.length;
        pearlText.style.animation = 'none';
        pearlText.textContent = pearls[pearlIndex];

        void pearlText.offsetWidth;
        pearlText.style.animation = 'pearlMove 18s linear forwards';
    }

    setInterval(changePearl, 18000);
</script>
</body>
</html>
