
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>NAWARA - Sistem Perlindungan dan Pendampingan Murid</title>
<style>
:root {
    --navy:#102B55;
    --blue:#183D64;
    --blue2:#285783;
    --gold:#D9B64F;
    --gold-light:#EBD58F;
    --ivory:#F8F7F1;
    --muted:#718096;
    --line:#e9e6de;
}
*{box-sizing:border-box}
body{
    margin:0;background:var(--ivory);
    font-family:'Segoe UI',Arial,sans-serif;color:var(--navy);
}
.layout{display:flex;min-height:100vh}

/* SIDEBAR */
.sidebar{
    width:250px;flex-shrink:0;color:white;padding:28px 19px;
    display:flex;flex-direction:column;
    background:
      radial-gradient(circle at 15px 15px,rgba(217,182,79,.10) 1px,transparent 1.5px),
      linear-gradient(160deg,#102B55,#0b2142);
    background-size:22px 22px,auto;
}
.brand{text-align:center;padding:12px 0 23px;border-bottom:1px solid #d9b64f80}
.brand-name{font-size:32px;font-weight:800;letter-spacing:5px}
.brand-sub{font-size:9px;letter-spacing:1.8px;color:var(--gold-light);margin-top:5px}
.school{text-align:center;font-size:11px;line-height:1.8;color:var(--gold-light);margin:20px 0}
.school strong{display:block;color:white;font-size:12px;margin-bottom:6px}
.school span{display:block}
.nav-label{font-size:10px;color:var(--gold);letter-spacing:2px;margin:22px 10px 9px}
.nav-link{
    display:flex;align-items:center;gap:10px;padding:12px 13px;
    color:#e7edf5;text-decoration:none;border-radius:9px;
    margin:4px 0;font-size:12px;transition:.2s;
    border:1px solid transparent;
}
.nav-link:hover,.nav-link.active{
    background:#ffffff13;color:var(--gold-light);
    border-color:#ffffff18;
}
.nav-mark{width:6px;height:6px;border-radius:50%;background:#9baec5;flex-shrink:0}
.nav-link.active .nav-mark{background:var(--gold);box-shadow:0 0 0 4px #d9b64f20}
.sidebar-bottom{margin-top:auto;text-align:center;font-size:10px;color:#d9dfea}
.sidebar-bottom button{
    width:100%;padding:11px;border:1px solid #d9b64f99;
    background:#ffffff08;color:var(--gold-light);border-radius:8px;
    margin-top:12px;font-weight:700;cursor:pointer;
    transition:.2s;
}
.sidebar-bottom button:hover{background:#d9b64f18}

/* KONTEN UTAMA */
.main{flex:1;min-width:0;padding:32px 36px 25px}
.top{
    display:flex;justify-content:space-between;align-items:center;
    gap:15px;flex-wrap:wrap;margin-bottom:22px;
}
.eyebrow{font-size:10px;letter-spacing:2px;color:#a17e24;font-weight:800;margin-bottom:7px}
.top h1{font-size:25px;margin:0;line-height:1.35}
.top-sub{font-size:12px;color:var(--muted);margin-top:7px;line-height:1.7;max-width:680px}
.profile{
    background:white;padding:10px 16px;border-radius:9px;
    color:var(--navy);text-decoration:none;font-size:11px;
    font-weight:700;border:1px solid #e8dfc8;
}
.profile:hover{border-color:var(--gold)}

/* HERO */
.hero{
    position:relative;overflow:hidden;border-radius:18px;
    padding:31px 32px;color:white;
    background:linear-gradient(115deg,#102B55 0%,#183D64 65%,#285783 100%);
    box-shadow:0 12px 28px #102b5520;
}
.hero:before{
    content:"";position:absolute;width:260px;height:260px;
    border:1px solid #ffffff18;border-radius:50%;
    right:-65px;top:-115px;
    box-shadow:0 0 0 24px #ffffff08,0 0 0 48px #ffffff05;
}
.hero:after{
    content:"۞";position:absolute;right:48px;bottom:-43px;
    font-size:150px;color:#ffffff0c;
}
.hero-content{position:relative;z-index:1;max-width:650px}
.hero-kicker{
    display:inline-block;color:var(--gold-light);
    font-size:10px;font-weight:800;letter-spacing:2px;
    border:1px solid #ebd58f55;border-radius:20px;
    padding:6px 11px;margin-bottom:15px;
}
.hero h2{font-size:25px;margin:0 0 10px;line-height:1.4}
.hero p{font-size:12px;line-height:1.9;color:#e5edf6;margin:0;max-width:560px}
.hero-line{width:48px;height:3px;background:var(--gold);margin-top:20px;border-radius:4px}

/* INSPIRASI */
.pearl{
    margin-top:18px;padding:17px 20px;background:#fff;
    border:1px solid var(--line);border-left:4px solid var(--gold);
    border-radius:12px;display:flex;align-items:center;gap:16px;
    box-shadow:0 4px 14px #102b5507;
}
.pearl-symbol{
    width:40px;height:40px;display:flex;align-items:center;
    justify-content:center;border-radius:12px;flex-shrink:0;
    background:#f8f3e5;color:#a17e24;font-size:21px;
}
.quote-label{font-size:9px;font-weight:800;letter-spacing:1.7px;color:#a17e24;margin-bottom:5px}
.pearl-text{font-size:12px;line-height:1.7;color:var(--navy)}

/* STATISTIK */
.stats{
    display:grid;grid-template-columns:repeat(2,minmax(0,1fr));
    gap:16px;margin:22px 0 27px;
}
.stat{
    background:white;padding:19px 21px;border:1px solid var(--line);
    border-radius:13px;position:relative;overflow:hidden;
    box-shadow:0 5px 16px #102b5508;
}
.stat:after{
    content:"";position:absolute;right:0;top:0;width:4px;height:100%;
    background:var(--gold);
}
.stat-top{display:flex;align-items:center;justify-content:space-between;gap:10px}
.stat-label{font-size:11px;color:var(--muted);font-weight:600}
.stat-icon{
    width:34px;height:34px;border-radius:10px;background:#f7f2e3;
    display:flex;align-items:center;justify-content:center;color:#a17e24;
}
.stat-icon svg{width:19px;height:19px;stroke:currentColor;fill:none;stroke-width:1.7}
.stat-number{font-size:31px;font-weight:800;color:var(--navy);margin-top:8px}
.stat-note{font-size:10px;color:#8993a1;margin-top:2px}

/* MENU */
.section-heading{
    display:flex;justify-content:space-between;align-items:end;
    gap:12px;margin:0 0 14px;
}
.section-title{font-size:17px;margin:0}
.section-desc{font-size:11px;color:var(--muted);margin-top:5px}
.section-tag{font-size:9px;color:#a17e24;letter-spacing:1px;font-weight:800}

.menus{
display:grid;
grid-template-columns:repeat(3,minmax(0,1fr));
gap:11px;
}
.menu-card{
display:flex;
flex-direction:column;
min-width:0;
min-height:125px;
padding:14px;
border-radius:11px;
border:1px solid var(--line);
background:#fff;
position:relative;
overflow:hidden;
text-decoration:none;
box-shadow:0 3px 10px #102b5508;
transition:.2s;
}
.menu-card:before{
content:"";
position:absolute;
left:0;
top:0;
width:100%;
height:2px;
background:linear-gradient(90deg,var(--gold),#ebd58f50);
}
.menu-card:hover{
transform:translateY(-2px);
border-color:#d9b64f;
}
.menu-no{
font-size:9px;
color:#b18c32;
font-weight:800;
letter-spacing:1px;
margin-bottom:9px;
}
.menu-card h3{
font-size:12px;
line-height:1.45;
color:var(--navy);
margin:0 0 5px;
}
.menu-card p{
font-size:10px;
line-height:1.55;
color:var(--muted);
margin:0;
}
.menu-arrow{
display:inline-block;
margin-top:auto;
padding-top:10px;
font-size:9px;
font-weight:700;
color:#a17e24;
}
@media(max-width:700px){
.menus{grid-template-columns:repeat(2,minmax(0,1fr));gap:9px;}
.menu-card{padding:12px;min-height:120px;}
}
@media(max-width:390px){
.menus{grid-template-columns:1fr;}
}
/* PENGADUAN TERBARU */
.recent{
    background:white;border:1px solid var(--line);border-radius:14px;
    padding:20px;margin-top:22px;box-shadow:0 5px 16px #102b5508;
}
.recent-head{display:flex;justify-content:space-between;align-items:center;gap:10px;margin-bottom:7px}
.recent-head .section-title{font-size:15px}
.recent-item{
    display:flex;justify-content:space-between;align-items:center;
    gap:12px;padding:13px 0;border-bottom:1px solid #f0eee8;font-size:11px;
}
.recent-item:last-child{border-bottom:0}
.status{
    color:#96721d;background:#fbf6e7;padding:5px 9px;
    border-radius:20px;font-size:10px;font-weight:700;white-space:nowrap;
}
.empty{font-size:11px;color:var(--muted);padding:10px 0}
footer{text-align:center;font-size:10px;color:#8993a1;margin-top:30px;line-height:2}
footer span{color:#b08b24;font-weight:700}

/* RESPONSIVE */
@media(max-width:900px){
    .main{padding:25px 22px}
    .sidebar{width:225px}
}
@media(max-width:700px){
    .layout{display:block}
    .sidebar{width:100%;padding:14px}
    .brand{padding:5px 0 13px}
    .brand-name{font-size:27px}
    .school{margin:10px}
    .sidebar nav{display:flex;flex-wrap:wrap;gap:4px}
    .nav-label{width:100%;margin:12px 5px 3px}
    .nav-link{padding:9px 10px;font-size:11px}
    .sidebar-bottom{margin-top:12px;display:flex;justify-content:flex-end}
    .sidebar-bottom form{width:auto}
    .sidebar-bottom button{width:auto;min-width:125px;padding:8px 14px;margin-top:0;font-size:11px}
    .main{padding:20px 15px}
    .top h1{font-size:20px}
    .hero{padding:25px 21px}
    .hero h2{font-size:21px}
    .hero:after{right:8px;font-size:110px}
    .pearl{padding:14px}
}
@media(max-width:420px){
    .stats,.menus{grid-template-columns:1fr}
    .section-tag{display:none}
    .recent-item{align-items:flex-start;flex-direction:column;gap:7px}
}
@media(prefers-reduced-motion:reduce){
    *,*:before,*:after{scroll-behavior:auto!important;transition:none!important}
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
        <a href="{{ route('guru-bk.dashboard') }}" class="nav-link active"><span class="nav-mark"></span>Dashboard</a>
        <a href="{{ route('guru-bk.reports') }}" class="nav-link"><span class="nav-mark"></span>Daftar Pengaduan</a>
        <a href="{{ route('guru-bk.follow-ups') }}" class="nav-link"><span class="nav-mark"></span>Tindak Lanjut</a>
        <a href="{{ route('guru-bk.stories.index') }}" class="nav-link"><span class="nav-mark"></span>Ruang Cerita</a>

        <a href="{{ route('guru-bk.student-verification.index') }}" class="nav-link"><span class="nav-mark"></span>Verifikasi Pendaftaran Murid</a>
        <div class="nav-label">AKUN</div>
        <a href="{{ route('profile.edit') }}" class="nav-link"><span class="nav-mark"></span>Profil Saya</a>
    <a href="{{ route('guru-bk.academic-years.index') }}" class="nav-link"><span class="nav-mark"></span>Tahun Ajaran &amp; Kelas</a>
<a href="{{ route('guru-bk.students.index') }}" class="nav-link"><span class="nav-mark"></span>Data Murid</a>
<a href="{{ route('guru-bk.student-import.index') }}" class="nav-link"><span class="nav-mark"></span>Impor Data Murid</a>
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
            <div class="eyebrow">NAWARA · STUDENT CARE &amp; PROTECTION</div>
            <h1>Sistem Perlindungan dan Pendampingan Murid</h1>
            <div class="top-sub">
                Pusat layanan untuk menerima aspirasi, menangani pengaduan,
                dan mewujudkan lingkungan sekolah yang aman, peduli, serta bebas perundungan.
            </div>
        </div>
        <a href="{{ route('profile.edit') }}" class="profile">Profil Saya</a>
    </div>

    <section class="hero">
        <div class="hero-content">
            <div class="hero-kicker">LAYANAN PERLINDUNGAN &amp; PENDAMPINGAN</div>
            <h2>Assalamu'alaikum, {{ auth()->user()->name }}</h2>
            <p>Setiap anak berharga. Setiap cerita layak didengar. Bersama NAWARA, mari hadirkan lingkungan sekolah yang aman, peduli, dan penuh kasih.</p>
            <div class="hero-line"></div>
        </div>
    </section>

    <section class="pearl">
        <div class="pearl-symbol">۞</div>
        <div>
            <div class="quote-label">MUTIARA ISLAMI &amp; INSPIRASI</div>
            <div class="pearl-text" id="pearlText">“Sebaik-baik manusia adalah yang paling bermanfaat bagi manusia lainnya.”</div>
        </div>
    </section>

    <div class="stats">
        <div class="stat">
            <div class="stat-top">
                <div class="stat-label">Total Pengaduan</div>
                <div class="stat-icon">
                    <svg viewBox="0 0 24 24"><path d="M5 4h14v16H5z"/><path d="M8 8h8M8 12h8M8 16h5"/></svg>
                </div>
            </div>
            <div class="stat-number">{{ $totalReports }}</div>
            <div class="stat-note">Seluruh laporan yang tercatat</div>
        </div>
        <div class="stat">
            <div class="stat-top">
                <div class="stat-label">Pengaduan Menunggu</div>
                <div class="stat-icon">
                    <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
                </div>
            </div>
            <div class="stat-number">{{ $pendingReports }}</div>
            <div class="stat-note">Laporan yang memerlukan perhatian</div>
        </div>
    </div>

    <div class="section-heading">
        <div>
            <h2 class="section-title">Layanan Perlindungan Murid</h2>
            <div class="section-desc">Pilih layanan untuk melanjutkan aktivitas perlindungan dan pendampingan.</div>
        </div>
        <div class="section-tag">PUSAT LAYANAN</div>
    </div>

    <div class="menus">
<a href="{{ route('guru-bk.reports') }}" class="menu-card">
<span class="menu-no">01</span>
<h3>Daftar Pengaduan</h3>
<p>Lihat laporan yang disampaikan Murid.</p>
<span class="menu-arrow">Buka layanan →</span>
</a>
<a href="{{ route('guru-bk.follow-ups') }}" class="menu-card">
<span class="menu-no">02</span>
<h3>Tindak Lanjut</h3>
<p>Kelola penanganan dan perkembangan laporan.</p>
<span class="menu-arrow">Buka layanan →</span>
</a>
<a href="{{ route('guru-bk.stories.index') }}" class="menu-card">
<span class="menu-no">03</span>
<h3>Ruang Cerita</h3>
<p>Dengarkan cerita dan tanggapi dengan empati.</p>
<span class="menu-arrow">Buka layanan →</span>
</a>
<a href="{{ url('/guru-bk/rekap-pdf') }}" class="menu-card">
<span class="menu-no">04</span>
<h3>Rekap Pengaduan</h3>
<p>Lihat dan unduh rekapitulasi laporan.</p>
<span class="menu-arrow">Buka layanan →</span>
</a>
<a href="{{ route('guru-bk.violations.index') }}" class="menu-card">
<span class="menu-no">05</span>
<h3>Catatan Pelanggaran &amp; Pembinaan</h3>
<p>Pencatatan pelanggaran dan pembinaan Murid.</p>
<span class="menu-arrow">Buka layanan →</span>
</a>
<a href="{{ route('guru-bk.character-notes.index') }}" class="menu-card">
<span class="menu-no">06</span>
<h3>Adab &amp; Akhlak</h3>
<p>Catat perkembangan karakter Murid.</p>
<span class="menu-arrow">Buka layanan →</span>
</a>
<a href="{{ route('education.index') }}" class="menu-card">
<span class="menu-no">07</span>
<h3>Edukasi Anti-Perundungan</h3>
<p>Materi pencegahan perundungan.</p>
<span class="menu-arrow">Buka edukasi →</span>
</a>
</div>

<section class="recent">
        <div class="recent-head">
            <h2 class="section-title">Pengaduan Terbaru</h2>
            <span class="section-tag">PEMANTAUAN</span>
        </div>

        @forelse($recentReports as $report)
            <div class="recent-item">
                <span>Pengaduan #{{ $report->id }} · {{ $report->created_at->format('d/m/Y') }}</span>
                <span class="status">{{ ucfirst(str_replace('_', ' ', $report->status)) }}</span>
            </div>
        @empty
            <div class="empty">Belum ada pengaduan terbaru.</div>
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
    if (el) el.textContent = pearls[pearlIndex];
}, 18000);
</script>
</body>
</html>
