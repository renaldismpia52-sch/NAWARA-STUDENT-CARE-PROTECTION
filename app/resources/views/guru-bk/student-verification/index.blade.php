<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Verifikasi Murid NAWARA</title>
<style>
:root {
    --navy: #102855;
    --blue: #183D64;
    --gold: #D9B64F;
    --ivory: #F8F7F1;
    --text: #34445a;
    --muted: #7b8797;
    --border: #e8eaf0;
}
* { box-sizing: border-box; }
body {
    margin: 0;
    padding: 22px;
    background: #f3f5f8;
    font-family: 'Segoe UI', Arial, sans-serif;
    color: var(--navy);
}
.container { max-width: 1100px; margin: auto; }
header {
    background:
        radial-gradient(circle at 15px 15px, rgba(217,182,79,.12) 1px, transparent 1.5px),
        linear-gradient(120deg, var(--navy), var(--blue));
    background-size: 22px 22px, auto;
    color: white;
    padding: 24px 26px;
    border-bottom: 4px solid var(--gold);
    border-radius: 14px 14px 0 0;
}
.brand h1 { margin: 0; font-size: 25px; letter-spacing: 4px; }
.brand p { margin: 5px 0 0; color: #EBD58F; font-size: 10px; letter-spacing: 1.5px; }
.tagline { margin-top: 12px; font-size: 12px; }
.content {
    background: white;
    padding: 26px;
    border: 1px solid var(--border);
    border-radius: 0 0 14px 14px;
    box-shadow: 0 7px 25px rgba(16,43,85,.05);
}
.page-heading { margin-bottom: 22px; }
.page-heading h2 { margin: 0; font-size: 23px; }
.page-heading p { color: var(--muted); margin: 7px 0 0; line-height: 1.6; }
.summary {
    background: var(--ivory);
    border: 1px solid #eee5c9;
    border-left: 4px solid var(--gold);
    padding: 17px 20px;
    border-radius: 10px;
    margin-bottom: 22px;
}
.summary strong { font-size: 25px; color: var(--navy); }
.summary span { color: var(--muted); margin-left: 8px; }
.alert {
    padding: 13px 16px;
    border-radius: 8px;
    margin-bottom: 18px;
    background: #e8f5ed;
    color: #21643b;
}
.bulk-toolbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 13px;
    padding: 15px;
    margin-bottom: 17px;
    background: #f7f8fb;
    border: 1px solid var(--border);
    border-radius: 10px;
}
.select-all {
    display: flex;
    align-items: center;
    gap: 9px;
    font-weight: 600;
    cursor: pointer;
}
input[type="checkbox"] {
    width: 19px;
    height: 19px;
    accent-color: var(--navy);
    cursor: pointer;
}
.selected-info { color: var(--muted); font-size: 13px; }
button {
    border: 0;
    padding: 10px 15px;
    border-radius: 7px;
    font-weight: 600;
    cursor: pointer;
}
.bulk-button, .approve { background: var(--navy); color: white; }
.bulk-button:disabled { opacity: .45; cursor: not-allowed; }
.student {
    border: 1px solid var(--border);
    border-radius: 11px;
    padding: 19px;
    margin-bottom: 14px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 18px;
    flex-wrap: wrap;
}
.student-info {
    display: flex;
    align-items: flex-start;
    gap: 13px;
}
.student-check { padding-top: 3px; }
.student h3 { margin: 0 0 7px; font-size: 16px; }
.student p { margin: 4px 0; color: var(--muted); font-size: 13px; }
.status {
    display: inline-block;
    margin-top: 8px;
    padding: 5px 10px;
    border-radius: 20px;
    background: #fff4d8;
    color: #8b6817;
    font-size: 11px;
    font-weight: 700;
}
.actions { display: flex; gap: 9px; }
.reject { background: #fff0f0; color: #a52d2d; }
.empty {
    text-align: center;
    padding: 45px 15px;
    border: 1px dashed #d9dee8;
    border-radius: 10px;
    color: var(--muted);
}
.empty strong {
    display: block;
    color: var(--navy);
    font-size: 17px;
    margin-bottom: 8px;
}
.back {
    display: inline-block;
    margin-top: 22px;
    color: var(--navy);
    text-decoration: none;
    font-weight: 600;
}
footer {
    text-align: center;
    padding: 20px 8px 5px;
    color: var(--muted);
    font-size: 11px;
}
footer span { color: var(--gold); font-weight: 700; }
@media (max-width: 600px) {
    body { padding: 12px; }
    .content { padding: 18px; }
    header { padding: 20px; }
    .student { align-items: flex-start; }
    .actions { width: 100%; }
    .actions form { flex: 1; }
    .actions button { width: 100%; }
    .bulk-toolbar { align-items: flex-start; }
    .bulk-button { width: 100%; }
}
</style>
</head>
<body>
<header>
    <div class="container">
        <div class="brand">
            <h1>NAWARA</h1>
            <p>STUDENT CARE & PROTECTION</p>
        </div>
        <div class="tagline">Setiap Anak Berharga, Setiap Suara Bermakna</div>
    </div>
</header>

<main class="content container">
    <div class="page-heading">
        <h2>Verifikasi Pendaftaran Murid</h2>
        <p>Periksa pendaftaran akun Murid sebelum memberikan akses ke dalam sistem NAWARA.</p>
    </div>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert">{{ $errors->first() }}</div>
    @endif

    <div class="summary">
        <strong>{{ $students->count() }}</strong>
        <span>Pendaftaran menunggu verifikasi</span>
    </div>

    @if($students->isNotEmpty())
        <div class="bulk-toolbar">
            <label class="select-all">
                <input type="checkbox" id="selectAll">
                Pilih Semua
            </label>

            <span class="selected-info">
                <strong id="selectedCount">0</strong> Murid dipilih
            </span>

            <form id="bulkApproveForm" method="POST"
                  action="{{ route('guru-bk.student-verification.bulk-approve') }}">
                @csrf
                <button type="submit" id="bulkApproveButton" class="bulk-button" disabled>
                    Setujui yang Dipilih
                </button>
            </form>
        </div>
    @endif

    @forelse($students as $student)
        <div class="student">
            <div class="student-info">
                <div class="student-check">
                    <input
                        type="checkbox"
                        class="student-checkbox"
                        name="student_ids[]"
                        value="{{ $student->id }}"
                        form="bulkApproveForm"
                        aria-label="Pilih {{ $student->name }}"
                    >
                </div>

                <div>
                    <h3>{{ $student->name }}</h3>
                    <p>Email: {{ $student->email }}</p>
                    <p>Terdaftar: {{ $student->created_at?->format('d/m/Y H:i') }}</p>
                    <span class="status">MENUNGGU VERIFIKASI</span>
                </div>
            </div>

            <div class="actions">
                <form method="POST"
                      action="{{ route('guru-bk.student-verification.approve', $student->id) }}"
                      onsubmit="return confirm('Setujui pendaftaran Murid ini?')">
                    @csrf
                    <button class="approve" type="submit">Setujui</button>
                </form>

                <form method="POST"
                      action="{{ route('guru-bk.student-verification.reject', $student->id) }}"
                      onsubmit="return confirm('Yakin ingin menolak pendaftaran ini?')">
                    @csrf
                    <button class="reject" type="submit">Tolak</button>
                </form>
            </div>
        </div>
    @empty
        <div class="empty">
            <strong>Belum Ada Pendaftaran Baru</strong>
            Semua pendaftaran Murid sudah diperiksa.
        </div>
    @endforelse

    <a class="back" href="{{ route('guru-bk.dashboard') }}">Kembali ke Dashboard Guru BK</a>
</main>

<footer>
    © 2026 NAWARA. All Rights Reserved.<br>
    Designed & Developed by <span>Renaldi</span>
</footer>

<script>
const selectAll = document.getElementById('selectAll');
const checks = Array.from(document.querySelectorAll('.student-checkbox'));
const selectedCount = document.getElementById('selectedCount');
const bulkButton = document.getElementById('bulkApproveButton');
const bulkForm = document.getElementById('bulkApproveForm');

function updateSelection() {
    const total = checks.filter(check => check.checked).length;
    selectedCount.textContent = total;
    bulkButton.disabled = total === 0;
    selectAll.checked = checks.length > 0 && total === checks.length;
    selectAll.indeterminate = total > 0 && total < checks.length;
}

if (selectAll) {
    selectAll.addEventListener('change', function () {
        checks.forEach(check => check.checked = selectAll.checked);
        updateSelection();
    });
}

checks.forEach(check => {
    check.addEventListener('change', updateSelection);
});

if (bulkForm) {
    bulkForm.addEventListener('submit', function (event) {
        const total = checks.filter(check => check.checked).length;

        if (total === 0) {
            event.preventDefault();
            return;
        }

        if (!confirm('Setujui ' + total + ' pendaftaran Murid yang dipilih?')) {
            event.preventDefault();
        }
    });
}
</script>
</body>
</html>
