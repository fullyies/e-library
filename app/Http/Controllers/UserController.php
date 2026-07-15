<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Menampilkan daftar user.
     */
   public function index()
{
    $users = User::orderBy('id', 'DESC')->get();

    return view('user.index', compact('users'));
}

    /**
     * Form tambah user.
     */
    public function create()
{
    return view('user.create');
}

    /**
     * Simpan user baru.
     */
    public function store(Request $request)
{
    $request->validate([

        'name' => 'required|max:100',

        'username' => 'required|max:50|unique:users',

        'email' => 'required|email|unique:users',

        'password' => 'required|min:6',

        'role' => 'required'

    ]);

    User::create([

        'name' => $request->name,

        'username' => $request->username,

        'email' => $request->email,

        'password' => Hash::make($request->password),

        'role' => $request->role

    ]);

    return redirect()
            ->route('user.index')
            ->with('success','User berhasil ditambahkan.');
}

    /**
     * Detail user.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Form edit user.
     */
   public function edit(string $id)
{
    $user = User::findOrFail($id);

    return view('user.edit', compact('user'));
}

    /**
     * Update user.
     */
    public function update(Request $request, string $id)
{
    $request->validate([

        'name' => 'required|max:100',

        'username' => 'required|max:50|unique:users,username,' . $id,

        'email' => 'required|email|unique:users,email,' . $id,

        'role' => 'required'

    ]);

    $user = User::findOrFail($id);

    $user->name = $request->name;
    $user->username = $request->username;
    $user->email = $request->email;
    $user->role = $request->role;

    // Jika password diisi
    if($request->password != ''){
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect()
            ->route('user.index')
            ->with('success','User berhasil diubah.');
}

    /**
     * Hapus user.
     */
   public function destroy(string $id)
{
   if (session('id_user') == $id) {
    return redirect()->back()
        ->with('error', 'Anda tidak dapat menghapus akun yang sedang digunakan.');
}
    $user = User::findOrFail($id);

    $user->delete();

    return redirect()->route('user.index')
        ->with('success', 'User berhasil dihapus.');
}
}