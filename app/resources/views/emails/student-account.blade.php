<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Akun NAWARA</title>
</head>
<body style="margin:0;padding:24px;background:#f3f5f8;font-family:Arial,sans-serif;color:#34445a;">
    <div style="max-width:560px;margin:auto;background:#fff;border-radius:12px;overflow:hidden;border:1px solid #e8eaf0;">
        <div style="background:#102B55;padding:28px;color:#fff;border-bottom:4px solid #D9B64F;">
            <h1 style="margin:0;">NAWARA</h1>
            <p>Student Care &amp; Protection</p>
        </div>

        <div style="padding:28px;">
            <h2 style="color:#102B55;">Selamat datang, {{ $studentName }}!</h2>

            <p>Akun Murid NAWARA Anda telah dibuat dan disetujui oleh Guru BK.</p>

            <p><strong>Email:</strong><br>{{ $studentEmail }}</p>

            <p><strong>Kata sandi sementara:</strong></p>
            <div style="display:inline-block;padding:12px;background:#f8f7f1;border:1px solid #e8eaf0;border-radius:6px;">
                {{ $temporaryPassword }}
            </div>

            <p style="margin-top:24px;">
                <a href="{{ $loginUrl }}" style="display:inline-block;padding:12px 22px;background:#102B55;color:#fff;text-decoration:none;border-radius:6px;font-weight:bold;">
                    Masuk ke NAWARA
                </a>
            </p>

            <p style="color:#a33;font-weight:bold;">
                Anda wajib mengganti kata sandi sementara setelah login pertama.
            </p>

            <p>Jaga kerahasiaan akun dan jangan bagikan kata sandi kepada siapa pun.</p>

            <p>Salam hangat,<br><strong>Tim NAWARA</strong></p>
        </div>

        <div style="padding:18px;text-align:center;background:#f8f7f1;font-size:12px;color:#7b8797;">
            © 2026 NAWARA. All Rights Reserved.
        </div>
    </div>
</body>
</html>
