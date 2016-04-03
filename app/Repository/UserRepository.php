<?php
namespace App\Repository;

use App\User;
use Illuminate\Support\Facades\Auth;

class UserRepository {

	protected $currentUser;

	public function __construct()
	{
		$this->currentUser = Auth::user();
	}

	public function findByUsername($username)
	{
		return User::whereUsername($username)->first();
	}

	public function getPeopleToFollow()
	{
		$peopleIFollow = $this->currentUser->following()->pluck('followed_id');
		$peopleIFollow = $peopleIFollow->push($this->currentUser->id)->all();

		return User::whereNotIn('id', $peopleIFollow)
					->paginate(15);
	}

	public function follow($user_id)
	{
		return $this->currentUser->following()->attach($user_id);
	}

	public function unfollow($user_id)
	{
		return $this->currentUser->following()->detach($user_id);
	}

	public function getThePeopleIFollow()
	{
        $ids = $this->currentUser->following()->pluck('followed_id');
        return User::whereIn('id', $ids)->get();
	}

	public function getFollowers()
	{
        $ids = $this->currentUser->followers()->pluck('follower_id');

        return User::where('id', '!=', $this->currentUser->id)
                    ->whereIn('id', $ids)
                    ->get();
	}

	public function isFollowing(User $user)
	{
		// return $this->currentUser->follows()->contains($user->id);
	}
}