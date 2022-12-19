<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserFormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class SettingUserController extends Controller
{
    //
    public function index() {
        $data = Http::get('http://107.172.204.17/jubelio/api/all/products/stock', [
            'email'     => 'blrsit21@gmail.com',
            'page'      => 1,
            'pageSize'  => 1
        ]);
        return response()->json([
            'data'  => $data
        ]);
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
