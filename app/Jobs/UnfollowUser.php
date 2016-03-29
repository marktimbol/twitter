<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Repository\UserRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UnfollowUser extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    public $user_id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(UserRepository $user)
    {
        $user->unfollow($this->user_id);

        //send email
    }
}
