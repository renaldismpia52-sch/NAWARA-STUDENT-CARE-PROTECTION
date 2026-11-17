<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Status Pendaftaran | NAWARA</title>
<style>
*{box-sizing:border-box}
body{
    margin:0;min-height:100vh;display:flex;align-items:center;
    justify-content:center;padding:22px;background:#f3f5f8;
    font-family:'Segoe UI',Arial,sans-serif;color:#102855
}
.card{
    width:100%;max-width:460px;background:white;border-radius:15px;
    overflow:hidden;box-shadow:0 8px 30px rgba(16,40,85,.09);
    text-align:center
}
header{
    padding:27px;color:white;
    background:radial-gradient(circle at 15px 15px,rgba(217,182,79,.12) 1px,transparent 1.5px),linear-gradient(120deg,#102855,#183D64);
    background-size:22px 22px,auto;border-bottom:4px solid #D9B64F
}
header h1{margin:0;letter-spacing:4px;font-size:27px}
header p{margin:5px 0 0;color:#EBD58F;font-size:10px;letter-spacing:1.5px}
.content{padding:35px 27px}
.symbol{
    width:66px;height:66px;margin:0 auto 20px;border-radius:50%;
    display:flex;align-items:center;justify-content:center;
    background:#f8f7f1;color:#b18b30;font-size:30px;font-weight:bold
}
h2{font-size:22px;margin:0 0 14px}
.message{color:#64748b;line-height:1.8;font-size:14px}
.rejected{color:#a52d2d}
.pending{color:#102855}
a{
    display:inline-block;margin-top:23px;padding:12px 25px;
    border-radius:8px;background:#102855;color:white;
    text-decoration:none;font-weight:600
}
footer{color:#7b8797;font-size:11px;padding:0 15px 23px;line-height:1.8}
footer span{color:#D9B64F;font-weight:bold}
</style>
</head>
<body>
<div class="card">
<header>
<h1>NAWARA</h1>
<p>STUDENT CARE & PROTECTION</p>
</header>
<main class="content">
@if(request('status') === 'rejected')
<div class="symbol">!</div>
<h2 class="rejected">Pendaftaran Ditolak</h2>
<p class="message">
Mohon maaf, pendaftaran akun Murid Anda belum disetujui oleh Guru BK.
Silakan hubungi Guru BK untuk mendapatkan informasi lebih lanjut.
</p>
@else
<div class="symbol">i</div>
<h2 class="pending">Menunggu Verifikasi</h2>
<p class="message">
Terima kasih telah mendaftar di NAWARA – Student Care & Protection.
Akun Murid Anda sedang menunggu pemeriksaan dan persetujuan Guru BK.
Anda dapat masuk setelah akun disetujui.
</p>
@endif
<a href="{{ route('login') }}">Kembali ke Login</a>
</main>
<footer>
© 2026 NAWARA. All Rights Reserved.<br>
Designed & Developed by <span>Renaldi</span>
</footer>
</div>
</body>
</html>
