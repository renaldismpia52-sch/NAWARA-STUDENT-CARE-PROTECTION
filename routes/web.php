
<?php
use App\Http\Controllers\ViolationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
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
Route::get('/guru-bk/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:guru_bk'])
    ->name('guru-bk.dashboard');

// Dashboard Admin
Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:admin'])
    ->name('admin.dashboard');

// Pengaduan Perundungan khusus Murid
Route::middleware(['auth', 'verified', 'role:murid'])->group(function () {

    Route::get('/murid/pengaduan', [ReportController::class, 'create'])
        ->name('reports.create');

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
// ==========================================
// CATATAN PELANGGARAN & PEMBINAAN MURID
// ==========================================

Route::middleware(['auth', 'verified', 'role:murid'])->group(function () {

    Route::get('/murid/catatan-pelanggaran', [
        ViolationController::class,
        'index'
    ])->name('violations.index');

});

// ==========================================
// CATATAN PELANGGARAN & PEMBINAAN GURU BK
// ==========================================

Route::middleware(['auth', 'verified', 'role:guru_bk'])->group(function () {

    Route::get('/guru-bk/catatan-pelanggaran', [
        ViolationController::class,
        'guruIndex'
    ])->name('guru-bk.violations.index');

    Route::post('/guru-bk/catatan-pelanggaran', [
        ViolationController::class,
        'store'
    ])->name('guru-bk.violations.store');

    Route::delete('/guru-bk/catatan-pelanggaran/{violation}', [
        ViolationController::class,
        'destroy'
    ])->name('guru-bk.violations.destroy');

});
require __DIR__.'/auth.php';
