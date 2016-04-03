<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewAllThePeopleToFollowTest extends TestCase
{
	use DatabaseMigrations;

    public function test_view_all_the_people_to_follow()
    {
    	$mark = factory(App\User::class)->create();
    	$this->actingAs($mark);

    	$foo = factory(App\User::class)->create();
    	$bar = factory(App\User::class)->create();

    	$this->visit('who-to-follow/suggestions')
    		->see($foo->name)
    		->see($bar->name);
    }

    public function test_do_not_show_the_people_i_already_followed()
    {
        $mark = factory(App\User::class)->create();
        $this->actingAs($mark);

        $foo = factory(App\User::class)->create();
        $bar = factory(App\User::class)->create();

        $mark->following()->attach($foo->id);

        $this->visit('who-to-follow/suggestions')
            ->see($bar->name)
            ->dontSee($foo->name);
    }
}
