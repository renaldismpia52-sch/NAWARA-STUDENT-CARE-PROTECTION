@extends('layouts.app')

@section('content')
<style>

:root {
    --navy:#102B55;
    --blue:#183D64;
    --gold:#D9B64F;
    --gold-light:#EBD58F;
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
    max-width:1100px;
    margin:auto;
}
header {
    background:
      radial-gradient(circle at 15px 15px,rgba(217,182,79,.10) 1px,transparent 1.5px),
      linear-gradient(120deg,var(--navy),var(--blue));
    background-size:22px 22px,auto;
    color:white;
    padding:22px 26px;
    border-bottom:4px solid var(--gold);
    border-radius:14px 14px 0 0;
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:15px;
}
.student-brand h1 {
    margin:0;
    font-size:25px;
    letter-spacing:4px;
}
.student-brand p {
    margin:5px 0 0;
    color:var(--gold-light);
    font-size:10px;
    letter-spacing:1.5px;
}
.student-tagline {
    margin-top:10px;
    color:white;
    font-size:12px;
    font-weight:600;
}
.student-header-info {
    text-align:right;
    color:#e6edf5;
    font-size:11px;
    line-height:1.8;
}
.content {
    background:white;
    padding:24px;
    border:1px solid var(--border);
    border-radius:0 0 14px 14px;
    box-shadow:0 7px 25px rgba(16,43,85,.05);
}
.page-heading {
    display:flex;
    justify-content:space-between;
    align-items:center;
    flex-wrap:wrap;
    gap:12px;
    margin-bottom:18px;
}
.page-heading h2 {
    margin:0;
    font-size:20px;
    color:var(--navy);
}
.page-heading p {
    margin:6px 0 0;
    color:var(--muted);
    font-size:12px;
    line-height:1.6;
}
.back-link {
    display:inline-block;
    padding:9px 14px;
    border:1px solid #dce2e9;
    border-radius:8px;
    color:var(--blue);
    background:white;
    font-size:12px;
    font-weight:700;
    text-decoration:none;
}
.back-link:hover {
    background:var(--ivory);
    border-color:var(--gold);
}
.student-panel {
    background:white;
    border:1px solid var(--border);
    border-top:3px solid var(--gold);
    border-radius:12px;
    padding:19px;
    margin:15px 0;
    box-shadow:0 4px 15px rgba(16,43,85,.04);
}
.student-panel h2 {
    margin:0 0 16px;
    color:var(--navy);
    font-size:16px;
}
.student-filters {
    display:grid;
    grid-template-columns:repeat(4,minmax(0,1fr));
    gap:14px;
}
.student-filters label {
    display:block;
    margin-bottom:7px;
    color:var(--navy);
    font-size:12px;
    font-weight:600;
}
.student-filters input,
.student-filters select {
    width:100%;
    min-height:40px;
    padding:9px 11px;
    border:1px solid var(--border);
    border-radius:8px;
    background:white;
    color:var(--text);
    font:inherit;
}
.student-filters input:focus,
.student-filters select:focus {
    outline:none;
    border-color:var(--gold);
    box-shadow:0 0 0 3px rgba(217,182,79,.15);
}
.student-actions {
    display:flex;
    flex-wrap:wrap;
    gap:10px;
    margin-top:16px;
}
.student-btn,
.student-reset {
    display:inline-block;
    padding:9px 14px;
    border-radius:8px;
    font-size:12px;
    font-weight:700;
    text-decoration:none;
    cursor:pointer;
}
.student-btn {
    background:var(--navy);
    color:white;
    border:1px solid var(--navy);
}
.student-btn:hover { background:var(--blue); }
.student-reset {
    background:var(--ivory);
    color:var(--navy);
    border:1px solid var(--gold);
}
.student-summary {
    margin:15px 0;
    padding:13px 16px;
    background:var(--ivory);
    border-left:4px solid var(--gold);
    border-radius:9px;
    color:#536176;
}
.student-summary strong { color:var(--navy); }
.student-table-wrap {
    width:100%;
    overflow-x:auto;
    border:1px solid var(--border);
    border-radius:10px;
}
.student-table {
    width:100%;
    border-collapse:collapse;
    background:white;
    font-size:12px;
}
.student-table th {
    padding:12px;
    background:var(--navy);
    color:white;
    text-align:left;
    font-weight:700;
    white-space:nowrap;
}
.student-table td {
    padding:12px;
    border-bottom:1px solid var(--border);
    color:var(--text);
}
.student-table tr:hover td { background:var(--ivory); }
.student-name { color:var(--navy); font-weight:700; }
.student-nis,.student-class { color:var(--muted); font-size:12px; }
.student-empty { padding:24px; text-align:center; color:var(--muted); }
.student-pagination { margin-top:16px; }
@media(max-width:760px) {
    body { padding:12px; }
    header { padding:18px; align-items:flex-start; }
    .student-header-info { text-align:right; }
    .student-filters { grid-template-columns:repeat(2,minmax(0,1fr)); }
    .student-panel { padding:16px; }
}
@media(max-width:480px) {
    header { flex-direction:column; }
    .student-header-info { text-align:left; }
    .student-filters { grid-template-columns:1fr; }
    .content { padding:18px; }
}

