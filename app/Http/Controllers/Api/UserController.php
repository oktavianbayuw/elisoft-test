<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index() {
        $data = User::all();

        $dataArr = [];
        foreach($data as $d) {
            $dataArr[] = [
                'id' => $d->id,
                'name'  => $d->name,
                'email' => $d->email,
                'created_at' => $d->created_at,
                'updated_at' =>   $d->updated_at
            ];
        }

        return response()->json([
            'status'  => $data ? true : false,
            'success'   => $data ? 'Success read data user' : 'Failed to read data user',
            'data'  => $dataArr
        ]);
    }
}
