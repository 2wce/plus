<?php

namespace Chatty\Jobs;

use Chatty\Jobs\Job;

use Illuminate\Contracts\Bus\SelfHandling;

class FollowUser extends Job implements SelfHandling
{

    public $userId;
    public $userIdToFollow;
    //public $userRepo;
     //new UserRepository($userRepo);
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($userId, $userIdToFollow , UserRepository $userRepo)
    {
        $this->userId = $userId;
        $this->userIdToFollow = $userIdToFollow;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      //dd($this->userId);
        $user = $this->userRepo->findById($this->userId);

        $this->userRepo->follow($this->userIdToFollow, $user);

        return $user;
    }
}
