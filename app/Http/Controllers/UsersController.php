<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repository\UserRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
	protected $user;

	public function __construct(UserRepository $user)
	{
		$this->user = $user;
	}

    public function profile($username)
    {
    	$user = $this->user->findByUsername($username);    	
    	return view('users.profile', compact('user'));
    }

    public function following()
    {
        $user = Auth::user();
    	$following = $this->user->getThePeopleIFollow();        
    	return view('users.following', compact('user', 'following'));
    }

    public function followers()
    {
        $user = Auth::user();
        $followers = $this->user->getFollowers();            
        return view('users.followers', compact('user', 'followers'));
    }

    public function peopleToFollow()
    {
        $user = Auth::user();
        $peopleToFollow = $this->user->getPeopleToFollow();
        return view('users.people-to-follow', compact('user', 'peopleToFollow'));
    }
}
