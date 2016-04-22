<?php

namespace Chatty\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Html;
use Chatty\Models\Category;
use Chatty\Models\Collection;
use Chatty\Models\Type;


abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function __construct(){

      $this->beforeFilter(function(){

     	View::share('catnav', Category::all());
      View::share('typenav', Type::all());
        View::share('collection', Collection::all());


      });
    }

}
