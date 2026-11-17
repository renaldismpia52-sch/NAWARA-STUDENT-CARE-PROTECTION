@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold mb-2" style="color: #102855;">Poin Prestasi</h2>
    <p class="text-muted mb-4">Apresiasi untuk setiap usaha, kebaikan, dan pencapaian Murid.</p>

    <div class="card border-0 shadow-sm mb-4" style="background: #102855; color: white;">
        <div class="card-body p-4">
            <p class="mb-1">Total Poin Prestasi</p>
            <h1 class="fw-bold mb-0">{{ $totalPoints }} Poin</h1>
        </div>
    </div>

    <h5 class="fw-bold mb-3" style="color: #102855;">Riwayat Prestasi</h5>

    @forelse($achievements as $achievement)
        <div class="card border-0 shadow-sm mb-3">
            <div class="card-body">
                <h5 class="fw-bold mb-1">{{ $achievement->title }}</h5>
                <p class="text-muted mb-2">{{ $achievement->description ?: 'Terus semangat mempertahankan prestasi baikmu!' }}</p>
                <div class="d-flex justify-content-between flex-wrap gap-2">
                    <small class="text-muted">
                        {{ $achievement->achievement_date?->format('d M Y') ?? $achievement->created_at->format('d M Y') }}
                    </small>
                    <strong style="color: #B18A20;">+{{ $achievement->points }} Poin</strong>
                </div>
                @if($achievement->counselor)
                    <small class="text-muted d-block mt-2">Dicatat oleh Guru BK</small>
                @endif
            </div>
        </div>
    @empty
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center py-4">
                <p class="mb-0 text-muted">Belum ada prestasi yang dicatat. Terus lakukan hal-hal baik, ya!</p>
            </div>
        </div>
    @endforelse
</div>
@endsection
