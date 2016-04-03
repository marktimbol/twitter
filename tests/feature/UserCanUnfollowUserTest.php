<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserCanUnfollowUserTest extends TestCase
{
   	use DatabaseMigrations;
    
    public function test_a_user_can_unfollow_user()
    {
    	$mark = factory(App\User::class)->create([
    		'username'	=> 'MarkTimbol'
    	]);

    	$joan = factory(App\User::class)->create([
    		'username'	=> 'JoanRomeroso'
    	]);

    	$this->actingAs($mark);

    	$mark->following()->attach($joan->id);

    	$this->visit('JoanRomeroso')
    		->press('Unfollow')
    		->dontSeeInDatabase('follows', [
    			'follower_id'	=> $mark->id,
    			'followed_id'	=> $joan->id
    		]);
    }
}
