<?php

namespace webapp\Http\Controllers;

use webapp\User;

class HomeAdminController extends Controller
{
    public function home()
    {
        return view('admin.home', ['users' => User::all()]);
    }


}
