<?php

namespace Chatty\Jobs;

use Chatty\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterUser extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;


    protected $username;
    protected $email;
    protected $password;
    protected $userRepo;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($username, $email, $password, UserRepository $userRepo)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->userRepo = $userRepo;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle($job)
    {
        $user = User::register($job->username, $job->email, $job->password);

        $this->userRepo->save($user);
        return $user;
    }
}
