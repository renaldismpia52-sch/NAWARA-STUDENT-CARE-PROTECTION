@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold mb-2" style="color:#102B55;">Konsultasi Guru BK</h2>
    <p class="text-muted mb-4">Ruang aman untuk bercerita dan mendapatkan pendampingan.</p>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-4">
            <h5 class="fw-bold mb-3">Ajukan Konsultasi</h5>
            <form action="{{ route('consultations.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">Topik Konsultasi</label>
                    <select name="topic" class="form-select" required>
                        <option value="">Pilih topik</option>
                        @foreach(['Akademik', 'Pribadi', 'Sosial', 'Perundungan', 'Keluarga', 'Lainnya'] as $topic)
                            <option value="{{ $topic }}" @selected(old('topic') === $topic)>{{ $topic }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Ceritakan hal yang ingin dikonsultasikan</label>
                    <textarea name="message" class="form-control" rows="5" minlength="10" maxlength="3000" placeholder="Tuliskan ceritamu di sini..." required>{{ old('message') }}</textarea>
                </div>
                <button class="btn text-white px-4" style="background:#102B55;" type="submit">Kirim Permintaan Konsultasi</button>
            </form>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <h5 class="fw-bold mb-3">Riwayat Konsultasi Saya</h5>
            @forelse($consultations as $consultation)
                <div class="border rounded-3 p-3 mb-3">
                    <div class="d-flex justify-content-between flex-wrap gap-2 mb-2">
                        <strong>{{ $consultation->topic }}</strong>
                        <span class="badge {{ $consultation->status === 'selesai' ? 'bg-success' : ($consultation->status === 'diproses' ? 'bg-primary' : 'bg-warning text-dark') }}">
                            {{ ucfirst($consultation->status) }}
                        </span>
                    </div>
                    <p class="mb-2">{{ $consultation->message }}</p>
                    @if($consultation->response)
                        <div class="rounded-3 p-3 mt-3" style="background:#F8F7F1;">
                            <strong style="color:#102B55;">Tanggapan Guru BK</strong>
                            <p class="mb-0 mt-2">{{ $consultation->response }}</p>
                        </div>
                    @endif
                    <small class="text-muted">Diajukan {{ $consultation->created_at->format('d/m/Y H:i') }}</small>
                </div>
            @empty
                <p class="text-muted mb-0">Belum ada riwayat konsultasi.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
