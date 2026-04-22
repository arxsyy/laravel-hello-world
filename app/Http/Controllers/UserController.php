<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // READ - Menampilkan semua data user dengan relationship
    public function index()
    {
        // Menggunakan with() untuk eager loading relationship
        $user = UserModel::with('level')->get(); 
        return view('user', ['data' => $user]);
    }

    // CREATE - Menambah data user baru
    public function tambah()
    {
        return view('user_tambah');
    }

    public function tambah_simpan(Request $request)
    {
        $data = [
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'level_id' => $request->level_id,
        ];
        
        UserModel::create($data);
        return redirect('/user');
    }

    // UPDATE - Mengedit data user
    public function ubah($id)
    {
        $user = UserModel::with('level')->find($id);
        return view('user_ubah', ['data' => $user]);
    }

    public function ubah_simpan($id, Request $request)
    {
        $user = UserModel::find($id);
        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->password = Hash::make($request->password);
        $user->level_id = $request->level_id;
        $user->save();
        
        return redirect('/user');
    }

    // DELETE - Menghapus data user
    public function hapus($id)
    {
        $user = UserModel::find($id);
        $user->delete();
        
        return redirect('/user');
    }
}