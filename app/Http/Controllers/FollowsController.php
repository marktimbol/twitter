<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Jobs\FollowUser;
use App\Jobs\UnfollowUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function store(Request $request)
    {
    	$this->dispatch( new FollowUser($request->user_id));

        return redirect()->back();
    }

    public function destroy($user_id)
    {
    	$this->dispatch( new UnfollowUser($user_id) );
    }
}
