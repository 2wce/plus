<?php

namespace Chatty\Plus\Users;

/**
 *
 */
class UserRepository
{

  protected $userRepo;

  public function __construct(UserRepository $userRepo)
  {
    # code...
    $this->userRepo = $userRepo;
  }
  /*
  * Persist User
  */
  public function save(User $user)
  {
    return $user->save();
  }

  /*
  * Fetch User by Username
  */
  // public function findByUsername($username')
  // {
  //   return User::with(['statuses' =>
  //     function($query){
  //       $query->latest();
  //     }])->whereUsername($username)->first();
  // }

  /*
  * Fetch User by id
  */
  public function findById($id)
  {
    # code...
    return User::findOrFail($id);
  }

  /*
  * Follow a user
  * @param $userIdToFollow
  * @param User userId
  * @return mixed
  */
  public function follow($userIdToFollow, User $user)
  {
    return $user->follows()->attach($userIdToFollow);
  }

}
