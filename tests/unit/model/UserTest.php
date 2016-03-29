<?php

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class UserTest extends TestCase
{
	use DatabaseMigrations;

	public function test_it_finds_user_by_username()
	{
		$user = factory(App\User::class)->create([
			'username'	=> 'JohnDoe'
		]);

		$foundUser = User::findByUsername('JohnDoe');

		$this->assertEquals(1, $foundUser->count());
		$this->assertEquals('JohnDoe', $foundUser->username);

	}

}
