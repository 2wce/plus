<?php

namespace Chatty\Http\Controllers;

use Chatty\Models\Product;
use Illuminate\Http\Request;

use Image;
use Chatty\Models\User;
use Chatty\Models\Category;

use Chatty\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Input;


class CategoriesController extends Controller
{

	public function __construct(){

	 parent::__construct();
	}

  public function index(){

      return view('categories.index');




  }

  public function show($id){



        return view('categories.show')
        ->with('products' , Product::where('category_id', $id)->get())
        ->with('category',Category::find($id));

        



    }



}
