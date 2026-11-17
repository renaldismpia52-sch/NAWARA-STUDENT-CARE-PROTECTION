@extends('layouts.app')

@section('content')
<style>
:root{
    --navy:#102855;
    --blue:#183D64;
    --gold:#D9B64F;
    --ivory:#F8F7F1;
    --muted:#7b8797;
    --border:#e8eaf0;
}
.achievement-page{
    max-width:1100px;
    margin:25px auto;
    padding:0 18px;
    color:var(--navy);
    font-family:'Segoe UI',Arial,sans-serif;
}
.achievement-header{
    padding:22px 25px;
    color:white;
    border-bottom:4px solid var(--gold);
    border-radius:13px;
    background:linear-gradient(120deg,var(--navy),var(--blue));
    margin-bottom:20px;
}
.achievement-header h2{font-size:21px;margin:0 0 6px;font-weight:750}
.achievement-header p{margin:0;color:#e4eaf2;font-size:12px}
.achievement-panel{
    background:white;
    border:1px solid var(--border);
    border-radius:12px;
    padding:21px;
    margin-bottom:20px;
    box-shadow:0 4px 14px #1028550b;
}
.achievement-panel h3{
    color:var(--navy);
    font-size:15px;
    margin:0 0 17px;
    font-weight:750;
}
.achievement-form{
    display:grid;
    grid-template-columns:repeat(2,minmax(0,1fr));
    gap:13px;
}
.achievement-field{min-width:0}
.achievement-field.full{grid-column:1/-1}
.achievement-field label{
    display:block;
    font-size:12px;
    font-weight:650;
    margin-bottom:6px;
}
.achievement-field input,.achievement-field select,.achievement-field textarea{
    width:100%;
    padding:10px 11px;
    border:1px solid var(--border);
    border-radius:7px;
    font:inherit;
    font-size:12px;
    background:#fff;
    color:var(--navy);
}
.achievement-field input:focus,.achievement-field select:focus,.achievement-field textarea:focus{
    outline:2px solid #d9b64f55;
    border-color:var(--gold);
}
.achievement-button{
    border:0;
    border-radius:7px;
    padding:10px 17px;
    background:var(--navy);
    color:white;
    font-size:12px;
    font-weight:700;
    cursor:pointer;
}
.achievement-button:hover{background:var(--blue)}
.achievement-item{
    border:1px solid var(--border);
    border-left:3px solid var(--gold);
    border-radius:9px;
    padding:15px;
    margin-bottom:11px;
    display:flex;
    justify-content:space-between;
    gap:14px;
    align-items:flex-start;
}
.achievement-item h4{font-size:14px;margin:0 0 6px;color:var(--navy)}
.achievement-item p{font-size:12px;color:#526176;margin:4px 0}
.achievement-points{
    white-space:nowrap;
    color:#a17e24;
    font-size:13px;
    font-weight:800;
}
.achievement-meta{font-size:11px;color:var(--muted)}
.achievement-delete{
    margin-top:10px;
    border:1px solid #dc6b6b;
    background:white;
    color:#b83b3b;
    padding:6px 10px;
    border-radius:6px;
    font-size:11px;
    cursor:pointer;
}
.achievement-alert{
    padding:11px 14px;
    border-radius:8px;
    background:#edf8ef;
    color:#27633b;
    margin-bottom:15px;
    font-size:12px;
}
.achievement-empty{
    padding:22px;
    text-align:center;
    color:var(--muted);
    background:var(--ivory);
    border-radius:8px;
    font-size:12px;
}
@media(max-width:600px){
    .achievement-page{padding:0 11px;margin:16px auto}
    .achievement-header{padding:18px}
    .achievement-form{grid-template-columns:1fr}
    .achievement-field.full{grid-column:auto}
    .achievement-item{flex-direction:column}
}
</style>

<div class="achievement-page">
    <header class="achievement-header">
        <h2>Kelola Poin Prestasi</h2>
        <p>Catat pencapaian dan berikan apresiasi kepada Murid.</p>
    </header>

    @if(session('success'))
        <div class="achievement-alert">{{ session('success') }}</div>
    @endif

    <section class="achievement-panel">
        <h3>Tambah Prestasi Murid</h3>
        <form method="POST" action="{{ route('guru-bk.achievements.store') }}">
            @csrf
            <div class="achievement-form">
                <div class="achievement-field full">
                    <label>Pilih Murid</label>
                    <select name="user_id" required>
                        <option value="">-- Pilih Murid --</option>
                        @foreach($students as $student)
                            <option value="{{ $student->id }}" {{ old('user_id') == $student->id ? 'selected' : '' }}>{{ $student->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')<small style="color:#c33">{{ $message }}</small>@enderror
                </div>

                <div class="achievement-field full">
                    <label>Nama Prestasi</label>
                    <input type="text" name="title" maxlength="150" value="{{ old('title') }}" required>
                    @error('title')<small style="color:#c33">{{ $message }}</small>@enderror
                </div>

                <div class="achievement-field full">
                    <label>Deskripsi</label>
                    <textarea name="description" rows="3" maxlength="2000">{{ old('description') }}</textarea>
                    @error('description')<small style="color:#c33">{{ $message }}</small>@enderror
                </div>

                <div class="achievement-field">
                    <label>Jumlah Poin</label>
                    <input type="number" name="points" min="1" max="100" value="{{ old('points') }}" required>
                    @error('points')<small style="color:#c33">{{ $message }}</small>@enderror
                </div>

                <div class="achievement-field">
                    <label>Tanggal Prestasi</label>
                    <input type="date" name="achievement_date" value="{{ old('achievement_date') }}">
                    @error('achievement_date')<small style="color:#c33">{{ $message }}</small>@enderror
                </div>

                <div class="achievement-field full">
                    <button type="submit" class="achievement-button">Simpan Prestasi</button>
                </div>
            </div>
        </form>
    </section>

    <section class="achievement-panel">
        <h3>Riwayat Prestasi Murid</h3>

        @forelse($achievements as $achievement)
            <article class="achievement-item">
                <div style="min-width:0">
                    <h4>{{ $achievement->title }}</h4>
                    <p><strong>Murid:</strong> {{ $achievement->student->name ?? 'Tidak diketahui' }}</p>
                    @if($achievement->description)
                        <p>{{ $achievement->description }}</p>
                    @endif
                    <div class="achievement-meta">
                        {{ $achievement->achievement_date?->format('d M Y') ?? $achievement->created_at->format('d M Y') }}
                    </div>
                    <form method="POST" action="{{ route('guru-bk.achievements.destroy', $achievement) }}" onsubmit="return confirm('Hapus catatan prestasi ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="achievement-delete">Hapus Catatan</button>
                    </form>
                </div>
                <div class="achievement-points">+{{ $achievement->points }} Poin</div>
            </article>
        @empty
            <div class="achievement-empty">Belum ada catatan prestasi.</div>
        @endforelse
    </section>
</div>
@endsection
