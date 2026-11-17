
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Ruang Cerita | NAWARA</title>

<style>
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
</style>
</head>

<body>
<div class="container">

<header>
    <div class="brand">
        <h1>NAWARA</h1>
        <p>STUDENT CARE &amp; PROTECTION</p>
        <div class="tagline">Setiap Anak Berharga, Setiap Suara Bermakna</div>
    </div>

    <div class="header-info">
        IMPOR DATA MURID GURU BK<br>
        SMP Islam Al Azhar 52 Bengkulu
    </div>
</header>

<main class="content">

    <div class="page-heading">
        <div>
            <h2>Impor Data Murid</h2>
            <p>Unggah data Murid secara massal menggunakan file CSV UTF-8.</p>
        </div>

        <a href="{{ route('guru-bk.dashboard') }}" class="back-link">← Kembali ke Dashboard</a>
    </div>

    <div class="intro">
        <strong>Setiap cerita layak didengar.</strong>
        Ruang aman bagi Murid untuk menyampaikan perasaan dan pengalaman. Jaga kerahasiaan cerita serta tanggapi setiap Murid dengan bijaksana.
    </div>

    @if(session('simulation_result'))
<div class="alert success">
    <strong>Simulasi selesai!</strong>
    <p>Data Murid valid: {{ session('simulation_result.valid') }}</p>
    <p>Data bermasalah: {{ session('simulation_result.invalid') }}</p>
    <p>{{ session('simulation_result.message') }}</p>

    @if(count(session('simulation_result.errors', [])))
        <strong>Rincian yang perlu diperbaiki:</strong>
        @foreach(session('simulation_result.errors') as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif
</div>
@endif

@if(session('simulation_result.batch_id'))
<form method="POST" action="{{ route('guru-bk.student-import.confirm', session('simulation_result.batch_id')) }}">
    @csrf
    <button type="submit" class="btn">Lanjutkan ke Konfirmasi</button>
</form>
@endif

@if(session('finalize_result'))
<div class="alert success">
    <strong>Hasil Impor Data Murid</strong>
    <p>Akun berhasil dibuat: {{ session('finalize_result.created') }}</p>
    <p>{{ session('finalize_result.message') }}</p>
</div>
@endif

@if(isset($partialBatches) && $partialBatches->isNotEmpty())
<div class="alert error">
    <strong>Pemulihan Impor Data Murid</strong>
    <p>Ada batch yang prosesnya belum selesai.</p>

    @foreach($partialBatches as $batch)
        <div style="margin: 12px 0; padding: 12px; border: 1px solid #e8eaf0; border-radius: 8px;">
            <p>Batch #{{ $batch->id }}</p>
            <p>Email belum terkirim:
                {{ $batch->items->where('status', '!=', 'sent')->count() }}
            </p>

            <form method="POST" action="{{ route('guru-bk.student-import.finalize', $batch->id) }}">
                @csrf
                <button type="submit" class="btn">
                    Coba Proses Ulang Batch
                </button>
            </form>
        </div>
    @endforeach
</div>
@endif

@if(session('confirmation_review'))
<div class="alert success">
    <strong>Peninjauan Data Berhasil</strong>
    <p>Jumlah data Murid: {{ session('confirmation_review.count') }}</p>
    <p>{{ session('confirmation_review.message') }}</p>

    @if(session('confirmation_review.batch_id'))
        <form method="POST" action="{{ route('guru-bk.student-import.finalize', session('confirmation_review.batch_id')) }}">
            @csrf
            <button type="submit" class="btn">
                Buat Akun Murid &amp; Kirim Email
            </button>
        </form>
    @endif
</div>
@endif

@if($errors->any())
<div class="alert error">
    <strong>Periksa kembali:</strong>
    @foreach($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach
</div>
@endif

<div class="reply-panel">
<h4>Unggah File Data Murid</h4>
<p>Pastikan CSV UTF-8 memiliki empat kolom berikut:</p>
<p><strong>name,email,nis,cohort_year</strong></p>
<p>Contoh: Ahmad,ahmad@email.com,2026001,2026</p>
<form method="POST" action="{{ route("guru-bk.student-import.store") }}" enctype="multipart/form-data">
@csrf
<label for="file">Pilih File CSV</label>
<input type="file" id="file" name="file" accept=".csv,text/csv" required>
<button type="submit" class="btn">Periksa CSV (Simulasi)</button>
</form>
</div>

</main>

<footer>
    © 2026 NAWARA. All Rights Reserved.<br>
    Designed &amp; Developed by <span>Renaldi</span>
</footer>

</div>
</body>
</html>
