@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold mb-2" style="color:#102B55;">Permintaan Konsultasi Murid</h2>
    <p class="text-muted mb-4">Kelola permintaan konsultasi dan berikan pendampingan kepada Murid.</p>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @forelse($consultations as $consultation)
        <div class="card border-0 shadow-sm mb-3">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between flex-wrap gap-2 mb-3">
                    <div>
                        <h5 class="fw-bold mb-1" style="color:#102B55;">
                            {{ $consultation->student->name ?? 'Akun Murid tidak tersedia' }}
                        </h5>
                        <span class="text-muted">{{ $consultation->topic }}</span>
                    </div>
                    <span class="badge {{ $consultation->status === 'selesai' ? 'bg-success' : ($consultation->status === 'diproses' ? 'bg-primary' : 'bg-warning text-dark') }}">
                        {{ ucfirst($consultation->status) }}
                    </span>
                </div>

                <div class="rounded-3 p-3 mb-3" style="background:#F8F7F1;">
                    <strong>Pesan dari Murid</strong>
                    <p class="mb-0 mt-2">{{ $consultation->message }}</p>
                </div>

                <small class="text-muted d-block mb-3">
                    Diajukan {{ $consultation->created_at->format('d/m/Y H:i') }}
                </small>

                <form action="{{ route('guru-bk.consultations.update', $consultation) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Status Konsultasi</label>
                        <select name="status" class="form-select" required>
                            <option value="menunggu" @selected($consultation->status === 'menunggu')>Menunggu</option>
                            <option value="diproses" @selected($consultation->status === 'diproses')>Sedang Diproses</option>
                            <option value="selesai" @selected($consultation->status === 'selesai')>Selesai</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggapan Guru BK</label>
                        <textarea name="response" class="form-control" rows="3" maxlength="3000" placeholder="Tuliskan tanggapan atau tindak lanjut...">{{ old('response', $consultation->response) }}</textarea>
                    </div>

                    <button type="submit" class="btn text-white px-4" style="background:#102B55;">
                        Simpan Tindak Lanjut
                    </button>
                </form>
            </div>
        </div>
    @empty
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center py-5">
                <h5 class="fw-bold" style="color:#102B55;">Belum Ada Permintaan Konsultasi</h5>
                <p class="text-muted mb-0">Permintaan dari Murid akan muncul di halaman ini.</p>
            </div>
        </div>
    @endforelse
</div>
@endsection
