<?php

namespace webapp\Http\Controllers;

use Illuminate\Http\Request;
use webapp\UserForm;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard',['userforms' => UserForm::all()->toArray()]);
    }

    public function changeUserForms(Request $request)
    {

        $input = $request->all();
        UserForm::changeUserFormData($input);

        session()->flash('status','data changed succefully');


        return redirect()->route('admin.dashboard');

    }

    public function delete(Request $request)
    {
        UserForm::deleteUserForm($request->id);
        session()->flash('status','data deleted succefully');

        return redirect()->route('admin.dashboard');
    }
}
