<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserFormRequest;
use Illuminate\Support\Facades\Hash;

class SettingUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = User::paginate(10);
        return view('user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validation($request);
        $dataSave = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password)
        ]);

        $message = '';
        $alert = '';
        if($dataSave) {
            $message = 'Data Berhasil Ditambahkan';
            $alert = 'success';
        } else {
            $message = 'Data Gagal Ditambahkan';
            $alert  = 'danger';
        }

        return redirect()->route('user.index')->with([
            'message' => $message,
            'alert'   => $alert
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::where('id', $id)->first();
        $user->createdAt = $user->get_created_at_date();
        return response()->json([
            'data'  => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function validation(Request $request) {
        $rules = [
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password'  => 'required|min:8'
        ];

        // if(in_array($this->method(), ['PUT', 'PATCH'])) {
        //     $rules['email'] = ['required', 'email', 'unique:users,email,'.$request->id];

        //     if($request->password) {
        //         $rules['password'] = ['min:8'];
        //     }
        // }

        $messages = [
            'required' => ':attribute Harus Diisi',
            'string'    => ':attribute Data Harus Berupa Text',
            'unique'    => ':attribute Sudah Ada',
            'email'     => 'Format :attribute Salah!',
            'max'       => 'Maksimal :attribute :max karakter',
            'min' => ':attribute harus diisi minimal :min karakter',
        ];

        return $this->validate($request, $rules, $messages);
    }
}
