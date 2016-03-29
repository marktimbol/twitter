<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewTheTweetsOfThePeopleIFollowOnMyFeedTest extends TestCase
{
    use DatabaseMigrations;

    public function test_it_shows_all_the_tweets_of_the_people_i_follow_on_my_feed()
    {
    	$john = factory(App\User::class)->create([
    		'username'	=> 'JohnDoe'
    	]);
    	$this->actingAs($john);

    	$tweet = factory(App\Tweet::class)->create([
            'user_id'   => $john->id,
    		'body'	=> 'John Tweet'
    	]);

    	$batman = factory(App\User::class)->create();
    	$tweet = factory(App\Tweet::class)->create([
            'user_id'   => $batman->id,
    		'body'	=> 'Batman Tweet'
    	]);

    	$superman = factory(App\User::class)->create();
    	$tweet = factory(App\Tweet::class)->create([
            'user_id'   => $superman->id,
    		'body'	=> 'Superman Tweet'
    	]);

    	$john->follows()->attach($batman->id);
    	$john->follows()->attach($superman->id);

    	$this->visit('/')
    		->see('John Tweet')
    		->see('Batman Tweet')
    		->see('Superman Tweet');
    }
}
