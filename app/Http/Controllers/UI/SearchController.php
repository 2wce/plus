<?php

namespace Chatty\Http\Controllers\UI;

use DB;

use Chatty\Plus\Users\User;
use Chatty\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SearchController extends Controller{

	public function __construct(){

	 parent::__construct();
	}

	public function getResults(Request $request) {

		$query = $request->input('query');

		if (!$query) {
			return redirect()->route('home');
		}

		$users =
			User::where(  DB::raw( "CONCAT(first_name, ' ', last_name)" ), 'LIKE', "%{$query}%"  )
				->orWhere( 'username', 'LIKE',  "%{$query}%" )
				->get();

		return view('search.results')->with('users', $users);
	}

}
