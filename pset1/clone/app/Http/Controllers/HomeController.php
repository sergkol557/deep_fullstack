<?php

namespace webapp\Http\Controllers;
use Illuminate\Http\Request;
use webapp\UserForm;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = UserForm::getUserForm(\Auth::user()->getEmail());
        return view('home', ['data' => $data]);
    }

    public function userform(Request $request)
    {
        $this->validate($request, [
            'city' => 'required|min:5|max:255',
            'country' => 'required|min:5|max:255',
        ]);

        $userform = new UserForm;
        $userform->addForm([
            'city' => $request->input('city'),
            'country' => $request->input('country'),
            'email' => \Auth::user()->getEmail(),
            ]);

        session()->flash('status', 'your data added succesfully');

        return redirect()->route('home');
    }

}
