<?php

namespace Chatty\Http\Controllers;

use Chatty\Models\Service;
use Illuminate\Http\Request;

use Image;
use Chatty\Models\User;
use Chatty\Models\Type;

use Chatty\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Input;


class TypesController extends Controller
{

	public function __construct(){

	 parent::__construct();
	}

  public function index(){

      return view('types.index');




  }

  public function show($id){



        return view('types.show')
        ->with('services' ,Service::where('id', $id)->get())
        ->with('type',Type::find($id));





    }



}
