<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repository\TweetRepository;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $user;
    protected $tweet;

    public function __construct(UserRepository $user, TweetRepository $tweet)
    {
        $this->user = $user;
        $this->tweet = $tweet;
    }

    public function index()
    {
        if( Auth::check() )
        {
            $user = Auth::user();
            $peopleToFollow = $this->user->peopleToFollow();

            $tweets = $this->tweet->getFollowingUsersTweets();
            
            return view('users.index', compact('user', 'tweets', 'peopleToFollow'));
        }

        return view('public.home');
    }
}
