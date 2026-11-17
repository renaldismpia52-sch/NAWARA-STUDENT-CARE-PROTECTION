
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan Perundungan | NAWARA</title>
    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            padding: 30px 16px;
            background: #f8f7f1;
            font-family: Arial, sans-serif;
            color: #102b55;
        }

        .container {
            max-width: 760px;
            margin: auto;
        }

        .header {
            background: #102b55;
            color: white;
            padding: 28px 24px;
            border-radius: 18px 18px 0 0;
            text-align: center;
            border-bottom: 4px solid #d9b64f;
        }

        .header h1 {
            margin: 0 0 8px;
            letter-spacing: 4px;
            font-size: 30px;
        }

        .header p {
            margin: 5px 0;
            font-size: 13px;
        }

        .form-card {
            background: white;
            padding: 30px;
            border-radius: 0 0 18px 18px;
            box-shadow: 0 8px 30px rgba(16,43,85,.10);
        }

        .intro {
            background: #f8f7f1;
            border-left: 4px solid #d9b64f;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
            line-height: 1.6;
            font-size: 14px;
        }

        label {
            display: block;
            font-weight: bold;
            margin: 18px 0 8px;
        }

        input, select, textarea {
            width: 100%;
            padding: 13px;
            border: 1px solid #d5d9e0;
            border-radius: 9px;
            font-size: 15px;
            background: white;
            color: #102b55;
        }

        textarea {
            min-height: 140px;
            resize: vertical;
        }

        .anonymous {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 22px 0;
            padding: 15px;
            background: #f8f7f1;
            border-radius: 9px;
            line-height: 1.5;
        }

        .anonymous input {
            width: auto;
        }

        button {
            width: 100%;
            padding: 15px;
            background: #102b55;
            color: white;
            border: 2px solid #d9b64f;
            border-radius: 9px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #183d64;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #183d64;
            text-decoration: none;
            font-weight: bold;
        }

        .error {
            color: #b42318;
            font-size: 13px;
            margin-top: 5px;
        }

        footer {
            text-align: center;
            padding: 22px 10px;
            color: #64748b;
            font-size: 12px;
            line-height: 1.8;
        }

        @media(max-width: 500px) {
            .form-card { padding: 20px; }
        }
    </style>
</head>
<body>

<div class="container">

    <div class="header">
        <h1>NAWARA</h1>
        <p>STUDENT CARE & PROTECTION</p>
        <p>SMP Islam Al Azhar 52 Bengkulu</p>
    </div>

    <div class="form-card">

        <h2>Formulir Pengaduan</h2>

        <div class="intro">
            <strong>Setiap Anak Berharga, Setiap Suara Bermakna.</strong><br>
            Kamu berhak merasa aman dan dihargai.
            Ceritakan kejadian yang kamu alami atau saksikan.
            Laporanmu akan ditangani secara bertanggung jawab.
        </div>

        @if ($errors->any())
            <div class="error">
                Mohon periksa kembali data yang kamu masukkan.
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('reports.store') }}">
            @csrf

            <label for="bullying_type">Jenis Perundungan</label>
            <select name="bullying_type" id="bullying_type" required>
                <option value="">Pilih jenis perundungan</option>
                <option value="verbal">Verbal (ejekan atau hinaan)</option>
                <option value="fisik">Fisik (kekerasan tubuh)</option>
                <option value="sosial">Sosial (pengucilan)</option>
                <option value="siber">Siber (melalui internet)</option>
                <option value="lainnya">Lainnya</option>
            </select>

            <label for="incident_description">Ceritakan Kejadian</label>
            <textarea
                name="incident_description"
                id="incident_description"
                placeholder="Ceritakan apa yang terjadi..."
                required
                minlength="10"
                maxlength="5000"
            >{{ old('incident_description') }}</textarea>

            <label for="incident_location">Lokasi Kejadian (Opsional)</label>
            <input
                type="text"
                name="incident_location"
                id="incident_location"
                value="{{ old('incident_location') }}"
                placeholder="Contoh: Ruang kelas atau halaman sekolah"
            >

            <label for="incident_date">Tanggal Kejadian (Opsional)</label>
            <input
                type="date"
                name="incident_date"
                id="incident_date"
                value="{{ old('incident_date') }}"
                max="{{ date('Y-m-d') }}"
            >

            <div class="anonymous">
                <input
                    type="checkbox"
                    name="is_anonymous"
                    value="1"
                    id="is_anonymous"
                    {{ old('is_anonymous') ? 'checked' : '' }}
                >
                <label for="is_anonymous" style="margin:0">
                    Kirim sebagai laporan anonim (identitas dirahasiakan)
                </label>
            </div>

            <button type="submit">Kirim Laporan</button>
        </form>

        <a class="back" href="{{ route('murid.dashboard') }}">
            ← Kembali ke Dashboard
        </a>

    </div>

    <footer>
        © 2026 NAWARA. All Rights Reserved.<br>
        Designed & Developed by Renaldi
    </footer>

</div>

</body>
</html>
