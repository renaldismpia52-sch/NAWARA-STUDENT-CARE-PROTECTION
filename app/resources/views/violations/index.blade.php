@extends('layouts.app')

@section('content')
<style>
    .student-violation-page {
        background: #F8F7F1;
        min-height: 100vh;
        padding: 30px 16px;
        color: #102B55;
    }
    .student-violation-wrap {
        max-width: 950px;
        margin: auto;
    }
    .student-violation-header {
        background: #102B55;
        color: white;
        padding: 28px;
        border-radius: 16px;
        margin-bottom: 22px;
    }
    .student-violation-header h1 {
        margin: 0 0 8px;
        font-size: 25px;
    }
    .student-violation-header p {
        margin: 0;
        color: #EBD58F;
    }
    .student-violation-summary {
        background: white;
        padding: 20px;
        border-radius: 14px;
        margin-bottom: 22px;
        box-shadow: 0 4px 16px rgba(16,43,85,.06);
    }
    .student-violation-summary strong {
        display: block;
        font-size: 28px;
        color: #102B55;
    }
    .student-violation-summary span {
        color: #64748B;
    }
    .student-violation-card {
        background: white;
        padding: 22px;
        border-radius: 14px;
        margin-bottom: 16px;
        box-shadow: 0 4px 16px rgba(16,43,85,.06);
    }
    .student-violation-card h2 {
        margin: 0 0 10px;
        font-size: 19px;
    }
    .student-violation-meta {
        color: #64748B;
        font-size: 13px;
        margin-bottom: 13px;
    }
    .student-violation-card p {
        line-height: 1.6;
        white-space: pre-line;
    }
    .student-severity {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        text-transform: capitalize;
    }
    .student-severity-ringan { background: #E5F4E9; color: #24663A; }
    .student-severity-sedang { background: #FFF1D6; color: #875A0A; }
    .student-severity-berat { background: #FCE5E5; color: #9A2929; }
    .guidance-box {
        background: #F4F6F8;
        border-left: 4px solid #D9B64F;
        border-radius: 8px;
        padding: 13px 15px;
        margin-top: 14px;
    }
    .guidance-box strong {
        display: block;
        margin-bottom: 6px;
    }
    .empty-violation {
        background: white;
        padding: 30px;
        text-align: center;
        border-radius: 14px;
        color: #64748B;
    }
    @media (max-width: 600px) {
        .student-violation-header,
        .student-violation-card { padding: 19px; }
    }
</style>

<div class="student-violation-page">
    <div class="student-violation-wrap">
        <header class="student-violation-header">
            <h1>Catatan Pelanggaran &amp; Pembinaan</h1>
            <p>Ruang untuk memahami, memperbaiki diri, dan terus bertumbuh menjadi lebih baik.</p>
        </header>

        <section class="student-violation-summary">
            <strong>{{ $violations->count() }}</strong>
            <span>Jumlah catatan pelanggaran</span>
            <hr>
            <strong>{{ $totalPoints }}</strong>
            <span>Total poin tercatat</span>
        </section>

        @forelse($violations as $violation)
            <article class="student-violation-card">
                <h2>{{ $violation->title }}</h2>

                <div class="student-violation-meta">
                    {{ $violation->incident_date->format('d F Y') }}
                    &nbsp;•&nbsp;
                    Guru BK: {{ $violation->counselor->name ?? 'Belum ditentukan' }}
                </div>

                <span class="student-severity student-severity-{{ $violation->severity }}">
                    {{ $violation->severity }}
                </span>

                <p><strong>Poin:</strong> {{ $violation->points }}</p>

                @if($violation->description)
                    <p><strong>Keterangan kejadian:</strong><br>{{ $violation->description }}</p>
                @endif

                <div class="guidance-box">
                    <strong>Catatan Pembinaan dan Tindak Lanjut</strong>
                    {{ $violation->guidance_notes ?: 'Belum ada catatan pembinaan.' }}
                </div>
            </article>
        @empty
            <div class="empty-violation">
                <h2>Belum Ada Catatan</h2>
                <p>Saat ini belum ada catatan pelanggaran untuk akun Murid ini. Terus pertahankan sikap positif dan semangat belajar!</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
