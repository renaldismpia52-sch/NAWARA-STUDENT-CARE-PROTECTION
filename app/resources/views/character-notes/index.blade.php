@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold mb-2" style="color: #102855;">Adab & Akhlak</h2>
    <p class="text-muted mb-4">
        Ruang untuk melihat perkembangan sikap, kebiasaan baik, dan karakter positifmu.
    </p>

    <div class="card border-0 shadow-sm mb-4" style="background: #102855; color: white;">
        <div class="card-body p-4">
            <h5 class="fw-bold">Terus Tumbuh Menjadi Lebih Baik</h5>
            <p class="mb-0">
                Setiap kebaikan kecil adalah langkah berharga dalam membangun karakter.
            </p>
        </div>
    </div>

    <h5 class="fw-bold mb-3" style="color: #102855;">Catatan Perkembanganmu</h5>

    @forelse($notes as $note)
        <div class="card border-0 shadow-sm mb-3">
            <div class="card-body">
                <span class="badge bg-warning text-dark mb-2">{{ $note->category }}</span>
                <p class="mb-2">{{ $note->note }}</p>
                <small class="text-muted">
                    {{ $note->note_date?->format('d M Y') ?? $note->created_at->format('d M Y') }}
                </small>
                @if($note->counselor)
                    <small class="text-muted d-block mt-1">Dicatat oleh Guru BK</small>
                @endif
            </div>
        </div>
    @empty
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center py-4">
                <p class="text-muted mb-0">
                    Belum ada catatan perkembangan. Terus biasakan perilaku baik setiap hari, ya!
                </p>
            </div>
        </div>
    @endforelse
</div>
@endsection
