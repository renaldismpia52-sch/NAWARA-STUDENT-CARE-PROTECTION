<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<style>
@page { margin: 28px 30px; }
body {
    font-family: DejaVu Sans, sans-serif;
    font-size: 10px;
    color: #263449;
}
.header {
    text-align: center;
    border-bottom: 3px solid #D9B64F;
    padding-bottom: 12px;
    margin-bottom: 18px;
}
.brand {
    font-size: 25px;
    font-weight: bold;
    letter-spacing: 4px;
    color: #102B55;
}
.school {
    font-size: 14px;
    font-weight: bold;
    color: #102B55;
    margin-top: 5px;
}
.tagline { color: #8A7130; margin-top: 5px; }
h2 {
    color: #102B55;
    text-align: center;
    font-size: 16px;
    margin: 18px 0 5px;
}
.subtitle {
    text-align: center;
    color: #667085;
    margin-bottom: 18px;
}
.summary {
    width: 100%;
    border-collapse: separate;
    border-spacing: 7px;
    margin-bottom: 15px;
}
.summary td {
    background: #F1F4F8;
    border: 1px solid #DCE2EA;
    padding: 10px;
    text-align: center;
    width: 25%;
}
.summary strong {
    display: block;
    font-size: 18px;
    color: #102B55;
    margin-bottom: 4px;
}
.section-title {
    color: #102B55;
    font-size: 12px;
    font-weight: bold;
    margin: 16px 0 8px;
}
table.data {
    width: 100%;
    border-collapse: collapse;
}
table.data th {
    background: #102B55;
    color: white;
    padding: 8px 5px;
    border: 1px solid #102B55;
    font-size: 9px;
}
table.data td {
    border: 1px solid #D7DDE5;
    padding: 7px 5px;
    vertical-align: top;
    line-height: 1.5;
}
table.data tr:nth-child(even) { background: #F7F8FA; }
.status {
    font-weight: bold;
    color: #102B55;
}
.signatures {
    width: 100%;
    border-collapse: collapse;
    margin-top: 30px;
    page-break-inside: avoid;
}
.signatures td {
    width: 33.33%;
    text-align: center;
    vertical-align: top;
    padding: 5px 12px;
}
.sign-space { height: 65px; }
.sign-name {
    font-weight: bold;
    text-decoration: underline;
    color: #102B55;
}
.note {
    margin-top: 18px;
    padding: 9px;
    background: #F5F3EA;
    border-left: 3px solid #D9B64F;
    font-size: 8px;
    line-height: 1.5;
}
.footer {
    margin-top: 20px;
    border-top: 1px solid #D9B64F;
    padding-top: 8px;
    text-align: center;
    color: #777;
    font-size: 8px;
}
</style>
</head>
<body>

<div class="header">
    <div class="brand">NAWARA</div>
    <div class="school">
        {{ $settings->school_name ?? 'SMP Islam Al Azhar 52 Bengkulu' }}
    </div>
    <div class="tagline">
        Setiap Anak Berharga, Setiap Suara Bermakna
    </div>
    <div style="color:#667085;margin-top:4px;">
        NAWARA Student Care &amp; Protection
    </div>
</div>

<h2>REKAPITULASI PENGADUAN PERUNDUNGAN</h2>
<div class="subtitle">
    Dokumen Administrasi Penanganan dan Perlindungan Murid
    <br>
    Dicetak pada {{ now()->format('d/m/Y H:i') }}
</div>

<table class="summary">
    <tr>
        <td><strong>{{ $totalReports }}</strong>Total Pengaduan</td>
        <td><strong>{{ $pendingReports }}</strong>Menunggu</td>
        <td><strong>{{ $inProgressReports }}</strong>Dalam Penanganan</td>
        <td><strong>{{ $completedReports }}</strong>Selesai</td>
    </tr>
</table>

<div class="section-title">DAFTAR DAN RINGKASAN PENGADUAN</div>

<table class="data">
    <thead>
        <tr>
            <th width="4%">No.</th>
            <th width="12%">Kode Laporan</th>
            <th width="10%">Jenis</th>
            <th width="12%">Tanggal Kejadian</th>
            <th width="28%">Ringkasan Kejadian</th>
            <th width="13%">Lokasi</th>
            <th width="11%">Petugas Terakhir</th>
            <th width="10%">Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($reports as $report)
            <tr>
                <td align="center">{{ $loop->iteration }}</td>
                <td>{{ $report->report_code }}</td>
                <td>{{ ucfirst($report->bullying_type) }}</td>
                <td>
                    {{ $report->incident_date
                        ? $report->incident_date->format('d/m/Y')
                        : '-' }}
                </td>
                <td>
                    {{ \Illuminate\Support\Str::limit(
                        strip_tags($report->incident_description),
                        180
                    ) }}
                </td>
                <td>{{ $report->incident_location ?: '-' }}</td>
                <td>
                    {{ $report->histories->first()?->user?->name
                        ?? 'Belum ditetapkan' }}
                </td>
                <td class="status">
                    {{ ucfirst(str_replace('_', ' ', $report->status)) }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" align="center">
                    Belum ada pengaduan pada periode ini.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="note">
    <strong>CATATAN KERAHASIAAN:</strong>
    Dokumen ini merupakan dokumen administrasi terbatas untuk pihak
    sekolah yang berwenang. Identitas pelapor anonim dan catatan konseling
    internal tidak dicantumkan. Ringkasan kejadian hanya digunakan untuk
    keperluan koordinasi penanganan dan perlindungan Murid.
</div>

<table class="signatures">
    <tr>
        <td>
            Petugas BK / Tim Penanganan
            <div class="sign-space"></div>
            <div class="sign-name">
                Petugas sesuai riwayat laporan
            </div>
        </td>
        <td>
            Koordinator Tim Anti-Bullying
            <div class="sign-space"></div>
            <div class="sign-name">
                {{ $settings->anti_bullying_coordinator_name ?? 'Belum diatur' }}
            </div>
        </td>
        <td>
            Kepala Sekolah
            <div class="sign-space"></div>
            <div class="sign-name">
                {{ $settings->principal_name ?? 'Belum diatur' }}
            </div>
        </td>
    </tr>
</table>

<div class="footer">
    © 2026 NAWARA. All Rights Reserved.
    <br>
    Designed &amp; Developed by Renaldi
</div>

</body>
</html>
