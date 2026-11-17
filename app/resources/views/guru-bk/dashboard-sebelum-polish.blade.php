
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Pusat Layanan Guru BK - NAWARA</title>

<style>
:root {
    --navy: #102B55;
    --blue: #183D64;
    --gold: #D9B64F;
    --gold-light: #EBD58F;
    --ivory: #F8F7F1;
}

* {
    box-sizing: border-box;
}

body {
    margin: 0;
    background: var(--ivory);
    font-family: 'Segoe UI', Arial, sans-serif;
    color: var(--navy);
}

.layout {
    display: flex;
    min-height: 100vh;
}

/* SIDEBAR */
.sidebar {
    width: 250px;
    background:
        radial-gradient(circle at 15px 15px, rgba(217,182,79,.10) 1px, transparent 1.5px),
        var(--navy);
    background-size: 22px 22px;
    color: white;
    padding: 30px 20px;
    display: flex;
    flex-direction: column;
    flex-shrink: 0;
}

.brand {
    text-align: center;
    padding: 12px 0 25px;
    border-bottom: 2px solid var(--gold);
}

.brand-name {
    font-size: 32px;
    font-weight: 800;
    letter-spacing: 5px;
    color: white;
}

.brand-sub {
    font-size: 10px;
    letter-spacing: 2px;
    margin-top: 5px;
    color: var(--gold-light);
}

.school {
    font-size: 12px;
    text-align: center;
    line-height: 1.8;
    color: var(--gold-light);
    margin: 20px 0;
}

.school strong {
    display: block;
    color: white;
    font-size: 12px;
    margin-bottom: 9px;
}

.school span {
    display: block;
    color: var(--gold-light);
    font-size: 11px;
    letter-spacing: .4px;
}

.nav-label {
    font-size: 10px;
    color: var(--gold);
    letter-spacing: 2px;
    margin: 22px 10px 10px;
}

.nav-link {
    display: block;
    padding: 13px 14px;
    color: #e7edf5;
    text-decoration: none;
    border-radius: 9px;
    margin: 5px 0;
    font-size: 13px;
    transition: .2s ease;
}

.nav-link:hover,
.nav-link.active {
    background: #ffffff18;
    color: var(--gold-light);
}

.sidebar-bottom {
    margin-top: auto;
    font-size: 11px;
    color: #d9dfea;
    text-align: center;
}

.sidebar-bottom button {
    width: 100%;
    padding: 12px;
    border: 1px solid var(--gold);
    background: transparent;
    color: var(--gold-light);
    border-radius: 8px;
    margin-top: 12px;
    font-weight: 700;
    cursor: pointer;
}

/* KONTEN UTAMA */
.main {
    flex: 1;
    padding: 35px;
    min-width: 0;
}

.top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
    flex-wrap: wrap;
}

.top h1 {
    font-size: 25px;
    margin: 0;
    line-height: 1.4;
}

.profile {
    background: white;
    padding: 10px 16px;
    border-radius: 10px;
    color: var(--navy);
    text-decoration: none;
    font-size: 12px;
    font-weight: 700;
    border: 1px solid #e8dfc8;
}

/* MUTIARA ISLAMI */
.pearl {
    margin-top: 25px;
    background: white;
    border-left: 4px solid var(--gold);
    padding: 18px;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(16,43,85,.04);
}

.quote-label {
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 2px;
    color: #a17e24;
    margin-bottom: 12px;
}

.pearl-window {
    overflow: hidden;
}

.pearl-text {
    display: inline-block;
    white-space: nowrap;
    font-size: 13px;
    color: var(--navy);
    animation: pearlMove 18s linear infinite;
}

@keyframes pearlMove {
    from { transform: translateX(100%); }
    to { transform: translateX(-100%); }
}

