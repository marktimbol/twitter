<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewOtherUsersTweetsTest extends TestCase
{
	use DatabaseMigrations;

	public function test_view_other_users_tweets()
	{
		$user = factory(App\User::class)->create([
			'username'	=> 'JohnDoe'
		]);

		$tweet = factory(App\Tweet::class)->create([
			'user_id'	=> $user->id,
			'body'	=> 'The Tweet'
		]);

		$this->visit('/JohnDoe')
			->see('The Tweet');
	}

}
