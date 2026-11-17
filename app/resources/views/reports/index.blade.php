
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pengaduan | NAWARA</title>
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
            max-width: 800px;
            margin: auto;
        }

        header {
            background: #102b55;
            color: white;
            text-align: center;
            padding: 28px;
            border-bottom: 4px solid #d9b64f;
            border-radius: 16px 16px 0 0;
        }

        header h1 {
            margin: 0 0 8px;
            letter-spacing: 4px;
        }

        .content {
            background: white;
            padding: 28px;
            border-radius: 0 0 16px 16px;
            box-shadow: 0 8px 30px rgba(16,43,85,.10);
        }

        .report {
            border: 1px solid #e1e5eb;
            border-left: 4px solid #d9b64f;
            border-radius: 10px;
            padding: 18px;
            margin: 18px 0;
        }

        .code {
            font-weight: bold;
            color: #183d64;
            font-size: 17px;
        }

        .status {
            display: inline-block;
            background: #fff5d6;
            color: #765b13;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
            margin-top: 10px;
        }

        .empty {
            background: #f8f7f1;
            padding: 25px;
            border-radius: 10px;
            text-align: center;
            line-height: 1.7;
        }

        .button {
            display: block;
            text-align: center;
            background: #102b55;
            color: white;
            text-decoration: none;
            padding: 14px;
            border: 2px solid #d9b64f;
            border-radius: 9px;
            margin-top: 25px;
            font-weight: bold;
        }

        footer {
            text-align: center;
            padding: 22px 10px;
            color: #64748b;
            font-size: 12px;
            line-height: 1.8;
        }
    </style>
</head>
<body>

<div class="container">

    <header>
        <h1>NAWARA</h1>
        <p>STUDENT CARE & PROTECTION</p>
        <p>SMP Islam Al Azhar 52 Bengkulu</p>
    </header>

    <div class="content">
        <h2>Riwayat Pengaduan</h2>

        <p>
            Berikut adalah daftar laporan yang kamu kirim
            dengan identitas akun.
        </p>

        @forelse ($reports as $report)
            <div class="report">
                <div class="code">
                    {{ $report->report_code }}
                </div>

                <p>
                    Jenis:
                    @switch($report->bullying_type)
                        @case('verbal') Verbal @break
                        @case('fisik') Fisik @break
                        @case('sosial') Sosial @break
                        @case('siber') Siber @break
                        @default Lainnya
                    @endswitch
                </p>

                <p>
                    Tanggal laporan:
                    {{ $report->created_at->format('d-m-Y') }}
                </p>

                <span class="status">
                    Status: {{ ucfirst($report->status) }}
                </span>
            </div>
        @empty
            <div class="empty">
                <strong>Belum ada riwayat pengaduan.</strong>
                <p>
                    Laporan yang kamu kirim dengan identitas akun
                    akan ditampilkan di halaman ini.
                </p>
            </div>
        @endforelse

        <a class="button" href="{{ route('reports.create') }}">
            + Buat Pengaduan Baru
        </a>

        <a class="button" href="{{ route('murid.dashboard') }}">
            Kembali ke Dashboard
        </a>
    </div>

    <footer>
        © 2026 NAWARA. All Rights Reserved.<br>
        Designed & Developed by Renaldi
    </footer>

</div>

</body>
</html>
