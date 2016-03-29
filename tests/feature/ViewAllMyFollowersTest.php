<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewAllMyFollowersTest extends TestCase
{
	use DatabaseMigrations;

    public function test_view_all_my_followers()
    {
    	$mark = factory(App\User::class)->create([
    		'username'	=> 'MarkTimbol'
    	]);
    	$this->actingAs($mark);

    	$foo = factory(App\User::class)->create();
    	$bar = factory(App\User::class)->create();
    	$baz = factory(App\User::class)->create();

    	$foo->follows()->attach($mark->id);
    	$bar->follows()->attach($mark->id);
    	$baz->follows()->attach($mark->id);

    	$this->visit('/MarkTimbol/followers')
    		->see($foo->name)
    		->see($bar->name)
    		->see($baz->name);
    }
}
