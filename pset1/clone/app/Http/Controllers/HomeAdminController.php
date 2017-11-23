<?php

namespace webapp\Http\Controllers;
use Illuminate\Http\Request;
use webapp\User;

class HomeAdminController extends Controller
{
    public function home()
    {
        return view('admin.home', ['users' => User::all()->toArray()]);
    }

    public function changeUserInfo (Request $request)
    {
        $input = $request->all();


        User::changeUserData($input);

        session()->flash('status','data changed succefully');


        return redirect()->route('admin.home');
    }

}
