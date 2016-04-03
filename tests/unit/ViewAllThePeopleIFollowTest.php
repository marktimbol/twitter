<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewAllThePeopleIFollowTest extends TestCase
{
	use DatabaseMigrations;

    public function test_view_all_the_people_i_follow()
    {
    	$mark = factory(App\User::class)->create([
    		'username'	=> 'MarkTimbol'
    	]);
    	$this->actingAs($mark);

    	$foo = factory(App\User::class)->create();
    	$bar = factory(App\User::class)->create();
    	$baz = factory(App\User::class)->create();

    	$mark->following()->attach($foo->id);
    	$mark->following()->attach($bar->id);
    	$mark->following()->attach($baz->id);

    	$this->visit('/MarkTimbol/following')
    		->see($foo->name)
    		->see($bar->name)
    		->see($baz->name);
    }
}
