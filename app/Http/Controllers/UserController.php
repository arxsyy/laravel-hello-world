<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Praktikum 1 - Nomor 2: Buka file controller dengan nama UserController.php dan ubah script seperti gambar di bawah ini
        $data = [
            'level_id' => 2,
            'username' => 'manager_dua',
            'nama' => 'Manager Dua',
            'password' => Hash::make('12345')
        ];
        UserModel::create($data);

        $user = UserModel::all();
        return view('user', ['data' => $user]);
    }
}
