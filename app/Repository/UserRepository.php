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

	public function peopleToFollow()
	{
		return User::where('id', '!=', $this->currentUser->id)->take(10)->get();
	}

	public function follow($user_id)
	{
		return $this->currentUser->follows()->attach($user_id);
	}

	public function unfollow($user_id)
	{
		return $this->currentUser->follows()->detach($user_id);
	}

	public function following()
	{
		$following = $this->currentUser->follows()->pluck('followed_id');
		return User::whereIn('id', $following)->get();
	}

	public function isFollowing(User $user)
	{
		// return $this->currentUser->follows()->contains($user->id);
	}
}