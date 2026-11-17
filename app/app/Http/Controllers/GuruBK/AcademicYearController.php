<?php

namespace App\Http\Controllers\GuruBK;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AcademicYearController extends Controller
{
    public function index()
    {
        $academicYears = AcademicYear::with('classes')
            ->orderByDesc('name')
            ->get();

        return view('guru-bk.academic-years.index', compact('academicYears'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:30', 'unique:academic_years,name'],
            'starts_on' => ['nullable', 'date'],
            'ends_on' => ['nullable', 'date', 'after_or_equal:starts_on'],
        ]);

        AcademicYear::create($validated);

        return back()->with('success', 'Tahun ajaran berhasil ditambahkan.');
    }

    public function activate(AcademicYear $academicYear)
    {
        DB::transaction(function () use ($academicYear) {
            AcademicYear::where('is_active', true)
                ->update(['is_active' => false]);

            $academicYear->update(['is_active' => true]);
        });

        return back()->with('success', 'Tahun ajaran aktif berhasil diperbarui.');
    }

    public function storeClass(Request $request, AcademicYear $academicYear)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:30'],
            'grade_level' => ['required', 'integer', 'in:7,8,9'],
        ]);

        $academicYear->classes()->create($validated);

        return back()->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function destroyClass(SchoolClass $schoolClass)
    {
        if ($schoolClass->studentHistories()->exists()) {
            return back()->with('error', 'Kelas tidak dapat dihapus karena sudah memiliki riwayat Murid.');
        }

        $schoolClass->delete();

        return back()->with('success', 'Kelas berhasil dihapus.');
    }
}
