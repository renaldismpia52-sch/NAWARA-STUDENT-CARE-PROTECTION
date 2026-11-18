<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ruang Cerita - NAWARA</title>
    <style>
        body{margin:0;background:#F8F7F1;font-family:Segoe UI,Arial,sans-serif;color:#102B55}
        header{background:#102B55;color:white;padding:24px}
        header h1{margin:0;color:#EBD58F}
        main{max-width:850px;margin:30px auto;padding:0 18px}
        .card{background:white;padding:24px;border-radius:15px;margin-bottom:22px;box-shadow:0 4px 18px #102b5512}
        label{display:block;font-weight:600;margin:15px 0 7px}
        input,textarea{width:100%;box-sizing:border-box;padding:13px;border:1px solid #ccd3dc;border-radius:9px;font:inherit}
        textarea{min-height:150px;resize:vertical}
        button{background:#102B55;color:white;border:0;border-radius:9px;padding:13px 22px;font-weight:600;margin-top:16px}
        .success{background:#e6f5e9;padding:12px;border-radius:8px;color:#205b31}
        .muted{color:#68778a;font-size:14px}
        .story{border-top:1px solid #e5e8ed;padding:18px 0;overflow-wrap:anywhere}
        a{color:#EBD58F}

.button {
    display:inline-block;
    background:#102b55;
    color:white;
    padding:12px 22px;
    border-radius:9px;
    text-decoration:none;
    font-weight:600;
}
.anonymous-option {
    margin:4px 0 0 !important;
    padding:7px 10px !important;
}
.anonymous-option label {
    display:flex !important;
    align-items:center !important;
    gap:9px !important;
    margin:0 !important;
    padding:0 !important;
}
.anonymous-option input[type="checkbox"] {
    width:18px !important;
    height:18px !important;
    margin:0 !important;
    padding:0 !important;
    flex:0 0 18px !important;
}
.anonymous-option small {
    margin:2px 0 0 27px !important;
}
.story-submit {
    display:inline-block;
    margin-top:3px !important;
}


.back-link {
    display:inline-block;
    padding:9px 14px;
    border:1px solid #dce2e9;
    border-radius:8px;
    color:#102b55;
    font-size:12px;
    font-weight:700;
    text-decoration:none;
}
.back-link:hover {
    background:#f8f7f1;
    border-color:#d9b64f;
}
\n</style>
</head>
<body>
<header>
    <h1>NAWARA</h1>
    <p>Ruang Cerita</p>
    <small>Setiap Anak Berharga, Setiap Suara Bermakna</small>
</header>
<main>
    <div class="card">
        <h2>💬 Ceritakan Perasaanmu</h2>
        <p class="muted">Tuliskan apa yang ingin kamu sampaikan. Ceritamu bersifat pribadi dan hanya dapat diakses oleh pihak yang berwenang.</p>

        @if(session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif

        @if($errors->any())
            <p class="success">{{ $errors->first() }}</p>
        @endif


<form method="POST" action="{{ route('murid.stories.store') }}">
            @csrf
            <label for="counselor_id">Pilih Guru BK tujuan cerita</label>
<select id="counselor_id" name="counselor_id" required>
    <option value="">-- Pilih Guru BK --</option>
    @foreach($counselors as $counselor)
        <option value="{{ $counselor->id }}" {{ old('counselor_id') == $counselor->id ? 'selected' : '' }}>
            {{ $counselor->gender === 'female' ? 'Ibu Guru BK' : 'Bapak Guru BK' }} — {{ $counselor->name }}
        </option>
    @endforeach
</select>

<label for="title">Judul cerita (boleh dikosongkan)</label>
            <input id="title" name="title" maxlength="150" value="{{ old('title') }}" placeholder="Contoh: Aku ingin bercerita">

            <label for="content">Isi ceritamu</label>
            <textarea id="content" name="content" maxlength="5000" required placeholder="Tuliskan ceritamu di sini...">{{ old('content') }}</textarea>


<div class="anonymous-option" style="margin:2px 0 0; padding:6px 10px; background:#f5f7fb; border-radius:10px;">
    <label style="display:flex;align-items:center;gap:10px;cursor:pointer;">
        <input type="checkbox" name="is_anonymous" value="1" {{ old('is_anonymous') ? 'checked' : '' }}>
        <span><strong>Kirim sebagai anonim</strong></span>
    </label>
    <small style="display:block;margin:8px 0 0 28px;color:#666;">
        Nama kamu tidak akan ditampilkan kepada Guru BK.
    </small>
</div>

<button class="story-submit" type="submit">Kirim Cerita</button>
        </form>
    </div>

    <div class="card">
        <h2>📖 Cerita Pribadiku</h2>
        @forelse($stories as $story)
            <div class="story">
                <h3>{{ $story->title ?: 'Cerita tanpa judul' }}</h3>
                <p class="muted">{{ $story->created_at->format('d-m-Y H:i') }} · Status: {{ ucfirst($story->status) }}</p>
                <p>{{ $story->content }}</p>
                @if($story->counselor_reply)
                    <p><strong>Balasan Guru BK:</strong></p>
                    <p>{{ $story->counselor_reply }}</p>
                @endif
            </div>
        @empty
            <p class="muted">Belum ada cerita. Kamu boleh mulai menulis kapan saja.</p>
        @endforelse
    </div>

<p><a class="back-link" href="{{ route('murid.dashboard') }}">Kembali ke Dashboard</a></p>
</main>
</body>
</html>
