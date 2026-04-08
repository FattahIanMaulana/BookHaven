<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminAkunController extends Controller
{
    // List semua user
    public function index()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') abort(403);

        $users = User::latest()->get();
        return view('admin.akun.index', compact('users'));
    }

    // Halaman tambah akun
    public function create()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') abort(403);

        return view('admin.akun.create');
    }

    // Proses simpan akun baru
    public function store(Request $request)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') abort(403);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email:rfc,dns',
                'regex:/^[a-zA-Z0-9]{5,}@gmail\.com$/',
                'unique:users,email'
            ],
            'password' => [
                'required',
                'string',
                'min:6',
                function($attr, $value, $fail) {
                    if (preg_match('/\s/', $value)) {
                        $fail('Password tidak boleh mengandung spasi atau karakter kosong.');
                    }
                    
                }
            ],
            'password_confirmation' => 'required|same:password',
            'role' => 'required|in:admin,staff,user',
            'alamat' => 'nullable|string|max:255',
            'no_telepon' => 'nullable|string|max:20',
        ]);

        User::create([
            'name' => $request->name,
            'email' => strtolower($request->email),
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
        ]);

        return redirect()->route('admin.akun.index')
            ->with('success', 'Akun berhasil dibuat.');
    }

    // Halaman edit akun
    public function edit($id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') abort(403);

        $user = User::findOrFail($id);
        return view('admin.akun.edit', compact('user'));
    }

    // Proses update akun
    public function update(Request $request, $id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') abort(403);

        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email:rfc,dns',
                'regex:/^[a-zA-Z0-9]{5,}@gmail\.com$/',
                'unique:users,email,' . $user->id,
            ],
            'password' => [
                'nullable',
                'string',
                'min:6',
                function($attr, $value, $fail) use ($user) {
                    if (!$value) return; // kosong = skip
                    if (preg_match('/\s/', $value)) {
                        $fail('Password tidak boleh mengandung spasi atau karakter kosong.');
                    }
                    
                }
            ],
            'password_confirmation' => 'nullable|same:password',
            'role' => 'required|in:admin,staff,user',
            'alamat' => 'nullable|string|max:255',
            'no_telepon' => 'nullable|string|max:20',
        ]);

        // ❌ Cegah admin ubah role sendiri jadi non-admin
        if ($user->id === Auth::id() && $request->role !== 'admin') {
            return back()->with('error', 'Tidak bisa mengubah role akun sendiri')->withInput();
        }

        // ❌ Cegah hapus semua admin (minimal 1 admin)
        if ($user->role === 'admin' && $request->role !== 'admin') {
            $totalAdmin = User::where('role', 'admin')->count();
            if ($totalAdmin <= 1) {
                return back()->with('error', 'Minimal harus ada 1 admin dalam sistem')->withInput();
            }
        }

        $user->update([
            'name' => $request->name,
            'email' => strtolower($request->email),
            'role' => $request->role,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
        ]);

        if ($request->password) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);
        }

        return redirect()->route('admin.akun.index')
            ->with('success', 'Akun berhasil diperbarui.');
    }

    // Hapus akun
    public function destroy($id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') abort(403);

        $user = User::findOrFail($id);

        // ❌ Cegah hapus diri sendiri
        if ($user->id === Auth::id()) {
            return back()->with('error', 'Tidak bisa menghapus akun sendiri');
        }

        // ❌ Cegah hapus admin terakhir
        if ($user->role === 'admin') {
            $totalAdmin = User::where('role', 'admin')->count();
            if ($totalAdmin <= 1) {
                return back()->with('error', 'Tidak bisa menghapus admin terakhir');
            }
        }

        $user->delete();

        return redirect()->route('admin.akun.index')
            ->with('success', 'Akun berhasil dihapus.');
    }
}
