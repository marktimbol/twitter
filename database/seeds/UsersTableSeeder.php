<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		factory(App\User::class)->create([
			'name'	=> 'Mark Timbol',
			'username'	=> 'MarkTimbol',
			'email'	=> 'mark@timbol.com',
			'password'	=> bcrypt('marktimbol')
		]);
    }
}
