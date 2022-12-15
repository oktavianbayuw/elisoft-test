<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserApiController extends Controller
{
    //
    public function index() {
        return view('api-user.index');
    }
}
