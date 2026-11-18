<?php
use App\Http\Controllers\ViolationController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\GuruBKController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->isMurid()) {
        return redirect()->route('murid.dashboard');
    }

    if ($user->isGuruBK()) {
        return redirect()->route('guru-bk.dashboard');
    }

    if ($user->isAdmin()) {
        return redirect()->route('admin.dashboard');
    }

    abort(403, 'Peran akun tidak dikenali.');
})->middleware('auth')->name('dashboard');

// Dashboard Murid
Route::get('/murid/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:murid'])
    ->name('murid.dashboard');

// Dashboard Guru BK
Route::get('/guru-bk/dashboard', [GuruBKController::class, 'index'])
    ->middleware(['auth', 'verified', 'role:guru_bk'])
    ->name('guru-bk.dashboard');

// Daftar Pengaduan: menampilkan seluruh laporan
Route::get('/guru-bk/pengaduan', [GuruBKController::class, 'reports'])
    ->middleware(['auth', 'verified', 'role:guru_bk'])
    ->name('guru-bk.reports');

// Tindak Lanjut: khusus laporan yang belum selesai
Route::get('/guru-bk/tindak-lanjut', [GuruBKController::class, 'followUps'])
    ->middleware(['auth', 'verified', 'role:guru_bk'])
    ->name('guru-bk.follow-ups');

// Memperbarui status dan catatan penanganan
Route::put('/guru-bk/pengaduan/{id}', [GuruBKController::class, 'updateReport'])
    ->middleware(['auth', 'verified', 'role:guru_bk'])
    ->name('guru-bk.reports.update');

// Unduh rekap PDF
Route::get('/guru-bk/rekap-pdf', [GuruBKController::class, 'downloadPdf'])
    ->middleware(['auth', 'verified', 'role:guru_bk'])
    ->name('guru-bk.reports.pdf');

Route::get('/guru-bk/data-murid', [\App\Http\Controllers\GuruBK\StudentController::class, 'index'])->middleware(['auth', 'verified', 'role:guru_bk'])->name('guru-bk.students.index');


Route::middleware(['auth', 'verified', 'role:guru_bk'])->prefix('guru-bk')->name('guru-bk.')->group(function () {
    Route::get('/impor-data-murid', [\App\Http\Controllers\GuruBK\StudentImportController::class, 'index'])->name('student-import.index');
    Route::post('/impor-data-murid', [\App\Http\Controllers\GuruBK\StudentImportController::class, 'store'])->name('student-import.store');
    Route::post('/impor-data-murid/{batch}/confirm', [\App\Http\Controllers\GuruBK\StudentImportController::class, 'confirm'])->name('student-import.confirm');

    Route::post('/impor-data-murid/{batch}/finalize', [\App\Http\Controllers\GuruBK\StudentImportController::class, 'finalize'])->name('student-import.finalize');
    Route::get('/tahun-ajaran', [\App\Http\Controllers\GuruBK\AcademicYearController::class, 'index'])->name('academic-years.index');
    Route::post('/tahun-ajaran', [\App\Http\Controllers\GuruBK\AcademicYearController::class, 'store'])->name('academic-years.store');
    Route::post('/tahun-ajaran/{academicYear}/aktifkan', [\App\Http\Controllers\GuruBK\AcademicYearController::class, 'activate'])->name('academic-years.activate');
    Route::post('/tahun-ajaran/{academicYear}/kelas', [\App\Http\Controllers\GuruBK\AcademicYearController::class, 'storeClass'])->name('academic-years.classes.store');
    Route::delete('/kelas/{schoolClass}', [\App\Http\Controllers\GuruBK\AcademicYearController::class, 'destroyClass'])->name('academic-years.classes.destroy');
});

// Dashboard Admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified', 'role:admin'])
    ->name('admin.dashboard');

// Fitur Murid
Route::middleware(['auth', 'verified', 'role:murid'])->group(function () {
    Route::get('/murid/ruang-cerita', [
        \App\Http\Controllers\StoryController::class,
        'index'
    ])->name('murid.stories.index');

    Route::post('/murid/ruang-cerita', [
        \App\Http\Controllers\StoryController::class,
        'store'
    ])->middleware('throttle:5,1')->name('murid.stories.store');

    Route::get('/murid/pengaduan', [ReportController::class, 'create'])
        ->name('reports.create');

    Route::get('/murid/riwayat-pengaduan', [ReportController::class, 'index'])
        ->name('reports.index');

    Route::post('/murid/pengaduan', [ReportController::class, 'store'])
        ->middleware('throttle:5,1')
        ->name('reports.store');
});

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Pengaturan Sekolah untuk Admin
Route::middleware(['auth', 'verified', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/pengaturan-sekolah', [
            \App\Http\Controllers\Admin\SchoolSettingController::class,
            'edit'
        ])->name('settings.edit');

        Route::put('/pengaturan-sekolah', [
            \App\Http\Controllers\Admin\SchoolSettingController::class,
            'update'
        ])->name('settings.update');

    // Manajemen Personel Admin
    Route::get('/personel', [\App\Http\Controllers\Admin\PersonnelController::class, 'index'])->name('personnel.index');
    Route::get('/personel/tambah', [\App\Http\Controllers\Admin\PersonnelController::class, 'create'])->name('personnel.create');
    Route::post('/personel', [\App\Http\Controllers\Admin\PersonnelController::class, 'store'])->name('personnel.store');
    });

