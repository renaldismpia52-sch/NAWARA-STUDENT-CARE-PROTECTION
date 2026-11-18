<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PersonnelAssignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonnelController extends Controller
{
    public function index()
    {
        $personnel = User::query()
            ->whereIn('role', [
                'admin',
                'guru_bk',
                'kepsek',
                'tim_anti_bullying',
            ])
            ->with([
                'personnelAssignments' => function ($query) {
                    $query->where('is_active', true);
                },
            ])
            ->orderBy('name')
            ->get();

        return view('admin.personnel.index', compact('personnel'));
    }

    public function create()
    {
        $roles = [
            'admin' => 'Admin',
            'guru_bk' => 'Guru BK',
            'kepsek' => 'Kepala Sekolah',
            'tim_anti_bullying' => 'Tim Anti-Bullying',
        ];

        $positions = [
            'kepala_sekolah' => 'Kepala Sekolah',
            'anggota_tim_anti_bullying' => 'Anggota Tim Anti-Bullying',
            'koordinator' => 'Koordinator',
        ];

        return view('admin.personnel.create', compact(
            'roles',
            'positions'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'nullable|in:male,female',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,guru_bk,kepsek,tim_anti_bullying',
            'position' => 'nullable|in:kepala_sekolah,anggota_tim_anti_bullying,koordinator',
            'notes' => 'nullable|string|max:2000',
        ]);

        if ($validated['role'] === 'guru_bk' && empty($validated['gender'])) {
            return back()
                ->withErrors(['gender' => 'Gender Guru BK wajib dipilih.'])
                ->withInput();
        }

        DB::transaction(function () use ($validated) {
            $user = new User();
            $user->name = $validated['name'];
            $user->gender = $validated['gender'] ?? null;
            $user->email = $validated['email'];
            $user->password = $validated['password'];
            $user->role = $validated['role'];
            $user->verification_status = 'approved';
            $user->must_change_password = true;
            $user->save();

            if (!empty($validated['position'])) {
                PersonnelAssignment::create([
                    'user_id' => $user->id,
                    'position' => $validated['position'],
                    'is_active' => true,
                    'assigned_by' => auth()->id(),
                    'notes' => $validated['notes'] ?? null,
                ]);
            }
        });

        return redirect()
            ->route('admin.personnel.index')
            ->with('success', 'Akun personel berhasil dibuat.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
