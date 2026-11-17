<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Daftar Pengaduan | NAWARA</title>

<style>
:root {
    --navy:#102B55;
    --blue:#183D64;
    --gold:#D9B64F;
    --ivory:#F8F7F1;
    --text:#34445a;
    --muted:#7b8797;
    --border:#e8eaf0;
}

* { box-sizing:border-box; }

body {
    margin:0;
    padding:22px;
    background:#f3f5f8;
    font-family:'Segoe UI',Arial,sans-serif;
    color:var(--navy);
    font-size:13px;
}

.container {
    max-width:1200px;
    margin:auto;
}

header {
    background:
        repeating-linear-gradient(45deg,transparent,transparent 18px,rgba(217,182,79,.07) 19px,transparent 20px),
        linear-gradient(120deg,var(--navy),var(--blue));
    color:white;
    padding:19px 25px;
    border-bottom:4px solid var(--gold);
    border-radius:14px 14px 0 0;
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:15px;
}

.brand h1 {
    margin:0;
    font-size:23px;
    letter-spacing:3px;
}

.brand p {
    margin:4px 0 0;
    font-size:10px;
    letter-spacing:1.5px;
    color:#EBD58F;
}

.tagline {
    margin-top:9px;
    color:#fff;
    font-size:12px;
    font-weight:600;
    letter-spacing:.2px;
}

.header-info {
    text-align:right;
    font-size:11px;
    line-height:1.7;
    color:#e6edf5;
}

.content {
    background:white;
    padding:22px;
    border:1px solid var(--border);
    border-radius:0 0 14px 14px;
    box-shadow:0 7px 25px rgba(16,43,85,.05);
}

.page-heading {
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:12px;
    flex-wrap:wrap;
    margin-bottom:17px;
}

.page-heading h2 {
    font-size:19px;
    margin:0;
}

.page-heading p {
    color:var(--muted);
    margin:5px 0 0;
    font-size:12px;
}

.back-link {
    text-decoration:none;
    color:var(--blue);
    border:1px solid #dce2e9;
    padding:8px 13px;
    border-radius:8px;
    font-size:12px;
    font-weight:600;
}

.back-link:hover {
    border-color:var(--gold);
    background:var(--ivory);
}

.filter-panel {
    background:#fbfbf9;
    border:1px solid var(--border);
    border-radius:11px;
    padding:14px;
    margin-bottom:13px;
}

.panel-heading {
    font-size:13px;
    font-weight:700;
    margin:0 0 11px;
}

.filter-fields {
    display:grid;
    grid-template-columns:1.3fr 1fr 1fr auto;
    gap:9px;
    align-items:end;
}

.field label {
    display:block;
    font-size:11px;
    font-weight:600;
    color:#65748a;
    margin-bottom:5px;
}

input,select,textarea {
    font:inherit;
}

.filter-fields input,
.filter-fields select,
.pdf-fields input,
.update-form select,
.update-form textarea {
    width:100%;
    min-width:0;
    padding:9px 10px;
    border:1px solid #dce2e9;
    border-radius:7px;
    background:white;
    color:var(--navy);
    outline:none;
}

.filter-fields input:focus,
.filter-fields select:focus,
.pdf-fields input:focus,
.update-form select:focus,
.update-form textarea:focus {
    border-color:var(--gold);
    box-shadow:0 0 0 2px rgba(217,182,79,.12);
}

.actions {
    display:flex;
    gap:7px;
    flex-wrap:wrap;
}

.btn {
    display:inline-flex;
    align-items:center;
    justify-content:center;
    border:0;
    border-radius:7px;
    padding:9px 13px;
    font-size:11px;
    font-weight:700;
    text-decoration:none;
    cursor:pointer;
    transition:.2s;
}

.btn-primary {
    background:var(--navy);
    color:white;
}

.btn-primary:hover { background:var(--blue); }

.btn-light {
    background:#edf0f4;
    color:var(--navy);
}