// Ruang Cerita untuk Guru BK
Route::middleware(['auth', 'verified', 'role:guru_bk'])->group(function () {
    Route::get('/guru-bk/ruang-cerita', [
        \App\Http\Controllers\GuruBKStoryController::class,
        'index'
    ])->name('guru-bk.stories.index');

    Route::post('/guru-bk/ruang-cerita/{id}/balas', [
        \App\Http\Controllers\GuruBKStoryController::class,
        'reply'
    ])->middleware('throttle:10,1')->name('guru-bk.stories.reply');
});

// Konsultasi Guru BK - Murid
Route::middleware(['auth', 'verified', 'role:murid'])->group(function () {
    Route::get('/murid/konsultasi', [\App\Http\Controllers\ConsultationController::class, 'index'])
        ->name('consultations.index');

    Route::post('/murid/konsultasi', [\App\Http\Controllers\ConsultationController::class, 'store'])
        ->middleware('throttle:5,1')
        ->name('consultations.store');
});

// Konsultasi Guru BK - Guru BK
Route::middleware(['auth', 'verified', 'role:guru_bk'])->group(function () {
    Route::get('/guru-bk/konsultasi', [\App\Http\Controllers\ConsultationController::class, 'guruIndex'])
        ->name('guru-bk.consultations.index');

    Route::put('/guru-bk/konsultasi/{consultation}', [\App\Http\Controllers\ConsultationController::class, 'update'])
        ->name('guru-bk.consultations.update');
});

// Poin Prestasi - Murid
Route::middleware(['auth', 'verified', 'role:murid'])->group(function () {
    Route::get('/murid/poin-prestasi', [\App\Http\Controllers\AchievementController::class, 'index'])
        ->name('achievements.index');
});

// Poin Prestasi - Guru BK
Route::middleware(['auth', 'verified', 'role:guru_bk'])->group(function () {
    Route::get('/guru-bk/poin-prestasi', [\App\Http\Controllers\AchievementController::class, 'guruIndex'])
        ->name('guru-bk.achievements.index');

    Route::post('/guru-bk/poin-prestasi', [\App\Http\Controllers\AchievementController::class, 'store'])
        ->name('guru-bk.achievements.store');

    Route::delete('/guru-bk/poin-prestasi/{achievement}', [\App\Http\Controllers\AchievementController::class, 'destroy'])
        ->name('guru-bk.achievements.destroy');
});

// Adab & Akhlak - Murid
Route::middleware(['auth', 'verified', 'role:murid'])->group(function () {
    Route::get('/murid/adab-akhlak', [\App\Http\Controllers\CharacterNoteController::class, 'index'])
        ->name('character-notes.index');
});

// Adab & Akhlak - Guru BK
Route::middleware(['auth', 'verified', 'role:guru_bk'])->group(function () {
    Route::get('/guru-bk/adab-akhlak', [\App\Http\Controllers\CharacterNoteController::class, 'guruIndex'])
        ->name('guru-bk.character-notes.index');

    Route::post('/guru-bk/adab-akhlak', [\App\Http\Controllers\CharacterNoteController::class, 'store'])
        ->name('guru-bk.character-notes.store');
});
Route::middleware(['auth', 'verified'])->get('/edukasi-anti-perundungan', [\App\Http\Controllers\EducationController::class, 'index'])->name('education.index');


// CATATAN PELANGGARAN MURID
Route::middleware(['auth', 'verified', 'role:murid'])->group(function () {
    Route::get('/murid/catatan-pelanggaran', [ViolationController::class, 'index'])->name('violations.index');
});

// CATATAN PELANGGARAN GURU BK
Route::middleware(['auth', 'verified', 'role:guru_bk'])->group(function () {
    Route::get('/guru-bk/catatan-pelanggaran', [ViolationController::class, 'guruIndex'])->name('guru-bk.violations.index');
    Route::post('/guru-bk/catatan-pelanggaran', [ViolationController::class, 'store'])->name('guru-bk.violations.store');
    Route::delete('/guru-bk/catatan-pelanggaran/{violation}', [ViolationController::class, 'destroy'])->name('guru-bk.violations.destroy');
});

// DEKLARASI SAHABAT TANPA PERUNDUNGAN
Route::post('/edukasi-anti-perundungan/deklarasi', [\App\Http\Controllers\EducationController::class, 'pledge'])
    ->middleware(['auth', 'verified', 'role:murid'])
    ->name('education.pledge');
Route::get('/menunggu-verifikasi', fn () => view('auth.verification-pending'))->name('verification.pending');

Route::middleware(['auth', 'verified', 'role:guru_bk'])->group(function () {
    Route::get('/guru-bk/verifikasi-murid', [\App\Http\Controllers\GuruBK\StudentVerificationController::class, 'index'])
        ->name('guru-bk.student-verification.index');

    Route::post('/guru-bk/verifikasi-murid/setujui-massal', [\App\Http\Controllers\GuruBK\StudentVerificationController::class, 'bulkApprove'])->name('guru-bk.student-verification.bulk-approve');

    Route::post('/guru-bk/verifikasi-murid/{user}/setujui', [\App\Http\Controllers\GuruBK\StudentVerificationController::class, 'approve'])
        ->name('guru-bk.student-verification.approve');

    Route::post('/guru-bk/verifikasi-murid/{user}/tolak', [\App\Http\Controllers\GuruBK\StudentVerificationController::class, 'reject'])
        ->name('guru-bk.student-verification.reject');
});
