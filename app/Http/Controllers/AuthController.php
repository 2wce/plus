<?php

namespace Chatty\Http\Controllers;

use Illuminate\Http\Request;

use Chatty\Models\User;

use Auth;
use Mail;

use Illuminate\Cookie\CookieJar;
use Illuminate\Support\Facades\File;

class AuthController extends Controller{


	/**
	 *
	 *   SIGN UP   methods
	 *
	 */
	// GET request (show form)
	public function getSignup()
	{
		return view('auth.signup');
	}
	// POST request (process form submit)
	public function postSignup(Request $request)
	{
		// Validate the input
		// (excpetions will immediately trigger a redirect to the getSignup() method)
		$this->validate($request, [
			'email'    => 'required|unique:tbl_users|email|max:255',
			'username' => 'required|unique:tbl_users|alpha_dash|max:20',
			'password' => 'required|min:6'
		]);

		// now create a new user record using the User Model
		$user = User::create([
			'email' => $request->input('email'),
			'username' => $request->input('username'),
			'password' => bcrypt($request->input('password')),
			'profilePic'=> 'avatar.png',
		]);

		$username = $request->input('username');
		$email = $request->input('email');
		$code = str_random(60);

		$user_folder = $username . $email ;
		$path = public_path().'/uploads/' . $user_folder;
		File::makeDirectory($path, $mode = 0777, true, true);


		$url = route('activate', $code);

		if ($user) {

			Mail::send('emails.activate', ['link' => $url , 'username' => $username], function ($message) use ($user) {
				$message->from('terrencemupeni@gmail.com', 'Admin');
			    $message->to($user->email, $user->username);

			    $message->subject('PlusAfrik ACCOUNT ACTIVATION');

			    $message->priority(3);

			});
		}


  ///

		// redirect the user to the home page
		return redirect()
			->route('home')
			->with('info', 'Your account has been created and you can now sign in.'
				);



	}




	/**
	 *
	 *   SIGN IN  methods
	 *
	 */
	// GET request (show form)
	public function getSignin()
	{
		return view('auth.signin');
	}
	// POST request (process form submit)
	public function postSignin(Request $request)
	{
		// Validate the input
		// (excpetions will immediately trigger a redirect to the getSignup() method)
		$this->validate($request, [
			'email'    => 'required_without:username|email|max:255',
			'username' => 'required_without:email|alpha_dash|max:20',
			'password' => 'required|min:6'
		]);
			$user = Auth::user();
		// check which field was filled out as users can sign in with either email or username
		if ($request->get('username')==='') {
			// attempt to sign in with email
			Auth::attempt( $request->only(['email', 'password']), $request->has('remember') );

		} else {
			// attempt to sign in with username
			Auth::attempt( $request->only(['username', 'password']), $request->has('remember') );
		}
		// was it successful?
		if ( ! Auth::check() ) {
			return redirect()->back()->with('info', 'Could not sign you in with those details!');
		}

		return redirect()->route('home')
		->with('info', 'You are now signed in');



	}
/*
* Activate user
*/
	public function getActivate($code){
		//$user = User::where('activation_code', '=', $code)->where('isActive','=',0);
		//$user = User::where('id', '===', '1')->first();
		$user = DB::table('tbl_users')->where('activation_code', $code);

		$user= DB::table('tbl_users')
			->update(['activation_code' =>'']);

		$user= DB::table('tbl_users')
			->update(['isActive' => 1]);

			if($user){
				return redirect()->route('home')
					->with('info', 'You can now sign in');

			}
			return redirect()->route('home')
					->with('info', 'We could not activate your account.');
	}



	/**
	 *
	 *   SIGN OUT   method
	 *
	 */
	// GET request (show form)
	public function getSignout()
	{
		Auth::logout();
		return redirect()->route('home')->with('info', 'You have been signed out.');
	}



}