</style>

<div class="container">
    <header>
    <div class="student-brand">
        <h1>NAWARA</h1>
        <p>STUDENT CARE &amp; PROTECTION</p>
        <div class="student-tagline">Setiap Anak Berharga, Setiap Suara Bermakna</div>
    </div>
    <div class="student-header-info">
        DATABASE MURID<br>
        SMP Islam Al Azhar 52 Bengkulu
    </div>
</header>
<main class="content">
<div class="page-heading">
    <div>
        <h2>Data Murid</h2>
        <p>Kelola dan telusuri data Murid berdasarkan angkatan, tahun ajaran, dan kelas.</p>
    </div>
    <a href="{{ route('guru-bk.dashboard') }}" class="back-link">Kembali ke Dashboard</a>
</div>

    <section class="student-panel">
        <h2>Temukan Data Murid</h2>
        <form method="GET" action="{{ route('guru-bk.students.index') }}">
            <div class="student-filters">
                <div>
                    <label for="search">Nama atau NIS</label>
                    <input id="search" type="search" name="search"
                        value="{{ request('search') }}" placeholder="Cari nama / NIS...">
                </div>
                <div>
                    <label for="cohort_year">Angkatan Masuk</label>
                    <select id="cohort_year" name="cohort_year">
                        <option value="">Semua Angkatan</option>
                        @foreach($cohorts as $cohort)
                            <option value="{{ $cohort }}" @selected(request('cohort_year') == $cohort)>
                                Angkatan {{ $cohort }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="academic_year_id">Tahun Ajaran</label>
                    <select id="academic_year_id" name="academic_year_id">
                        <option value="">Semua Tahun Ajaran</option>
                        @foreach($academicYears as $year)
                            <option value="{{ $year->id }}" @selected($selectedYear == $year->id)>
                                {{ $year->name }}{{ $year->is_active ? ' • Aktif' : '' }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="school_class_id">Kelas</label>
                    <select id="school_class_id" name="school_class_id">
                        <option value="">Semua Kelas</option>
                        @foreach($classes as $class)
                            <option value="{{ $class->id }}" @selected(request('school_class_id') == $class->id)>
                                {{ $class->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="student-actions">
                    <button class="student-btn" type="submit">Terapkan Filter</button>
                    <a class="student-reset" href="{{ route('guru-bk.students.index') }}">Reset</a>
                </div>
            </div>
        </form>
    </section>

    <section class="student-panel">
        <div class="student-summary">
            <strong>Daftar Murid</strong>
            <span>{{ $students->total() }} Murid ditemukan</span>
        </div>

        <div class="student-table-wrap">
            <table class="student-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Murid</th>
                        <th>NIS</th>
                        <th>Angkatan</th>
                        <th>Kelas</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $student)
                        @php
                            $history = $student->studentClassHistories->first();
                        @endphp
                        <tr>
                            <td>{{ $students->firstItem() + $loop->index }}</td>
                            <td><div class="student-name">{{ $student->name }}</div></td>
                            <td>{{ $student->nis ?: 'Belum diisi' }}</td>
                            <td>{{ $student->cohort_year ?: 'Belum ditentukan' }}</td>
                            <td>
                                @if($history && $history->schoolClass)
                                    <span class="student-class">{{ $history->schoolClass->name }}</span>
                                @else
                                    <span style="color:#929bad">Belum ditempatkan</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="student-empty">
                                Belum ada data Murid yang sesuai dengan filter.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="student-pagination">
            {{ $students->links() }}
        </div>
    </section>
</div>
@endsection
