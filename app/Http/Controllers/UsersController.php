<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repository\UserRepository;
use App\User;
use Illuminate\Http\Request;

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
    	$following = $this->user->following();        
    	return view('users.following', compact('following'));
    }

    public function followers()
    {
        $followers = $this->user->followers();    
        dd($followers);
        
        return view('users.followers', compact('followers'));
    }
}
