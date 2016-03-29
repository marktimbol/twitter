<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserCanTweetTest extends TestCase
{
    use DatabaseMigrations;

    public function test_a_user_can_tweet()
    {
    	$user = factory(App\User::class)->create();
    	$this->actingAs($user);

    	$this->visit('/')
    		->type('My First Tweet', 'body')
    		->press('Tweet')
    		->seeInDatabase('tweets', [
    			'user_id'	=> $user->id,
    			'body'	=> 'My First Tweet'
    		]);
    }
}
