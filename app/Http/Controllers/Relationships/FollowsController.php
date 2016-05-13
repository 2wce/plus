<?php

namespace Chatty\Http\Controllers\Relationships;

use Auth;
use Input;


use Chatty\Plus\Users\User;
use Chatty\Jobs\FollowUser;
use Chatty\Plus\Users\UserRepository;

use Chatty\Http\Requests;
use Chatty\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FollowsController extends Controller
{
  protected $userRepo;

  public function __construct(UserRepository $userRepo)
  {
    # code...
    $this->userRepo = $userRepo;
  }
    /**
     * Follow a user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($username)
    {
        //
        $userId = Auth::user()->id;
        $user = User::where('username', $username)->first();
        $userIdToFollow =  $user->id;

        #dd($userId);
        $job = (new FollowUser($userId, $userIdToFollow, $userRepo));


        //Dispatch Job
        $this->dispatch($job);

        return redirect()->route('home');
    }


    /**
     * Unfollow user
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
