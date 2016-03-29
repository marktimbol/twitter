<?php

namespace App\Policies;

use App\Repository\UserRepository;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    protected $user;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function follow(User $thisUser)
    {
        return $this->user->isFollowing($thisUser);
    }
}
