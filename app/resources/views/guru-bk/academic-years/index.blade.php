@extends('layouts.app')

@section('content')

<style>
:root {
  --navy: #102855;
  --blue: #183D64;
  --gold: #D9B64F;
  --ivory: #F8F7F1;
  --gold-light: #EBD58F;
  --text: #34445a;
  --muted: #7b8797;
  --border: #e8eaf0;
}
* { box-sizing: border-box; }
.academic-page {
  max-width: 1100px;
  margin: 22px auto;
  padding: 0 20px 35px;
  color: var(--text);
  font-family: 'Segoe UI', Arial, sans-serif;
  font-size: 13px;
}
.academic-header {
  background:
    radial-gradient(circle at 15px 15px, rgba(217,182,79,.10) 1px, transparent 1.5px),
    linear-gradient(120deg, var(--navy), var(--blue));
  background-size: 22px 22px, auto;
  color: white;
  padding: 22px 26px;
  border-bottom: 4px solid var(--gold);
  border-radius: 14px 14px 0 0;
}
.academic-brand {
  color: var(--gold-light);
  font-size: 10px;
  letter-spacing: 2px;
  font-weight: 700;
  margin-bottom: 7px;
}
.academic-header h2 {
  margin: 0;
  font-size: 22px;
  letter-spacing: 4px;
}
.academic-header p {
  margin: 7px 0 0;
  color: var(--gold-light);
  font-size: 12px;
  line-height: 1.6;
}
.academic-content {
  background: white;
  padding: 24px;
  border: 1px solid var(--border);
  border-top: 0;
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
.page-heading h2 { margin: 0; color: var(--navy); font-size: 20px; }
.page-heading p { margin: 6px 0 0; color: var(--muted); font-size: 12px; line-height: 1.6; }
.back-link {
  display: inline-block;
  padding: 9px 14px;
  border: 1px solid #dce2e9;
  border-radius: 8px;
  color: var(--blue);
  background: white;
  font-size: 12px;
  font-weight: 700;
  text-decoration: none;
}
.back-link:hover { background: var(--ivory); border-color: var(--gold); }
.academic-intro {
  padding: 15px 17px;
  margin-bottom: 20px;
  background: var(--ivory);
  border-left: 4px solid var(--gold);
  border-radius: 9px;
  color: #536176;
  line-height: 1.7;
  font-size: 12px;
}
.academic-card {
  background: white;
  border: 1px solid var(--border);
  border-top: 3px solid var(--gold);
  border-radius: 12px;
  padding: 19px;
  margin-bottom: 16px;
  box-shadow: 0 4px 15px rgba(16,43,85,.04);
}
.academic-card h3 { margin: 0 0 15px; color: var(--navy); font-size: 15px; }
.academic-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 13px; }
.academic-label { display: block; margin-bottom: 6px; color: var(--text); font-size: 12px; font-weight: 700; }
.academic-input {
  width: 100%;
  min-height: 38px;
  padding: 9px 11px;
  border: 1px solid #dce2e9;
  border-radius: 7px;
  background: white;
  color: var(--text);
  font-family: inherit;
  font-size: 12px;
}
.academic-input:focus { outline: 2px solid var(--gold-light); border-color: var(--gold); }
.academic-button {
  display: inline-block;
  margin-top: 13px;
  padding: 9px 14px;
  border: 1px solid var(--gold);
  border-radius: 7px;
  background: var(--navy);
  color: white;
  font-size: 11px;
  font-weight: 700;
  cursor: pointer;
}
.academic-button:hover { background: var(--blue); }
.academic-button.dark { background: var(--blue); border-color: var(--blue); }
.academic-button.danger { margin: 0; padding: 7px 11px; background: white; color: #a94444; border-color: #e7caca; }
.academic-button.danger:hover { background: #fff0f0; }
.academic-year { padding: 16px; margin-top: 12px; border: 1px solid var(--border); border-radius: 9px; background: white; }
.academic-year.active { border-color: var(--gold); background: var(--ivory); }
.academic-year h4 { margin: 0 0 6px; color: var(--navy); font-size: 15px; }
.academic-muted { color: var(--muted); font-size: 12px; line-height: 1.6; }
.academic-status { display: inline-block; margin-top: 7px; padding: 5px 9px; border-radius: 5px; background: #f4edda; color: #80651f; font-size: 11px; font-weight: 700; }
.academic-class { display: flex; justify-content: space-between; align-items: center; gap: 12px; padding: 10px 0; border-bottom: 1px solid var(--border); }
.academic-class:last-child { border-bottom: 0; }
.academic-class-name { color: var(--text); font-size: 12px; }
.academic-subsection { margin-top: 17px; padding-top: 14px; border-top: 1px solid var(--border); color: var(--navy); }
.academic-subsection strong { font-size: 12px; }
.academic-alert { padding: 11px 14px; margin-bottom: 14px; border-radius: 8px; background: #edf8f0; color: #23653b; font-size: 12px; }
.academic-error { background: #fff0f0; color: #963d3d; }
@media (max-width: 600px) {
  .academic-page { padding: 0 12px 25px; margin: 16px auto; }
  .academic-header { padding: 19px 17px; }
  .academic-header h2 { font-size: 19px; }
  .academic-content { padding: 14px; }
  .academic-card { padding: 14px; }
  .academic-class { align-items: flex-start; }
}

</style>


<div class="academic-page">

    <header class="academic-header">
        <div class="academic-brand">NAWARA STUDENT CARE & PROTECTION</div>
        <div class="academic-header-title">
            <h2>Pengelolaan Akademik</h2>
            <p>Tahun Ajaran dan Rombongan Belajar NAWARA</p>
        </div>
    </header>

    <main class="academic-content">
        <div class="page-heading">
            <div>
                <h2>Tahun Ajaran & Kelas</h2>
                <p>Pengaturan tahun akademik dan rombongan belajar NAWARA</p>
            </div>
            <a href="{{ route('guru-bk.dashboard') }}" class="back-link">Kembali ke Dashboard</a>
        </div>

        <div class="academic-intro">
            Kelola tahun ajaran dan rombongan belajar Murid secara teratur.
            Pilih tahun ajaran aktif untuk mengatur kelas pada periode berjalan.
        </div>

        @if(session('success'))
            <div class="academic-alert">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="academic-alert academic-error">{{ session('error') }}</div>
        @endif

        @if($errors->any())
            <div class="academic-alert academic-error">
                <strong>Periksa kembali data:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="academic-card">
            <h3>Tambah Tahun Ajaran</h3>

            <form method="POST" action="{{ route('guru-bk.academic-years.store') }}">
                @csrf

                <div class="academic-grid">
                    <div>
                        <label class="academic-label">Nama Tahun Ajaran</label>
                        <input class="academic-input" name="name"
                            placeholder="Contoh: 2026/2027"
                            value="{{ old('name') }}" required>
                    </div>

                    <div>
                        <label class="academic-label">Tanggal Mulai</label>
                        <input class="academic-input" type="date" name="starts_on"
                            value="{{ old('starts_on') }}" required>
                    </div>

                    <div>
                        <label class="academic-label">Tanggal Selesai</label>
                        <input class="academic-input" type="date" name="ends_on"
                            value="{{ old('ends_on') }}" required>
                    </div>
                </div>

                <button class="academic-button" type="submit">+ Simpan Tahun Ajaran</button>
            </form>
        </section>

        <section class="academic-card">
            <h3>Daftar Tahun Ajaran</h3>

            @forelse($academicYears as $year)
                <div class="academic-year {{ $year->is_active ? 'active' : '' }}">

                    <div class="academic-grid">
                        <div>
                            <h4>{{ $year->name }}</h4>

                            <div class="academic-muted">
                                {{ $year->starts_on?->format('d M Y') ?? 'Tanggal mulai belum diatur' }}
                                - {{ $year->ends_on?->format('d M Y') ?? 'Tanggal selesai belum diatur' }}
                            </div>

                            <p class="academic-muted">
                                {{ $year->classes->count() }} kelas terdaftar
                            </p>

                            @if($year->is_active)
                                <span class="academic-status">Tahun Ajaran Aktif</span>
                            @endif
                        </div>

                        <div>
                            @if(!$year->is_active)
                                <form method="POST" action="{{ route('guru-bk.academic-years.activate', $year) }}">
                                    @csrf
                                    <button class="academic-button dark" type="submit">
                                        Jadikan Aktif
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>

                    <div class="academic-subsection">
                        <strong>Daftar Kelas</strong>

                        @forelse($year->classes as $class)
                            <div class="academic-class">
                                <span class="academic-class-name">
                                    {{ $class->name }}
                                    <span class="academic-muted">- Kelas {{ $class->grade_level }}</span>
                                </span>

                                <form method="POST"
                                    action="{{ route('guru-bk.academic-years.classes.destroy', $class) }}"
                                    onsubmit="return confirm('Hapus kelas ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="academic-button danger" type="submit">Hapus</button>
                                </form>
                            </div>
                        @empty
                            <p class="academic-muted">Belum ada kelas untuk tahun ajaran ini.</p>
                        @endforelse
                    </div>

                    <form method="POST"
                        action="{{ route('guru-bk.academic-years.classes.store', $year) }}"
                        class="academic-subsection">
                        @csrf

                        <strong>Tambah Kelas</strong>

                        <div class="academic-grid" style="margin-top:12px">
                            <div>
                                <label class="academic-label">Nama Kelas</label>
                                <input class="academic-input" name="name"
                                    placeholder="Contoh: VII A" required>
                            </div>

                            <div>
                                <label class="academic-label">Tingkat</label>
                                <select class="academic-input" name="grade_level" required>
                                    <option value="">Pilih tingkat</option>
                                    <option value="7">VII</option>
                                    <option value="8">VIII</option>
                                    <option value="9">IX</option>
                                </select>
                            </div>
                        </div>

                        <button class="academic-button" type="submit">+ Tambah Kelas</button>
                    </form>
                </div>
            @empty
                <p class="academic-muted">
                    Belum ada tahun ajaran. Tambahkan tahun ajaran pertama di atas.
                </p>
            @endforelse
        </section>

    </main>
</div>
@endsection
