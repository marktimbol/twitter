<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TweetsController extends Controller
{
	protected $currentUser;

	public function __construct()
	{
		$this->currentUser = Auth::user();
		$this->middleware('auth');
	}

    public function store(Request $request)
    {
    	$tweet = new Tweet;
    	$tweet->body = $request->body;

    	$this->currentUser->tweets()->save($tweet);

    	return redirect()->back();
    }
}
