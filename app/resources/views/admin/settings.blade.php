<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengaturan Sekolah | NAWARA</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            padding: 35px 18px;
            background: #f4f6fa;
            font-family: Arial, sans-serif;
            color: #26364a;
        }
        .container { max-width: 850px; margin: auto; }
        .header {
            background: #102B55;
            color: white;
            padding: 28px;
            border-radius: 14px 14px 0 0;
            border-bottom: 4px solid #D9B64F;
        }
        .brand {
            color: #EBD58F;
            font-size: 27px;
            font-weight: bold;
            letter-spacing: 3px;
        }
        .content {
            background: white;
            padding: 30px;
            border-radius: 0 0 14px 14px;
            box-shadow: 0 8px 25px #102b5512;
        }
        h2 { color: #102B55; }
        .intro { color: #68778a; line-height: 1.6; }
        label {
            display: block;
            font-weight: bold;
            margin: 20px 0 8px;
            color: #102B55;
        }
        input {
            width: 100%;
            padding: 13px;
            border: 1px solid #d5dce6;
            border-radius: 8px;
            font-size: 15px;
        }
        .button {
            margin-top: 28px;
            background: #102B55;
            color: white;
            border: 0;
            border-radius: 8px;
            padding: 14px 24px;
            font-weight: bold;
            cursor: pointer;
        }
        .success {
            padding: 13px;
            background: #e8f5ec;
            color: #23643a;
            border-radius: 8px;
            margin-bottom: 18px;
        }
        .error { color: #b42318; font-size: 13px; }
        .footer {
            text-align: center;
            color: #8792a2;
            font-size: 12px;
            margin-top: 25px;
        }
        .gold { color: #b08d3c; font-weight: bold; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <div class="brand">NAWARA</div>
        <strong>STUDENT CARE & PROTECTION</strong>
        <p>SMP Islam Al Azhar 52 Bengkulu</p>
    </div>
    <div class="content">
        <h2>Pengaturan Identitas Sekolah</h2>
        <p class="intro">
            Kelola identitas sekolah dan pejabat penanggung jawab
            untuk dokumen PDF resmi NAWARA.
        </p>

        @if (session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('admin.settings.update') }}">
            @csrf
            @method('PUT')

            <label>Nama Sekolah</label>
            <input name="school_name" value="{{ old('school_name', $settings->school_name) }}" required>
            @error('school_name') <div class="error">{{ $message }}</div> @enderror

            <label>Nama Kepala Sekolah</label>
            <input name="principal_name" value="{{ old('principal_name', $settings->principal_name) }}" placeholder="Nama Kepala Sekolah" required>
            @error('principal_name') <div class="error">{{ $message }}</div> @enderror

            <label>Koordinator Tim Anti-Bullying</label>
            <input name="anti_bullying_coordinator_name" value="{{ old('anti_bullying_coordinator_name', $settings->anti_bullying_coordinator_name) }}" placeholder="Nama Koordinator" required>
            @error('anti_bullying_coordinator_name') <div class="error">{{ $message }}</div> @enderror

            <button type="submit" class="button">SIMPAN PENGATURAN</button>
        </form>
    </div>
    <div class="footer">
        © 2026 NAWARA. All Rights Reserved.<br>
        <span class="gold">Designed & Developed by Renaldi</span>
    </div>
</div>
</body>
</html>
