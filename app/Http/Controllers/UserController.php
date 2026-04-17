<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::with('attempts');
        if ($request->has('search') && !empty($request->search))
            {
                $search = $request->search;
                $query->where(function($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
            }
        $users = $query->latest()->paginate(9);
        return view('admin.user.index', compact('users'));
    }
    public function create()
    {

    }
    public function store()
    {

    }
    public function edit(User $user)
    {
        $user->load(['attempts', 'materials']);
        return view('admin.user.edit', compact('user'));
    }
    public function update(Request $request, User $user)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'role' => 'sometimes|in:admin,user',
        'password' => 'nullable|string|min:8|confirmed',
    ]);
    $user->name = $request->name;
    $user->email = $request->email;
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }
    if (isset($validated['role'])) {
        $user->role = $request->role;
    }
    $user->save();

    return redirect()->route('dashboard.users.index')->with('success', 'User berhasil diperbarui.');
}
    public function destroy(User $user)
{
    if ($user->role === 'admin') {
        $adminCount = User::where('role', 'admin')->count();
        if ($adminCount <= 1) {
            return back()->with('error', 'Tidak dapat menghapus satu-satunya admin.');
        }
    }
    try {
        $user->delete();

        return redirect()->route('dashboard.users.index')
            ->with('success', 'Materi berhasil dihapus.');
    } catch (\Exception $e) {
        return back()->with('error', 'Gagal menghapus: ' . $e->getMessage());
    }
}
    public function show()
    {

    }

}
