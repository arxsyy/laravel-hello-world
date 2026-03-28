<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class UserController extends Controller
{
    public function index()
    {
        // coba akses model usermodel
        $user = UserModel::all(); // ambil semua data dari table m_user
        return view('user', ['data' => $user]);
    }
}
