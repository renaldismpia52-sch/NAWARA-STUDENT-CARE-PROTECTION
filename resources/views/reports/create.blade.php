
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pengaduan - NAWARA</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #F8F7F1;
            color: #102B55;
            min-height: 100vh;
            padding: 30px 15px;
        }

        .container {
            max-width: 760px;
            margin: auto;
        }

        .header {
            text-align: center;
            margin-bottom: 28px;
        }

        .brand {
            font-size: 34px;
            font-weight: bold;
            letter-spacing: 5px;
            color: #102B55;
        }

        .gold-line {
            width: 75px;
            height: 4px;
            background: #D9B64F;
            margin: 12px auto;
            border-radius: 10px;
        }

        .subtitle {
            font-size: 13px;
            color: #183D64;
            letter-spacing: 1px;
        }

        .card {
            background: white;
            border-radius: 18px;
            padding: 30px;
            border: 1px solid #EBD58F;
            box-shadow: 0 10px 30px rgba(16,43,85,0.08);
        }

        h1 {
            font-size: 25px;
            margin-bottom: 10px;
        }

        .description {
            color: #64748b;
            line-height: 1.7;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .notice {
            background: #F8F7F1;
            border-left: 4px solid #D9B64F;
            padding: 14px;
            border-radius: 8px;
            margin-bottom: 25px;
            font-size: 13px;
            line-height: 1.6;
        }

        .field {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 9px;
            font-size: 14px;
        }

        input, select, textarea {
            width: 100%;
            padding: 13px;
            border: 1px solid #d5dce5;
            border-radius: 9px;
            font-size: 14px;
            font-family: inherit;
            background: #fff;
            color: #102B55;
        }

        input:focus, select:focus, textarea:focus {
            outline: 2px solid #D9B64F;
            border-color: #D9B64F;
        }

        textarea {
            min-height: 140px;
            resize: vertical;
        }

        .anonymous {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            background: #F8F7F1;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 22px;
        }

        .anonymous input {
            width: 18px;
            height: 18px;
            margin-top: 2px;
        }

        .anonymous label {
            margin: 0;
            line-height: 1.5;
        }

        .error {
            color: #b91c1c;
            font-size: 13px;
            margin-top: 6px;
        }

        .button {
            display: block;
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 10px;
            background: #102B55;
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        .button:hover {
            background: #183D64;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 18px;
            color: #183D64;
            text-decoration: none;
            font-size: 14px;
        }

        footer {
            text-align: center;
            margin-top: 28px;
            color: #64748b;
            font-size: 12px;
            line-height: 1.8;
        }

        @media(max-width: 500px) {
            .card {
                padding: 22px 17px;
            }

            h1 {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <header class="header">
        <div class="brand">NAWARA</div>
        <div class="gold-line"></div>
        <div class="subtitle">STUDENT CARE & PROTECTION</div>
        <div class="subtitle" style="margin-top:8px;">
            SMP Islam Al Azhar 52 Bengkulu
        </div>
    </header>

    <main class="card">

        <h1>Formulir Pengaduan</h1>

        <p class="description">
            Setiap anak berharga, setiap suara bermakna.
            Ceritakan kejadian yang kamu alami atau saksikan.
            Kami akan menindaklanjuti laporan dengan penuh perhatian.
        </p>

        <div class="notice">
            <strong>Perlu kamu ketahui:</strong><br>
            Laporkan kejadian dengan jujur dan jelas.
            Jika kamu merasa tidak aman atau berada dalam bahaya,
            segera hubungi Guru BK atau orang dewasa tepercaya.
        </div>

        @if ($errors->any())
            <div class="notice" style="border-left-color:#b91c1c;">
                Mohon periksa kembali isian formulir kamu.
            </div>
        @endif

        <form method="POST" action="{{ route('reports.store') }}">
            @csrf

            <div class="field">
                <label for="bullying_type">Jenis Perundungan *</label>

                <select name="bullying_type" id="bullying_type" required>
                    <option value="">-- Pilih Jenis Perundungan --</option>
                    <option value="verbal" {{ old('bullying_type') == 'verbal' ? 'selected' : '' }}>Verbal (ejekan, hinaan, ancaman)</option>
                    <option value="fisik" {{ old('bullying_type') == 'fisik' ? 'selected' : '' }}>Fisik (memukul, mendorong, menendang)</option>
                    <option value="sosial" {{ old('bullying_type') == 'sosial' ? 'selected' : '' }}>Sosial (mengucilkan, mempermalukan)</option>
                    <option value="siber" {{ old('bullying_type') == 'siber' ? 'selected' : '' }}>Siber (perundungan melalui internet)</option>
                    <option value="lainnya" {{ old('bullying_type') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>

                @error('bullying_type')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="incident_description">Ceritakan Kejadian *</label>

                <textarea
                    name="incident_description"
                    id="incident_description"
                    placeholder="Ceritakan apa yang terjadi, siapa yang terlibat jika kamu mengetahuinya, dan bagaimana dampaknya..."
                    required
                >{{ old('incident_description') }}</textarea>

                @error('incident_description')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="incident_location">Lokasi Kejadian</label>

                <input
                    type="text"
                    name="incident_location"
                    id="incident_location"
                    value="{{ old('incident_location') }}"
                    placeholder="Contoh: Ruang kelas, koridor, lapangan"
                >

                @error('incident_location')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="incident_date">Tanggal Kejadian</label>

                <input
                    type="date"
                    name="incident_date"
                    id="incident_date"
                    value="{{ old('incident_date') }}"
                    max="{{ date('Y-m-d') }}"
                >

                @error('incident_date')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="anonymous">
                <input
                    type="checkbox"
                    name="is_anonymous"
                    id="is_anonymous"
                    value="1"
                    {{ old('is_anonymous') ? 'checked' : '' }}
                >

                <label for="is_anonymous">
                    Kirim sebagai laporan anonim.
                    Identitas akun tidak akan ditautkan pada laporan ini.
                </label>
            </div>

            <button type="submit" class="button">
                KIRIM LAPORAN
            </button>

        </form>

        <a href="{{ route('murid.dashboard') }}" class="back">
            ← Kembali ke Dashboard
        </a>

    </main>

    <footer>
        © 2026 NAWARA. All Rights Reserved.<br>
        Designed & Developed by Renaldi
    </footer>

</div>

</body>
</html>
