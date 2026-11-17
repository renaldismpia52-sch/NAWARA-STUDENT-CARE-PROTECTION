<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Tindak Lanjut | NAWARA</title>
<style>
:root{--navy:#102B55;--blue:#183D64;--gold:#D9B64F;--ivory:#F8F7F1;--muted:#7b8797;--border:#e8eaf0}
*{box-sizing:border-box}
body{margin:0;padding:22px;background:#f3f5f8;font-family:'Segoe UI',Arial,sans-serif;color:var(--navy);font-size:13px}
.container{max-width:1200px;margin:auto}
header{background:repeating-linear-gradient(45deg,transparent,transparent 18px,rgba(217,182,79,.07) 19px,transparent 20px),linear-gradient(120deg,var(--navy),var(--blue));color:white;padding:19px 25px;border-bottom:4px solid var(--gold);border-radius:14px 14px 0 0;display:flex;justify-content:space-between;align-items:center;gap:15px}
.brand h1{margin:0;font-size:23px;letter-spacing:3px}
.brand p{margin:4px 0 0;font-size:10px;letter-spacing:1.5px;color:#EBD58F}
.tagline{margin-top:9px;font-size:12px;font-weight:600}
.header-info{text-align:right;font-size:11px;line-height:1.7;color:#e6edf5}
.content{background:white;padding:22px;border:1px solid var(--border);border-radius:0 0 14px 14px;box-shadow:0 7px 25px #102b550d}
.page-heading{display:flex;justify-content:space-between;align-items:center;gap:12px;flex-wrap:wrap;margin-bottom:17px}
.page-heading h2{font-size:19px;margin:0}
.page-heading p{color:var(--muted);margin:5px 0 0;font-size:12px}
.back-link{color:var(--blue);border:1px solid #dce2e9;padding:8px 13px;border-radius:8px;font-size:12px;font-weight:600;text-decoration:none}
.notice,.filter-panel,.update-form,.history{padding:14px;border-radius:9px;margin-bottom:15px}
.notice{background:var(--ivory);border-left:3px solid var(--gold);font-size:11px;color:#536176;line-height:1.7}
.filter-panel{background:#fbfbf9;border:1px solid var(--border)}
.panel-heading{font-size:13px;margin:0 0 11px}
.filter-fields{display:grid;grid-template-columns:1.3fr 1fr 1fr auto;gap:9px;align-items:end}
.field label,.update-form label{display:block;font-size:11px;font-weight:700;color:#65748a;margin-bottom:5px}
input,select,textarea{font:inherit}
.filter-fields input,.filter-fields select,.update-form select,.update-form textarea{width:100%;min-width:0;padding:9px 10px;border:1px solid #dce2e9;border-radius:7px;background:white;color:var(--navy)}
.actions{display:flex;gap:7px;flex-wrap:wrap}
.btn{display:inline-flex;align-items:center;justify-content:center;border:0;border-radius:7px;padding:9px 13px;font-size:11px;font-weight:700;text-decoration:none;cursor:pointer}
.btn-primary{background:var(--navy);color:white}
.btn-light{background:#edf0f4;color:var(--navy)}
.report{border:1px solid var(--border);border-radius:10px;padding:14px 16px;margin:11px 0;background:white}
.report:hover{border-color:#d9c98e;box-shadow:0 4px 13px #102b550b}
.report-top{display:flex;justify-content:space-between;align-items:center;gap:12px;flex-wrap:wrap}
.code-label{color:var(--muted);font-size:9px;letter-spacing:1px;margin-bottom:4px}
.code{font-size:14px;font-weight:750}
.meta{display:flex;gap:12px;flex-wrap:wrap;color:var(--muted);font-size:11px;margin-top:9px}
.status{display:inline-block;padding:6px 10px;border-radius:20px;font-size:10px;font-weight:700}
.status-menunggu{background:#fff3d2;color:#896400}
.status-proses{background:#e5efff;color:#245a9a}
.detail-toggle{display:inline-block;margin-top:11px;padding:7px 11px;border:1px solid #d8dfeb;border-radius:7px;background:#f7f9fc;color:var(--blue);font-size:11px;font-weight:700;cursor:pointer;list-style:none}
.detail-toggle::-webkit-details-marker{display:none}
details[open] .detail-toggle{background:var(--navy);color:white;border-color:var(--gold)}
.detail-content{border-top:1px solid var(--border);margin-top:13px;padding-top:13px}
.detail-grid{display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-bottom:12px}
.detail-item{padding:10px 12px;border-radius:7px;background:#f7f8fa}
.detail-item strong{display:block;color:#718096;font-size:10px;margin-bottom:5px}
.detail-item span{font-size:12px}
.description-box{background:#f7f8fa;border-radius:8px;padding:12px;white-space:pre-wrap;overflow-wrap:anywhere;line-height:1.7;font-size:12px;color:#46556b}
.update-form{margin-top:14px;background:#fbfbf9;border:1px solid #e8e5dc}
.update-form h3,.history h3{margin:0 0 12px;font-size:13px}
.update-grid{display:grid;grid-template-columns:1fr 1.6fr;gap:11px}
.update-form textarea{resize:vertical;min-height:85px;line-height:1.6}
.update-submit{margin-top:10px}
.history{margin-top:14px;background:#f5f7fa}
.history-item{background:white;border-left:3px solid var(--gold);padding:10px 12px;margin-bottom:8px;border-radius:5px}
.history-item:last-child{margin-bottom:0}
.history-item strong{font-size:11px}
.history-item p{font-size:11px;color:#65748a;line-height:1.6;margin:5px 0 0;white-space:pre-line}
.empty{text-align:center;padding:35px 15px;background:#f8f9fb;border:1px dashed #d9dfe7;border-radius:10px;color:#718096}
.empty h3{color:var(--navy);font-size:15px}
.pagination{margin-top:18px}
footer{text-align:center;padding:18px 10px;color:#8993a1;font-size:10px;line-height:1.8}
footer span{color:#b08b24;font-weight:700}
.toast{position:fixed;top:18px;right:18px;z-index:9999;width:min(370px,calc(100% - 36px));background:var(--navy);color:white;padding:15px;border-radius:11px;border:1px solid #d9b64f;box-shadow:0 10px 30px #102b5533;display:flex;align-items:center;gap:11px}
.toast-check{width:32px;height:32px;flex-shrink:0;border-radius:50%;background:var(--gold);color:var(--navy);display:flex;align-items:center;justify-content:center;font-weight:bold}
.toast-title{color:#EBD58F;font-size:11px;font-weight:700}
.toast-message{font-size:12px;margin-top:3px}
.error-box{margin-bottom:15px;padding:12px 15px;background:#fff0ed;color:#9b3025;border-left:4px solid #c34b3c;border-radius:8px}
@media(max-width:750px){body{padding:10px}.content{padding:14px}header{padding:15px}.filter-fields{grid-template-columns:1fr 1fr}.filter-fields .search-field{grid-column:1/-1}.update-grid{grid-template-columns:1fr}}
@media(max-width:450px){.header-info{display:none}.brand h1{font-size:21px}.tagline{font-size:11px}.filter-fields{grid-template-columns:1fr}.filter-fields .search-field{grid-column:auto}.detail-grid{grid-template-columns:1fr}}
</style>
</head>
<body>

@if(session('success'))
<div class="toast" id="nawara-toast">
    <div class="toast-check">✓</div>
    <div style="flex:1">
        <div class="toast-title">NAWARA · BERHASIL</div>
        <div class="toast-message">{{ session('success') }}</div>
    </div>
    <button type="button" onclick="document.getElementById('nawara-toast').remove()" style="background:transparent;border:0;color:white;font-size:20px;cursor:pointer">&times;</button>
</div>
<script>
setTimeout(function(){const toast=document.getElementById('nawara-toast');if(toast){toast.style.transition='opacity .4s';toast.style.opacity='0';setTimeout(()=>toast.remove(),450)}},4000);
</script>
@endif

<div class="container">
@if($errors->any())
<div class="error-box">
    <strong>Periksa kembali:</strong>
    @foreach($errors->all() as $error)<p>{{ $error }}</p>@endforeach
</div>
@endif

<header>
    <div class="brand">
        <h1>NAWARA</h1>
        <p>STUDENT CARE &amp; PROTECTION</p>
        <div class="tagline">Setiap Anak Berharga, Setiap Suara Bermakna</div>
    </div>
    <div class="header-info">Dashboard Guru BK<br>SMP Islam Al Azhar 52 Bengkulu</div>
</header>

<main class="content">
    <div class="page-heading">
        <div>
            <h2>Tindak Lanjut Pengaduan</h2>
            <p>Prioritaskan laporan yang masih membutuhkan penanganan.</p>
        </div>
        <a href="{{ route('guru-bk.dashboard') }}" class="back-link">← Dashboard</a>
    </div>

    <div class="notice">
        Halaman ini hanya menampilkan laporan berstatus <strong>Menunggu</strong> dan <strong>Dalam Penanganan</strong>. Catatan tindak lanjut bersifat rahasia dan hanya untuk petugas berwenang.
    </div>

    <form method="GET" action="{{ route('guru-bk.follow-ups') }}" class="filter-panel">
        <h3 class="panel-heading">Pencarian &amp; Filter</h3>
        <div class="filter-fields">
            <div class="field search-field">
                <label>Kode pengaduan</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari kode laporan...">
            </div>
            <div class="field">
                <label>Status</label>
                <select name="status">
                    <option value="">Semua Status Aktif</option>
                    <option value="menunggu" @selected(request('status') === 'menunggu')>Menunggu</option>
                    <option value="dalam_penanganan" @selected(request('status') === 'dalam_penanganan')>Dalam Penanganan</option>
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
                <a href="{{ route('guru-bk.follow-ups') }}" class="btn btn-light">Reset</a>
            </div>
        </div>
    </form>

    @forelse($reports as $report)
    <div class="report" id="laporan-{{ $report->id }}">
        <div class="report-top">
            <div>
                <div class="code-label">KODE PENGADUAN</div>
                <div class="code">{{ $report->report_code }}</div>
            </div>
            @if($report->status === 'menunggu')
                <span class="status status-menunggu">Menunggu</span>
            @else
                <span class="status status-proses">Dalam Penanganan</span>
            @endif
        </div>

        <div class="meta">
            <span>{{ ucfirst($report->bullying_type) }}</span>
            <span>{{ $report->created_at->format('d/m/Y') }}</span>
        </div>

        <details>
            <summary class="detail-toggle">Lihat Detail &amp; Formulir Penanganan</summary>
            <div class="detail-content">
                <div class="detail-grid">
                    <div class="detail-item">
                        <strong>Tanggal kejadian</strong>
                        <span>{{ $report->incident_date ? $report->incident_date->format('d/m/Y') : 'Tidak dicantumkan' }}</span>
                    </div>
                    <div class="detail-item">
                        <strong>Lokasi kejadian</strong>
                        <span>{{ $report->incident_location ?: 'Tidak dicantumkan' }}</span>
                    </div>
                </div>

                <div class="code-label">DESKRIPSI KEJADIAN</div>
                <div class="description-box">{{ $report->incident_description }}</div>

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
                                <option value="selesai">Selesai</option>
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

                @if($report->handling_notes)
                <div class="history">
                    <h3>Catatan Penanganan Tersimpan</h3>
                    <div class="description-box">{{ $report->handling_notes }}</div>
                </div>
                @endif

                <div class="history">
                    <h3>Riwayat Penanganan</h3>
                    @forelse($report->histories as $history)
                    <div class="history-item">
                        <strong>{{ ucfirst(str_replace('_', ' ', $history->new_status)) }}</strong>
                        <p>{{ $history->created_at->format('d/m/Y H:i') }} · Petugas: {{ $history->user->name ?? 'Petugas tidak tersedia' }}</p>
                        <p>Status sebelumnya: {{ $history->old_status ? ucfirst(str_replace('_', ' ', $history->old_status)) : 'Laporan baru' }}</p>
                        @if($history->handling_notes)
                        <p>{{ $history->handling_notes }}</p>
                        @endif
                    </div>
                    @empty
                    <p style="font-size:11px;color:#718096">Belum ada riwayat penanganan.</p>
                    @endforelse
                </div>
            </div>
        </details>
    </div>
    @empty
    <div class="empty">
        <h3>Tidak Ada Pengaduan Aktif</h3>
        <p>Semua laporan sudah selesai ditangani atau belum ada laporan masuk.</p>
    </div>
    @endforelse

    <div class="pagination">{{ $reports->links() }}</div>
</main>

<footer>
    © 2026 NAWARA. All Rights Reserved.<br>
    Designed &amp; Developed by <span>Renaldi</span>
</footer>
</div>
</body>
</html>
