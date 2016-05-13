<?php

namespace Chatty\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Chatty\Http\Requests;
use Chatty\Http\Controllers\Controller;

class RegistrationController extends Controller
{

    public function _construct()
    {

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.signup');
    }

    /**
     * Create new user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate request
        $this->validate($request, [
            'email'    => 'required|unique:tbl_users|email|max:255',
            'username' => 'required|unique:tbl_users|alpha_dash|max:20',
            'password' => 'required|min:6'
        ]);

        //extract needed variables and pass them onto registration queue
        $user = extract($request->only(['username', 'email','password']);)
        $job = (new RegisterUser(
                $user->username, $user->email, $user->password));
              //@TODO  ->onQueue('registration');

        //Dispatch Job
        $this->dispatch($job);

        Auth::login($user);
        // redirect the user to the home page
        return redirect()
            ->route('home')
            ->with('info', 'Your account has been created and you can now sign in.'
                );

    }
}