.btn-light:hover { background:#e2e7ed; }

.btn-gold {
    background:var(--gold);
    color:var(--navy);
}

.btn-gold:hover { background:#e8ca70; }

.pdf-panel {
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:15px;
    flex-wrap:wrap;
    padding:12px 14px;
    border:1px solid #e8dfc8;
    border-left:3px solid var(--gold);
    border-radius:10px;
    margin-bottom:15px;
    background:#fffefa;
}

.pdf-title {
    font-weight:700;
    font-size:12px;
}

.pdf-fields {
    display:flex;
    gap:10px;
    align-items:end;
    flex-wrap:wrap;
}

.date-field {
    display:flex;
    flex-direction:column;
    gap:5px;
    color:#65748a;
    font-size:11px;
    font-weight:600;
}

.pdf-fields input {
    width:155px;
    font-size:11px;
    padding:8px;
}

.intro {
    background:var(--ivory);
    border-left:3px solid var(--gold);
    border-radius:7px;
    padding:11px 14px;
    font-size:11px;
    color:#536176;
    line-height:1.6;
    margin-bottom:17px;
}

.report {
    border:1px solid var(--border);
    border-radius:10px;
    padding:14px 16px;
    margin:11px 0;
    background:white;
    transition:.2s;
}

.report:hover {
    border-color:#d9c98e;
    box-shadow:0 4px 13px rgba(16,43,85,.045);
}

.report-top {
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:12px;
    flex-wrap:wrap;
}

.code-label {
    color:var(--muted);
    font-size:9px;
    letter-spacing:1px;
    margin-bottom:4px;
}

.code {
    font-size:14px;
    font-weight:750;
    color:var(--navy);
}

.meta {
    display:flex;
    gap:12px;
    flex-wrap:wrap;
    color:var(--muted);
    font-size:11px;
    margin-top:9px;
}

.status {
    display:inline-block;
    padding:6px 10px;
    border-radius:20px;
    font-size:10px;
    font-weight:700;
}

.status-menunggu {
    background:#fff3d2;
    color:#896400;
}

.status-proses {
    background:#e5efff;
    color:#245a9a;
}

.status-selesai {
    background:#e4f4e9;
    color:#267044;
}

.detail-toggle {
    display:inline-block;
    margin-top:11px;
    padding:7px 11px;
    border:1px solid #d8dfeb;
    border-radius:7px;
    background:#f7f9fc;
    color:var(--blue);
    font-size:11px;
    font-weight:700;
    cursor:pointer;
    list-style:none;
}

.detail-toggle::-webkit-details-marker { display:none; }

.detail-toggle:hover {
    background:#fff8e5;
    border-color:var(--gold);
}

details[open] .detail-toggle {
    background:var(--navy);
    color:white;
    border-color:var(--gold);
}

.detail-content {
    border-top:1px solid var(--border);
    margin-top:13px;
    padding-top:13px;
}

.detail-grid {
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:10px;
    margin-bottom:12px;
}

.detail-item {
    padding:10px 12px;
    border-radius:7px;
    background:#f7f8fa;
}

.detail-item strong {
    display:block;
    color:#718096;
    font-size:10px;
    margin-bottom:5px;
}

.detail-item span {
    font-size:12px;
    color:var(--navy);
}

.reporter-item {
    background:#f5f7fb;
    border-left:3px solid var(--gold);
}

.anonymous-text {
    color:#896400 !important;
    font-weight:700;
}

.description-box {
    background:#f7f8fa;
    border-radius:8px;
    padding:12px;
    white-space:pre-wrap;
    overflow-wrap:anywhere;
    line-height:1.7;
    font-size:12px;
    color:#46556b;
}

.update-form {
    margin-top:14px;
    padding:14px;
    background:#fbfbf9;
    border:1px solid #e8e5dc;
    border-radius:9px;
}

.update-form h3 {
    margin:0 0 12px;
    font-size:13px;
}

.update-grid {
    display:grid;
    grid-template-columns:1fr 1.6fr;
    gap:11px;
}

.update-form label {
    display:block;
    font-size:11px;
    font-weight:700;
    margin-bottom:5px;
    color:#536176;
}

.update-form textarea {
    resize:vertical;
    min-height:75px;
    line-height:1.6;
}

.update-submit { margin-top:10px; }

.history {
    margin-top:14px;
    padding:13px;
    background:#f5f7fa;
    border-radius:9px;
}

.history h3 {
    font-size:12px;
    margin:0 0 10px;
}

.history-item {
    background:white;
    border-left:3px solid var(--gold);
    padding:10px 12px;
    margin-bottom:8px;
    border-radius:5px;
}

.history-item:last-child { margin-bottom:0; }

.history-item strong { font-size:11px; }

.history-item p {
    font-size:11px;
    color:#65748a;
    line-height:1.6;
    margin:5px 0 0;
    white-space:pre-line;
}

.empty {
    text-align:center;
    padding:35px 15px;
    background:#f8f9fb;
    border:1px dashed #d9dfe7;
    border-radius:10px;
    color:#718096;
}

.empty h3 {
    color:var(--navy);
    font-size:15px;
}

.pagination { margin-top:18px; }

footer {
    text-align:center;
    padding:18px 10px;
    color:#8993a1;
    font-size:10px;
    line-height:1.8;
}

footer span {
    color:#b08b24;
    font-weight:700;
}

.toast {
    position:fixed;
    top:18px;
    right:18px;
    z-index:9999;
    width:min(370px,calc(100% - 36px));
    background:var(--navy);
    color:white;
    padding:15px;
    border-radius:11px;
    box-shadow:0 10px 30px rgba(16,43,85,.2);
    border:1px solid rgba(217,182,79,.65);
    display:flex;
    align-items:center;
    gap:11px;
}

.toast-check {
    width:32px;
    height:32px;
    flex-shrink:0;
    border-radius:50%;
    background:var(--gold);
    color:var(--navy);
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:bold;
    font-size:17px;
}

.toast-title {
    color:#EBD58F;
    font-size:11px;
    font-weight:700;
    letter-spacing:.5px;
}

.toast-message {
    font-size:12px;
    line-height:1.5;
    margin-top:3px;
}

.error-box {
    margin-bottom:15px;
    padding:12px 15px;
    background:#fff0ed;
    color:#9b3025;
    border-left:4px solid #c34b3c;
    border-radius:8px;
}

@media(max-width:750px) {
    body { padding:10px; }
    .content { padding:14px; }
    header { padding:15px; }
    .filter-fields { grid-template-columns:1fr 1fr; }
    .filter-fields .search-field { grid-column:1/-1; }
    .update-grid { grid-template-columns:1fr; }
    .detail-grid { grid-template-columns:1fr 1fr; }
}

@media(max-width:450px) {
    .header-info { display:none; }
    .brand h1 { font-size:21px; }
    .tagline { font-size:11px; }
    .filter-fields { grid-template-columns:1fr; }
    .filter-fields .search-field { grid-column:auto; }
    .pdf-panel { align-items:flex-start; }
    .pdf-fields { width:100%; }
    .date-field { flex:1; min-width:120px; }
    .pdf-fields input { width:100%; }
    .pdf-fields button { width:100%; }
    .detail-grid { grid-template-columns:1fr; }
}
</style>
</head>

<body>

@if (session('success'))
<div class="toast" id="nawara-toast">
    <div class="toast-check">✓</div>
    <div style="flex:1">
        <div class="toast-title">NAWARA · BERHASIL</div>
        <div class="toast-message">{{ session('success') }}</div>
    </div>
    <button type="button" onclick="document.getElementById('nawara-toast').remove()" style="background:transparent;border:0;color:white;font-size:20px;cursor:pointer;">&times;</button>
</div>

<script>
setTimeout(function () {
    const toast = document.getElementById('nawara-toast');
    if (toast) {
        toast.style.transition = 'opacity .4s ease, transform .4s ease';
        toast.style.opacity = '0';
        toast.style.transform = 'translateY(-10px)';
        setTimeout(() => toast.remove(), 450);
    }
}, 4000);
</script>
@endif

<div class="container">

@if ($errors->any())
    <div class="error-box">
        <strong>Periksa kembali:</strong>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<header>
    <div class="brand">
        <h1>NAWARA</h1>
        <p>STUDENT CARE &amp; PROTECTION</p>
        <div class="tagline">Setiap Anak Berharga, Setiap Suara Bermakna</div>
    </div>

    <div class="header-info">
        Dashboard Guru BK<br>
        SMP Islam Al Azhar 52 Bengkulu
    </div>
</header>

<main class="content">

    <div class="page-heading">
        <div>
            <h2>Daftar Pengaduan Murid</h2>
            <p>Kelola laporan dengan penuh tanggung jawab dan jaga kerahasiaan Murid.</p>
        </div>
        <a href="{{ route('guru-bk.dashboard') }}" class="back-link">← Dashboard</a>
    </div>

    <form method="GET" action="{{ route('guru-bk.reports') }}" class="filter-panel">
        <h3 class="panel-heading">Pencarian &amp; Filter</h3>

        <div class="filter-fields">
            <div class="field search-field">
                <label>Kode pengaduan</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari kode laporan...">
            </div>

            <div class="field">
                <label>Status</label>
                <select name="status">
                    <option value="">Semua Status</option>
                    <option value="menunggu" @selected(request('status') === 'menunggu')>Menunggu</option>
                    <option value="dalam_penanganan" @selected(request('status') === 'dalam_penanganan')>Dalam Penanganan</option>
                    <option value="selesai" @selected(request('status') === 'selesai')>Selesai</option>
                </select>
            </div>

            <div class="field">
                <label>Jenis perundungan</label>
                <select name="type">
                    <option value="">Semua Jenis</option>
                    <option value="verbal" @selected(request('type') === 'verbal')>Verbal</option>
                    <option value="fisik" @selected(request('type') === 'fisik')>Fisik</option>
                    <option value="sosial" @selected(request('type') === 'sosial')>Sosial</option>
                    <option value="siber" @selected(request('type') === 'siber')>Siber</option>
                    <option value="lainnya" @selected(request('type') === 'lainnya')>Lainnya</option>
                </select>
            </div>

            <div class="actions">
                <button type="submit" class="btn btn-primary">Terapkan</button>
                <a href="{{ route('guru-bk.reports') }}" class="btn btn-light">Reset</a>
            </div>
        </div>
    </form>

    <form action="{{ route('guru-bk.reports.pdf') }}" method="GET" class="pdf-panel">
        <div class="pdf-title">Unduh Rekap Pengaduan PDF</div>

        <div class="pdf-fields">
            <label class="date-field">
                <span>Tanggal Mulai</span>
                <input type="date" name="start_date" aria-label="Tanggal Mulai">
            </label>

            <label class="date-field">
                <span>Tanggal Akhir</span>
                <input type="date" name="end_date" aria-label="Tanggal Akhir">
            </label>

            <button type="submit" class="btn btn-gold">Unduh PDF</button>
        </div>
    </form>

    <div class="intro">
        Kelola setiap laporan dengan empati, profesional, dan tetap menjaga kerahasiaan Murid.
    </div>

    @forelse ($reports as $report)

    <div class="report" id="laporan-{{ $report->id }}">

        <div class="report-top">
            <div>
                <div class="code-label">KODE PENGADUAN</div>
                <div class="code">{{ $report->report_code }}</div>
            </div>

            @if ($report->status === 'menunggu')
                <span class="status status-menunggu">Menunggu</span>
            @elseif ($report->status === 'dalam_penanganan')
                <span class="status status-proses">Dalam Penanganan</span>
            @else
                <span class="status status-selesai">Selesai</span>
            @endif
        </div>

        <div class="meta">
            <span>{{ ucfirst($report->bullying_type) }}</span>
            <span>{{ $report->created_at->format('d/m/Y') }}</span>
        </div>

        <details>
            <summary class="detail-toggle">Lihat Detail &amp; Tindak Lanjut</summary>

            <div class="detail-content">

                <div class="detail-grid">

                    {{-- IDENTITAS PELAPOR --}}
                    <div class="detail-item reporter-item">
                        <strong>IDENTITAS PELAPOR</strong>

                        @if ($report->is_anonymous)
                            <span class="anonymous-text">Anonim — Identitas Dirahasiakan</span>
                        @elseif ($report->user)
                            <span>{{ $report->user->name }}</span>
                        @else
                            <span>Identitas tidak tersedia</span>
                        @endif
                    </div>

                    <div class="detail-item">
                        <strong>Tanggal kejadian</strong>
                        <span>{{ $report->incident_date ? $report->incident_date->format('d/m/Y') : 'Tidak dicantumkan' }}</span>
                    </div>

                    <div class="detail-item">
                        <strong>Lokasi kejadian</strong>
                        <span>{{ $report->incident_location ?: 'Tidak dicantumkan' }}</span>
                    </div>

                </div>

                <div>
                    <div class="code-label">DESKRIPSI KEJADIAN</div>
                    <div class="description-box">{{ $report->incident_description }}</div>
                </div>

                <form method="POST" action="{{ route('guru-bk.reports.update', $report->id) }}" class="update-form">
                    @csrf
                    @method('PUT')

                    <h3>Formulir Tindak Lanjut</h3>

                    <div class="update-grid">
                        <div>
                            <label>Status penanganan</label>
                            <select name="status" required>
                                <option value="menunggu" @selected($report->status === 'menunggu')>Menunggu</option>
                                <option value="dalam_penanganan" @selected($report->status === 'dalam_penanganan')>Dalam Penanganan</option>
                                <option value="selesai" @selected($report->status === 'selesai')>Selesai</option>
                            </select>
                        </div>

                        <div>
                            <label>Catatan tindak lanjut (rahasia)</label>
                            <textarea name="handling_notes" rows="3" maxlength="5000" placeholder="Tuliskan langkah penanganan kasus...">{{ old('handling_notes', $report->handling_notes) }}</textarea>
                        </div>
                    </div>

                    <div class="update-submit">
                        <button type="submit" class="btn btn-primary">Simpan Penanganan</button>
                    </div>
                </form>

                @if ($report->handling_notes)
                    <div class="history" style="border-left:3px solid var(--gold);">
                        <h3>Catatan Penanganan Tersimpan</h3>
                        <div class="description-box">{{ $report->handling_notes }}</div>
                    </div>
                @endif

                <div class="history">
                    <h3>Riwayat Penanganan</h3>

                    @forelse ($report->histories as $history)
                        <div class="history-item">
                            <strong>{{ ucfirst(str_replace('_', ' ', $history->new_status)) }}</strong>
                            <p>
                                {{ $history->created_at->format('d/m/Y H:i') }}
                                · Petugas: {{ $history->user->name ?? 'Petugas tidak tersedia' }}
                            </p>
                            <p>
                                Status sebelumnya:
                                {{ $history->old_status ? ucfirst(str_replace('_', ' ', $history->old_status)) : 'Laporan baru' }}
                            </p>
                            @if ($history->handling_notes)
                                <p>{{ $history->handling_notes }}</p>
                            @endif
                        </div>
                    @empty
                        <p style="font-size:11px;color:#718096;">Belum ada riwayat penanganan.</p>
                    @endforelse
                </div>

            </div>
        </details>
    </div>

    @empty
        <div class="empty">
            <h3>Belum Ada Pengaduan</h3>
            <p>Saat ini belum ada laporan yang masuk.</p>
        </div>
    @endforelse

    <div class="pagination">
        {{ $reports->links() }}
    </div>

</main>

<footer>
    © 2026 NAWARA. All Rights Reserved.<br>
    Designed &amp; Developed by <span>Renaldi</span>
</footer>

</div>
</body>
</html>