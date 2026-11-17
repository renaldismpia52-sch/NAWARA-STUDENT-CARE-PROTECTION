<?php

namespace App\Http\Controllers\GuruBK;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\SchoolClass;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $academicYears = AcademicYear::orderByDesc('name')->get();

        $cohorts = User::where('role', 'murid')
            ->whereNotNull('cohort_year')
            ->distinct()
            ->orderByDesc('cohort_year')
            ->pluck('cohort_year');

        $selectedYear = $request->input(
            'academic_year_id',
            AcademicYear::where('is_active', true)->value('id')
        );

        $classes = SchoolClass::when(
            $selectedYear,
            fn ($query) => $query->where('academic_year_id', $selectedYear)
        )->orderBy('grade_level')->orderBy('name')->get();

        $students = User::query()
            ->where('role', 'murid')
            ->where('verification_status', 'approved')
            ->when($request->filled('cohort_year'), function ($query) use ($request) {
                $query->where('cohort_year', $request->cohort_year);
            })
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = $request->search;
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('nis', 'like', "%{$search}%");
                });
            })
            ->when($selectedYear, function ($query) use ($selectedYear, $request) {
                $query->whereHas('studentClassHistories', function ($history) use ($selectedYear, $request) {
                    $history->where('academic_year_id', $selectedYear)
                        ->when($request->filled('school_class_id'), function ($classQuery) use ($request) {
                            $classQuery->where('school_class_id', $request->school_class_id);
                        });
                });
            })
            ->with(['studentClassHistories' => function ($history) use ($selectedYear) {
                $history->where('academic_year_id', $selectedYear)
                    ->with('schoolClass');
            }])
            ->orderBy('name')
            ->paginate(20)
            ->withQueryString();

        return view('guru-bk.students.index', compact(
            'students',
            'academicYears',
            'cohorts',
            'classes',
            'selectedYear'
        ));
    }
}
