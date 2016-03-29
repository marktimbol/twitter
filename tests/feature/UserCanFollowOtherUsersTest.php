<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserCanFollowOtherUsersTest extends TestCase
{
	use DatabaseMigrations;

    public function test_a_user_can_follow_other_users()
    {
    	$mark = factory(App\User::class)->create([
    		'username'	=> 'MarkTimbol'
    	]);

    	$joan = factory(App\User::class)->create([
    		'username'	=> 'JoanRomeroso'
    	]);

    	$this->actingAs($mark);

    	$this->visit('JoanRomeroso')
    		->press('Follow')
    		->seeInDatabase('follows', [
    			'follower_id'	=> $mark->id,
    			'followed_id'	=> $joan->id
    		]);
    }
}
