<?php
namespace App\Repository;

use App\Tweet;
use Illuminate\Support\Facades\Auth;

class TweetRepository {

	protected $currentUser;

	public function __construct()
	{
		$this->currentUser = Auth::user();
	}

	/**
	 * Get the latest tweets of the people I follow
	 */
	public function getFollowingUsersTweets()
	{
		$ids = $this->currentUser->follows()->pluck('followed_id');
		$ids->push($this->currentUser->id);
		
		return Tweet::with('user')->whereIn('user_id', $ids)->latest()->get();
	}

}