/* HERO */
.hero {
    margin-top: 25px;
    padding: 28px;
    border-radius: 17px;
    background: linear-gradient(120deg, #102B55, #24517c);
    color: white;
    position: relative;
    overflow: hidden;
}

.hero:after {
    content: "۞";
    position: absolute;
    right: 25px;
    top: -35px;
    font-size: 150px;
    color: #ffffff0d;
}

.hero h2 {
    margin: 0 0 9px;
    font-size: 23px;
}

.hero p {
    margin: 0;
    color: var(--gold-light);
    font-size: 13px;
    line-height: 1.8;
}

/* STATISTIK */
.stats {
    display: grid;
    grid-template-columns: repeat(2, minmax(0,1fr));
    gap: 16px;
    margin: 22px 0;
}

.stat {
    background: white;
    padding: 21px;
    border-radius: 13px;
    border: 1px solid #eee;
    box-shadow: 0 4px 15px rgba(16,43,85,.04);
}

.stat-label {
    font-size: 12px;
    color: #718096;
}

.stat-number {
    font-size: 30px;
    font-weight: 800;
    color: var(--navy);
    margin-top: 8px;
}

/* KARTU MENU */
.section-title {
    font-size: 17px;
    margin: 28px 0 14px;
}

.menus {
    display: grid;
    grid-template-columns: repeat(2, minmax(0,1fr));
    gap: 16px;
}

.menu-card {
    display: block;
    text-decoration: none;
    background: white;
    padding: 22px;
    border-radius: 15px;
    border: 1px solid #e9e6de;
    border-top: 3px solid var(--gold);
    box-shadow: 0 5px 18px rgba(16,43,85,.05);
    transition: .25s ease;
}

.menu-card:hover {
    transform: translateY(-4px);
    border-color: var(--gold);
    box-shadow: 0 10px 25px rgba(16,43,85,.10);
}

/* IKON MENU */
.menu-icon {
    width: 54px;
    height: 54px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 16px;
    border-radius: 15px;
    background:
        radial-gradient(circle at 5px 5px, rgba(217,182,79,.18) 1px, transparent 1.5px),
        linear-gradient(145deg, #F8F7F1, #FFFFFF);
    background-size: 12px 12px, auto;
    border: 1px solid #e8dfc8;
    box-shadow: 0 4px 12px rgba(16,43,85,.07);
    position: relative;
}

.menu-icon svg {
    width: 27px;
    height: 27px;
    fill: none;
    stroke: var(--blue);
    stroke-width: 1.7;
    stroke-linecap: round;
    stroke-linejoin: round;
}

.menu-icon svg path:last-child {
    stroke: #C49B32;
}

.menu-card:hover .menu-icon {
    background-color: #fff8e5;
    border-color: var(--gold);
}

.menu-card h3 {
    font-size: 14px;
    color: var(--navy);
    margin: 0 0 7px;
}

.menu-card p {
    font-size: 11px;
    line-height: 1.7;
    color: #718096;
    margin: 0;
}

/* PENGADUAN TERBARU */
.recent {
    background: white;
    border-radius: 15px;
    padding: 20px;
    margin-top: 22px;
    border: 1px solid #e9e6de;
    border-top: 3px solid var(--gold);
    box-shadow: 0 5px 18px rgba(16,43,85,.05);
}

.recent-item {
    display: flex;
    justify-content: space-between;
    gap: 12px;
    padding: 13px 0;
    border-bottom: 1px solid #eee;
    font-size: 12px;
}

.recent-item:last-child {
    border-bottom: none;
}

.status {
    color: #a17e24;
    font-weight: 700;
}

footer {
    text-align: center;
    font-size: 10px;
    color: #8993a1;
    margin-top: 35px;
    line-height: 2;
}

footer span {
    color: #b08b24;
    font-weight: 700;
}

/* RESPONSIVE */
@media(max-width:700px) {
    .layout {
        display: block;
    }

    .sidebar {
        width: 100%;
        padding: 15px;
    }

    .brand {
        padding: 5px 0 15px;
    }

    .school {
        margin: 10px;
    }

    .sidebar nav {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
    }

    .nav-label {
        width: 100%;
        margin: 12px 5px 3px;
    }

    .nav-link {
        padding: 9px;
        font-size: 11px;
    }

    .sidebar-bottom {
        margin-top: 12px;
        display: flex;
        justify-content: flex-end;
    }

    .sidebar-bottom form {
        width: auto;
    }

    .sidebar-bottom button {
        width: auto;
        min-width: 125px;
        padding: 8px 14px;
        margin-top: 0;
        font-size: 11px;
    }

    .main {
        padding: 20px 15px;
    }

    .stats,
    .menus {
        grid-template-columns: 1fr 1fr;
    }

    .top h1 {
        font-size: 20px;
    }
}

@media(max-width:400px) {
    .stats,
    .menus {
        grid-template-columns: 1fr;
    }
}
</style>
</head>

<body>
<div class="layout">

<aside class="sidebar">
    <div class="brand">
        <div class="brand-name">NAWARA</div>
        <div class="brand-sub">STUDENT CARE &amp; PROTECTION</div>
    </div>

    <div class="school">
        <strong>SMP Islam Al Azhar 52 Bengkulu</strong>
        <span>Setiap Anak Berharga</span>
        <span>Setiap Suara Bermakna</span>
    </div>

    <nav>
        <div class="nav-label">MENU UTAMA</div>

        <a href="{{ route('guru-bk.dashboard') }}" class="nav-link active">Dashboard</a>
        <a href="{{ route('guru-bk.reports') }}" class="nav-link">Daftar Pengaduan</a>
        <a href="{{ route('guru-bk.follow-ups') }}" class="nav-link">Tindak Lanjut</a>
        <a href="{{ route('guru-bk.stories.index') }}" class="nav-link">Ruang Cerita</a>

        <div class="nav-label">AKUN</div>
        <a href="{{ route('profile.edit') }}" class="nav-link">Profil Saya</a>
    </nav>

    <div class="sidebar-bottom">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Keluar dari Akun</button>
        </form>
    </div>
</aside>

<main class="main">

    <div class="top">
        <div>
            <h1>Pusat Layanan dan Pendampingan Murid</h1>
        </div>
        <a href="{{ route('profile.edit') }}" class="profile">Profil Saya</a>
    </div>

    <section class="pearl">
        <div class="quote-label">MUTIARA ISLAMI &amp; INSPIRASI</div>
        <div class="pearl-window">
            <div class="pearl-text" id="pearlText">“Sebaik-baik manusia adalah yang paling bermanfaat bagi manusia lainnya.”</div>
        </div>
    </section>

    <section class="hero">
        <h2>Assalamu'alaikum, {{ auth()->user()->name }}</h2>
        <p>
            Setiap anak berharga. Setiap cerita layak didengar.<br>
            Bersama NAWARA, ciptakan lingkungan sekolah yang aman, peduli, dan penuh kasih.
        </p>
    </section>

    <div class="stats">
        <div class="stat">
            <div class="stat-label">Total Pengaduan</div>
            <div class="stat-number">{{ $totalReports }}</div>
        </div>

        <div class="stat">
            <div class="stat-label">Pengaduan Menunggu</div>
            <div class="stat-number">{{ $pendingReports }}</div>
        </div>
    </div>

    <h2 class="section-title">Layanan Guru BK</h2>

    <div class="menus">

        <a href="{{ route('guru-bk.reports') }}" class="menu-card">
            <div class="menu-icon">
                <svg viewBox="0 0 24 24">
                    <rect x="5" y="3" width="14" height="18" rx="2"/>
                    <path d="M9 8h6M9 12h6M9 16h4"/>
                </svg>
            </div>
            <h3>Daftar Pengaduan</h3>
            <p>Lihat laporan dan pengaduan dari Murid.</p>
        </a>

        <a href="{{ route('guru-bk.follow-ups') }}" class="menu-card">
            <div class="menu-icon">
                <svg viewBox="0 0 24 24">
                    <path d="M12 3 20 6v6c0 5-3.5 8-8 10-4.5-2-8-5-8-10V6z"/>
                    <path d="m8 12 3 3 5-6"/>
                </svg>
            </div>
            <h3>Tindak Lanjut</h3>
            <p>Kelola penanganan dan perkembangan laporan.</p>
        </a>

        <a href="{{ route('guru-bk.stories.index') }}" class="menu-card">
            <div class="menu-icon">
                <svg viewBox="0 0 24 24">
                    <path d="M4 5h16v12H9l-5 4z"/>
                    <path d="M8 10h8M8 13h5"/>
                </svg>
            </div>
            <h3>Ruang Cerita</h3>
            <p>Dengarkan cerita Murid dan berikan tanggapan penuh empati.</p>
        </a>

        <a href="{{ url('/guru-bk/rekap-pdf') }}" class="menu-card">
            <div class="menu-icon">
                <svg viewBox="0 0 24 24">
                    <path d="M4 19V5M4 19h17"/>
                    <path d="m7 15 4-4 3 2 6-7"/>
                </svg>
            </div>
            <h3>Rekap Pengaduan</h3>
            <p>Lihat dan unduh rekapitulasi laporan.</p>
        </a>

    </div>

    <section class="recent">
        <h2 class="section-title" style="margin-top:0">Pengaduan Terbaru</h2>

        @forelse($recentReports as $report)
            <div class="recent-item">
                <span>Pengaduan #{{ $report->id }} · {{ $report->created_at->format('d/m/Y') }}</span>
                <span class="status">{{ ucfirst(str_replace('_', ' ', $report->status)) }}</span>
            </div>
        @empty
            <p style="font-size:12px;color:#718096">Belum ada pengaduan terbaru.</p>
        @endforelse
    </section>

    <footer>
        © 2026 NAWARA. All Rights Reserved.<br>
        Designed &amp; Developed by <span>Renaldi</span>
    </footer>

</main>
</div>

<script>
const pearls = [
    '“Sebaik-baik manusia adalah yang paling bermanfaat bagi manusia lainnya.”',
    '“Allah tidak membebani seseorang melainkan sesuai kesanggupannya.”',
    '“Jangan pernah meremehkan kebaikan sekecil apa pun.”',
    '“Ilmu adalah cahaya yang menerangi perjalanan kehidupan.”',
    '“Kata-kata yang baik adalah sedekah.”',
    '“Keberanian dimulai saat kita berani bercerita dan meminta pertolongan.”',
    '“Saling menghormati menjadikan persahabatan semakin berarti.”'
];

let pearlIndex = 0;

setInterval(() => {
    pearlIndex = (pearlIndex + 1) % pearls.length;
    const el = document.getElementById('pearlText');

    if (el) {
        el.textContent = pearls[pearlIndex];
    }
}, 18000);
</script>

</body>
</html>
