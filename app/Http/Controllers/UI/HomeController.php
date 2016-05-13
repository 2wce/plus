<?php

namespace Chatty\Http\Controllers\UI;

use Auth;
use DB;

use Chatty\Plus\Statuses\Status;

use Chatty\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {
        // show timeline if user is authenticated
        if (Auth::check()) {

            // get the statuses (own and from friends)
            // (but filter out the replies - see Status model!)
            $tests = Status::notReply()
                     ->where(
                         function($query) {
                             return $query->where('user_id', Auth::user()->id)
                                ->orWhereIn('cat_id', unserialize(Auth::user()->categories));
                                 //->orWhereIn('cat_id', unserialize(Auth::user()->categories));
                         })
                 ->orderBy('created_at', 'desc')
                 ->paginate(10);
            // provide statuses and replies to the view
            return view('timeline.index')
                ->with('statuses', $tests);
      }
        // for guests, simply show the home page
		  return view('home');
	  }

    public function selectCat()
    {
      // provide statuses and replies to the view
      return view('auth.select-cat');
    }

    public function getTimelineFilter($id)
    {
      // show timeline if user is authenticated
      if (Auth::check()) {
          // get the statuses (own and from friends)
          // (but filter out the replies - see Status model!)
          $statuses =
              Status::notReply()
                  ->where(
                      function($query) {
                          return $query->where('user_id', Auth::user()->id)
                          ->where('cat_id', $id )
                              ->orWhereIn('user_id', Auth::user()->friends()->lists('id'));
                      })
              ->orderBy('created_at', 'desc')
              ->paginate(10);

          // provide statuses and replies to the view
          return view('timeline.posts')
              ->with('statuses', $statuses);

      }
      // for guests, simply show the home page
      return view('home/posts');
    }

    public function prodcts()
    {
      // show timeline if user is authenticated
      if (Auth::check()) {
          // get the statuses (own and from friends)
          // (but filter out the replies - see Status model!)
          $statuses =
              Status::notReply()
                  ->where(
                      function($query) {
                          return $query->where('user_id', Auth::user()->id)
                          ->where('type_id', 1 );

                      })
              ->orderBy('created_at', 'desc')
              ->paginate(10);
          // provide statuses and replies to the view
          return view('timeline.posts')
              ->with('statuses', $statuses);
      }
      // for guests, simply show the home page
      return view('home/prodcts');
    }

    public function posts() {
        // show timeline if user is authenticated
      if (Auth::check()) {

          // get the statuses (own and from friends)
          // (but filter out the replies - see Status model!)
          $statuses =
              Status::notReply()
                  ->where(
                      function($query) {
                          return $query->where('user_id', Auth::user()->id)
                          ->where('type_id', 0 )
                              ->orWhereIn('user_id', Auth::user()->friends()->lists('id'));
                      })
              ->orderBy('created_at', 'desc')
              ->paginate(10);

          // provide statuses and replies to the view
        return view('timeline.posts')
            ->with('statuses', $statuses);
      }
      // for guests, simply show the home page
      return view('home');
    }

    public function service()
    {
        // show timeline if user is authenticated
        if (Auth::check()) {

            // get the statuses (own and from friends)
            // (but filter out the replies - see Status model!)
            $statuses =
                Status::notReply()
                    ->where(
                        function($query) {
                            return $query->where('user_id', Auth::user()->id)
                            ->where('type_id', 2 )
                                ->orWhereIn('user_id', Auth::user()->friends()->lists('id'));
                        })
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            // provide statuses and replies to the view
            return view('timeline.service')
                ->with('statuses', $statuses);
        }
        // for guests, simply show the home page
        return view('home');
    }
}//class
