<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserFormRequest;
use Illuminate\Support\Facades\Hash;

class SettingUserController extends Controller
{
    //
    public function index() {
        $data = User::paginate(10);
        return view('user.index', compact('data'));
    }

    public function create() {
        return view('user.create');
    }

    public function store(Request $request) {
        dd('Ya');
        // dd($request->name);
        // $dataSave = User::create([
        //     'name'      => $request->name,
        //     'email'     => $request->email,
        //     'password'  => Hash::make($request->password)
        // ]);

        // $message = '';
        // $alert = '';
        // if($dataSave) {
        //     $message = 'Data Berhasil Ditambahkan';
        //     $alert = 'success';
        // } else {
        //     $message = 'Data Gagal Ditambahkan';
        //     $alert  = 'danger';
        // }

        // return redirect()->route('user.index')->with([
        //     'message' => $message,
        //     'alert'   => $alert
        // ]);
    }
}
