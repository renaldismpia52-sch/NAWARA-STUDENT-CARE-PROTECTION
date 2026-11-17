
@extends('layouts.app')

@section('content')
<style>

    .campaign-page {
        max-width: 1100px;
        margin: 20px auto;
        padding: 0 16px 40px;
        color: #26364d;
    }
    .campaign-header {
        background: linear-gradient(120deg,#102855,#183D64);
        color: white;
        padding: 20px 25px;
        border-bottom: 4px solid #D9B64F;
        border-radius: 14px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
    }
    .campaign-header h1 {
        margin: 0;
        letter-spacing: 3px;
        font-size: 25px;
    }
    .campaign-header a {
        color: white;
        border: 1px solid #EBD58F;
        padding: 8px 13px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 12px;
    }
    .campaign-hero {
        margin-top: 22px;
        padding: 55px 25px;
        border-radius: 18px;
        text-align: center;
        color: white;
        background:
            radial-gradient(circle at 85% 20%,rgba(217,182,79,.23),transparent 28%),
            linear-gradient(135deg,#102855,#183D64);
        border: 1px solid #D9B64F;
    }
    .campaign-tag {
        display: inline-block;
        color: #EBD58F;
        border: 1px solid #D9B64F;
        border-radius: 30px;
        padding: 7px 15px;
        font-size: 11px;
        letter-spacing: 2px;
        font-weight: 700;
    }
    .campaign-hero h2 {
        font-size: clamp(28px,5vw,46px);
        line-height: 1.2;
        font-weight: 900;
        margin: 20px 0 12px;
    }
    .campaign-hero h2 span { color: #EBD58F; }
    .campaign-hero p {
        max-width: 650px;
        margin: auto;
        line-height: 1.8;
        color: #e5ebf4;
    }
    .campaign-section { margin-top: 38px; }
    .campaign-title {
        color: #102855;
        font-size: 23px;
        font-weight: 800;
        margin-bottom: 8px;
    }
    .campaign-subtitle {
        color: #718096;
        margin-bottom: 20px;
        line-height: 1.7;
    }
    .campaign-grid {
        display: grid;
        grid-template-columns: repeat(4,minmax(0,1fr));
        gap: 14px;
    }
    .campaign-card {
        background: white;
        border: 1px solid #e7eaf0;
        border-radius: 14px;
        padding: 20px 16px;
        box-shadow: 0 5px 18px rgba(16,40,85,.05);
        height: 100%;
    }
    .campaign-icon {
        width: 53px;
        height: 53px;
        border-radius: 14px;
        background: #f8f3e5;
        display: grid;
        place-items: center;
        font-size: 27px;
        margin-bottom: 15px;
    }
    .campaign-card h4 {
        color: #102855;
        font-weight: 800;
        font-size: 16px;
    }
    .campaign-card p {
        color: #718096;
        font-size: 13px;
        line-height: 1.7;
        margin: 0;
    }
    .kindness-box {
        background: #F8F7F1;
        border: 1px solid #eee6d2;
        padding: 25px;
        border-radius: 16px;
    }
    .kindness-list {
        display: grid;
        grid-template-columns: repeat(2,minmax(0,1fr));
        gap: 13px;
    }
    .kindness-item {
        background: white;
        border-radius: 10px;
        padding: 14px;
        display: flex;
        gap: 12px;
        align-items: flex-start;
        font-size: 13px;
        line-height: 1.6;
    }
    .kindness-item span { font-size: 22px; }
    .pledge-box {
        margin-top: 38px;
        padding: 35px 22px;
        border-radius: 18px;
        text-align: center;
        background: linear-gradient(135deg,#102855,#183D64);
        color: white;
        border-bottom: 5px solid #D9B64F;
    }
    .pledge-box h3 {
        color: #EBD58F;
        font-weight: 900;
        font-size: 25px;
    }
    .pledge-box p {
        max-width: 650px;
        margin: 12px auto;
        color: #e5ebf4;
        line-height: 1.8;
    }
    .pledge-count {
        font-size: 35px;
        font-weight: 900;
        color: #EBD58F;
        margin: 15px 0 3px;
    }
    .pledge-button {
        display: inline-block;
        margin-top: 17px;
        padding: 12px 23px;
        border: 0;
        border-radius: 9px;
        background: #D9B64F;
        color: #102855;
        font-weight: 800;
        cursor: pointer;
    }
    .pledge-button:disabled {
        background: #d7dfd9;
        color: #365344;
        cursor: default;
    }
    .help-grid {
        display: grid;
        grid-template-columns: repeat(2,minmax(0,1fr));
        gap: 15px;
    }
    .help-card {
        padding: 22px;
        border: 1px solid #e5e9ef;
        border-radius: 14px;
        background: white;
    }
    .help-card h4 { color: #102855; font-weight: 800; }
    .help-card p {
        color: #718096;
        font-size: 13px;
        line-height: 1.7;
    }
    .help-button {
        display: inline-block;
        background: #102855;
        color: white;
        text-decoration: none;
        padding: 10px 16px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 700;
    }
    .campaign-footer {
        margin-top: 35px;
        padding: 22px 10px;
        text-align: center;
        border-top: 1px solid #e5e9ef;
        color: #718096;
        font-size: 12px;
        line-height: 2;
    }
    .campaign-footer strong { color: #D9B64F; }
    .campaign-alert {
        padding: 13px 16px;
        border-radius: 9px;
        margin-top: 15px;
        background: #e9f7ee;
        color: #24633c;
        font-size: 13px;
    }
    @media(max-width:800px) {
        .campaign-grid { grid-template-columns: repeat(2,minmax(0,1fr)); }
    }
    @media(max-width:520px) {
        .campaign-grid,.kindness-list,.help-grid {
            grid-template-columns: 1fr;
        }
        .campaign-hero { padding: 38px 18px; }
        .campaign-header { padding: 18px; }
    }


:root {
    --navy: #102B55;
    --blue: #183D64;
    --gold: #D9B64F;
    --gold-light: #EBD58F;
    --ivory: #F8F7F1;
    --text: #34445a;
    --muted: #7b8797;
    --border: #e8eaf0;
}

* {
    box-sizing: border-box;
}

body {
    margin: 0;
    padding: 22px;
    background: #f3f5f8;
    font-family: 'Segoe UI', Arial, sans-serif;
    color: var(--navy);
    font-size: 13px;
}

.container {
    max-width: 1100px;
    margin: auto;
}

/* HEADER */
header {
    background:
        radial-gradient(circle at 15px 15px, rgba(217,182,79,.10) 1px, transparent 1.5px),
        linear-gradient(120deg, var(--navy), var(--blue));
    background-size: 22px 22px, auto;
    color: white;
    padding: 22px 26px;
    border-bottom: 4px solid var(--gold);
    border-radius: 14px 14px 0 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
}

.brand h1 {
    margin: 0;
    font-size: 25px;
    letter-spacing: 4px;
}

.brand p {
    margin: 5px 0 0;
    color: var(--gold-light);
    font-size: 10px;
    letter-spacing: 1.5px;
}

.tagline {
    margin-top: 10px;
    color: white;
    font-size: 12px;
    font-weight: 600;
}

.header-info {
    text-align: right;
    color: #e6edf5;
    font-size: 11px;
    line-height: 1.8;
}

/* CONTENT */
.content {
    background: white;
    padding: 24px;
    border: 1px solid var(--border);
    border-radius: 0 0 14px 14px;
    box-shadow: 0 7px 25px rgba(16,43,85,.05);
}

.page-heading {
 padding: 0 12px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 12px;
    margin-bottom: 18px;
}

.page-heading h2 {
    margin: 0;
    font-size: 20px;
}

.page-heading p {
    margin: 6px 0 0;
    color: var(--muted);
    font-size: 12px;
    line-height: 1.6;
}

.back-link {
    display: inline-block;
    padding: 9px 14px;
    border: 1px solid #dce2e9;
    border-radius: 8px;
    color: var(--blue);
    font-size: 12px;
    font-weight: 700;
    text-decoration: none;
}

.back-link:hover {
    background: var(--ivory);
    border-color: var(--gold);
}

/* INTRO */
.intro {
    padding: 15px 17px;
    margin-bottom: 20px;
    background: var(--ivory);
    border-left: 4px solid var(--gold);
    border-radius: 9px;
    color: #536176;
    line-height: 1.7;
    font-size: 12px;
}

.intro strong {
    display: block;
    color: var(--navy);
    font-size: 13px;
    margin-bottom: 3px;
}

/* ALERT */
.alert {
    padding: 12px 15px;
    border-radius: 8px;
    margin-bottom: 15px;
    line-height: 1.6;
}

.success {
    background: #e8f5ec;
    border-left: 4px solid #39945a;
    color: #267044;
}

.error {
    background: #fff0ed;
    border-left: 4px solid #c34b3c;
    color: #9b3025;
}

/* STORY CARD */
.story {
    background: white;
    border: 1px solid var(--border);
    border-top: 3px solid var(--gold);
    border-radius: 12px;
    padding: 19px;
    margin: 15px 0;
    box-shadow: 0 4px 15px rgba(16,43,85,.04);
    transition: .2s ease;
}

.story:hover {
    border-color: #d9c98e;
    box-shadow: 0 7px 20px rgba(16,43,85,.07);
}

.story-top {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: wrap;
    gap: 12px;
    padding-bottom: 13px;
    border-bottom: 1px solid var(--border);
}

.story-label {
    color: var(--muted);
    font-size: 9px;
    letter-spacing: 1.3px;
    font-weight: 700;
    margin-bottom: 5px;
}

.story h3 {
    margin: 0;
    font-size: 16px;
    color: var(--navy);
}

.status {
    display: inline-block;
    padding: 6px 11px;
    border-radius: 20px;
    background: #fff3d2;
    color: #896400;
    font-size: 10px;
    font-weight: 700;
}

.status-replied {
    background: #e4f4e9;
    color: #267044;
}

.story-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 10px 20px;
    padding: 12px 0;
    color: var(--muted);
    font-size: 11px;
}

.story-meta strong {
    color: var(--navy);
}

.story-content {
    padding: 14px;
    background: #f7f8fa;
    border-radius: 9px;
    margin: 5px 0 15px;
}

.story-content h4 {
    margin: 0 0 8px;
    color: var(--navy);
    font-size: 11px;
}

.story-content p {
    margin: 0;
    color: var(--text);
    font-size: 12px;
    line-height: 1.8;
    white-space: pre-wrap;
    overflow-wrap: anywhere;
}

/* PREVIOUS REPLY */
.previous-reply {
    padding: 13px 15px;
    margin: 14px 0;
    background: #f0f5fb;
    border-left: 3px solid var(--blue);
    border-radius: 8px;
}

.previous-reply strong {
    display: block;
    font-size: 11px;
    margin-bottom: 7px;
    color: var(--blue);
}

.previous-reply p {
    margin: 0;
    color: var(--text);
    font-size: 12px;
    line-height: 1.7;
    white-space: pre-wrap;
    overflow-wrap: anywhere;
}

/* REPLY FORM */
.reply-panel {
    padding: 15px;
    background: #fbfbf9;
    border: 1px solid #e8e5dc;
    border-radius: 10px;
    margin-top: 15px;
}

.reply-panel h4 {
    margin: 0 0 10px;
    font-size: 13px;
    color: var(--navy);
}

.reply-panel label {
    display: block;
    margin-bottom: 7px;
    font-size: 11px;
    font-weight: 700;
    color: #536176;
}

.reply-panel textarea {
    width: 100%;
    min-height: 100px;
    padding: 12px;
    border: 1px solid #dce2e9;
    border-radius: 8px;
    background: white;
    color: var(--navy);
    font-family: inherit;
    font-size: 12px;
    line-height: 1.7;
    resize: vertical;
    outline: none;
}

.reply-panel textarea:focus {
    border-color: var(--gold);
    box-shadow: 0 0 0 2px rgba(217,182,79,.12);
}

.reply-panel textarea::placeholder {
    color: #a0a8b4;
}

.btn {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    margin-top: 10px;
    padding: 10px 17px;
    border: 0;
    border-radius: 8px;
    background: var(--navy);
    color: white;
    font-size: 11px;
    font-weight: 700;
    cursor: pointer;
    transition: .2s;
}

.btn:hover {
    background: var(--blue);
}

.empty {
    text-align: center;
    padding: 40px 20px;
    background: #f8f9fb;
    border: 1px dashed #d9dfe7;
    border-radius: 11px;
}

.empty h3 {
    margin: 0 0 8px;
    font-size: 16px;
    color: var(--navy);
}

.empty p {
    color: var(--muted);
    font-size: 12px;
    margin: 0;
}

/* FOOTER */
footer {
    text-align: center;
    padding: 20px 10px;
    color: #8993a1;
    font-size: 10px;
    line-height: 1.9;
}

footer span {
    color: #b08b24;
    font-weight: 700;
}

/* MOBILE */
@media(max-width:650px) {
    body {
        padding: 10px;
    }

    header {
        padding: 17px;
    }

    .brand h1 {
        font-size: 22px;
    }

    .header-info {
        display: none;
    }

    .content {
        padding: 15px;
    }

    .page-heading h2 {
        font-size: 18px;
    }

    .story {
        padding: 14px;
    }

    .story h3 {
        font-size: 14px;
    }

    .reply-panel {
        padding: 12px;
    }

    .btn {
        width: 100%;
    }
}


.page-heading { flex-direction: column; align-items: center; text-align: center; }
.page-heading > div { width: 100%; }
.page-heading .back-link { align-self: flex-end; }

.campaign-page { background-image: radial-gradient(circle, rgba(20,80,70,.10) 1px, transparent 1.2px); background-size: 24px 24px; }

.page-heading { margin-top: 38px !important; }
.page-heading h2 { font-size: 26px !important; font-weight: 700; }
</style>


<div class="campaign-page">

    <header>
    <div class="brand">
        <h1>NAWARA</h1>
        <p>STUDENT CARE &amp; PROTECTION</p>
        <div class="tagline">Setiap Anak Berharga, Setiap Suara Bermakna</div>
    </div>
    <div class="header-info">
        PUSAT EDUKASI<br>
        SMP Islam Al Azhar 52 Bengkulu
    </div>
</header>
<div class="page-heading">
        <div>
            <h2>Pusat Edukasi</h2>
            <p>Kenali, pahami, dan cegah perundungan bersama NAWARA.</p>
        </div>

        <a href="{{ route('dashboard') }}" class="back-link">← Kembali ke Dashboard</a>
    </div>




    @if(session('success'))
        <div class="campaign-alert">{{ session('success') }}</div>
    @endif

    <section class="campaign-hero">
        <div class="campaign-tag">KAMPANYE SEKOLAH RAMAH ANAK</div>
        <h2>BERANI PEDULI,<br><span>BERANI MELINDUNGI!</span></h2>
        <p>
            Stop Perundungan. Mulai dari Kita.
            Mari ciptakan lingkungan sekolah yang aman,
            nyaman, saling menghargai, dan bebas dari perundungan.
        </p>
    </section>

    <section class="campaign-section">
        <h3 class="campaign-title">Kenali Bentuk Perundungan</h3>
        <p class="campaign-subtitle">
            Perundungan dapat terjadi dalam berbagai bentuk.
            Kenali tandanya agar kita dapat mencegah dan menghentikannya.
        </p>

        <div class="campaign-grid">
            <div class="campaign-card">
                <div class="campaign-icon">✋</div>
                <h4>Perundungan Fisik</h4>
                <p>Memukul, menendang, mendorong, mencubit, atau merusak barang milik orang lain.</p>
            </div>
            <div class="campaign-card">
                <div class="campaign-icon">💬</div>
                <h4>Perundungan Verbal</h4>
                <p>Mengejek, menghina, mengancam, atau memberikan julukan yang menyakitkan.</p>
            </div>
            <div class="campaign-card">
                <div class="campaign-icon">🤝</div>
                <h4>Perundungan Sosial</h4>
                <p>Mengucilkan, menyebarkan rumor, atau sengaja merusak hubungan pertemanan.</p>
            </div>
            <div class="campaign-card">
                <div class="campaign-icon">📱</div>
                <h4>Perundungan Siber</h4>
                <p>Mengirim pesan menyakitkan atau menyebarkan konten seseorang melalui internet.</p>
            </div>
        </div>
    </section>

    <section class="campaign-section">
        <h3 class="campaign-title">Tantangan Aksi Kebaikan</h3>
        <p class="campaign-subtitle">
            Mulai dari tindakan sederhana. Kebaikan kecil dapat membuat
            seseorang merasa diterima dan dihargai.
        </p>

        <div class="kindness-box">
            <div class="kindness-list">
                <div class="kindness-item">
                    <span>😊</span>
                    <div><strong>Sapa dengan Ramah</strong><br>Berikan senyuman dan sapaan kepada teman.</div>
                </div>
                <div class="kindness-item">
                    <span>🫶</span>
                    <div><strong>Rangkul Teman</strong><br>Ajak teman yang sendirian untuk bergabung.</div>
                </div>
                <div class="kindness-item">
                    <span>🛡️</span>
                    <div><strong>Berani Membela</strong><br>Dukung teman yang mengalami perundungan dengan aman.</div>
                </div>
                <div class="kindness-item">
                    <span>💛</span>
                    <div><strong>Jaga Ucapan</strong><br>Pilih kata-kata yang baik dan tidak menyakiti.</div>
                </div>
                <div class="kindness-item">
                    <span>🤲</span>
                    <div><strong>Saling Membantu</strong><br>Tawarkan bantuan kepada teman yang membutuhkan.</div>
                </div>
                <div class="kindness-item">
                    <span>📢</span>
                    <div><strong>Berani Melapor</strong><br>Ceritakan kepada Guru BK jika melihat perundungan.</div>
                </div>
            </div>
        </div>
    </section>

    <section class="pledge-box">
        <div style="font-size:38px;">💛</div>
        <h3>DEKLARASI SAHABAT TANPA PERUNDUNGAN</h3>
        <p>
            Saya berkomitmen untuk tidak melakukan perundungan,
            menghargai setiap teman, berani peduli, dan ikut menjaga
            lingkungan sekolah agar aman bagi semua.
        </p>

        <div class="pledge-count">{{ number_format($pledgeCount ?? 0) }}</div>
        <div style="font-size:12px;color:#EBD58F;">
            Murid telah menyatakan komitmen
        </div>

        @if(auth()->user()->hasRole('murid'))
            <form method="POST" action="{{ route('education.pledge') }}">
                @csrf
                <button class="pledge-button" type="submit"
                    {{ !empty($hasPledged) ? 'disabled' : '' }}>
                    {{ !empty($hasPledged) ? '✓ Saya Sudah Berkomitmen' : 'Saya Berkomitmen' }}
                </button>
            </form>
        @else
            <p style="font-size:12px;margin-top:15px;">
                Guru BK dapat mendampingi gerakan Sahabat Tanpa Perundungan.
            </p>
        @endif
    </section>

    <section class="campaign-section">
        <h3 class="campaign-title">Pusat Bantuan NAWARA</h3>
        <p class="campaign-subtitle">
            Kamu tidak harus menghadapi perundungan sendirian.
            NAWARA menyediakan ruang aman untuk mencari bantuan.
        </p>

        <div class="help-grid">
            @if(auth()->user()->hasRole('murid'))
                <div class="help-card">
                    <div class="campaign-icon">📝</div>
                    <h4>Daftar Pengaduan</h4>
                    <p>Sampaikan kejadian perundungan atau masalah yang membutuhkan perhatian Guru BK.</p>
                    <a class="help-button" href="{{ route('reports.create') }}">Buat Pengaduan</a>
                </div>
                <div class="help-card">
                    <div class="campaign-icon">💌</div>
                    <h4>Ruang Cerita</h4>
                    <p>Ceritakan perasaan dan pengalamanmu melalui ruang yang disediakan NAWARA.</p>
                    <a class="help-button" href="{{ route('murid.stories.index') }}">Buka Ruang Cerita</a>
                </div>
            @elseif(auth()->user()->hasRole('guru_bk'))
                <div class="help-card">
                    <div class="campaign-icon">📋</div>
                    <h4>Daftar Pengaduan</h4>
                    <p>Lihat dan tindak lanjuti pengaduan yang disampaikan Murid.</p>
                    <a class="help-button" href="{{ route('guru-bk.reports') }}">Lihat Pengaduan</a>
                </div>
                <div class="help-card">
                    <div class="campaign-icon">💌</div>
                    <h4>Ruang Cerita</h4>
                    <p>Dampingi Murid melalui ruang cerita NAWARA.</p>
                    <a class="help-button" href="{{ route('guru-bk.stories.index') }}">Buka Ruang Cerita</a>
                </div>
            @endif
        </div>
    </section>

    <footer>
    © 2026 NAWARA. All Rights Reserved. <br>
    Designed &amp; Developed by <span>Renaldi</span>
</footer>

</div>
@endsection
