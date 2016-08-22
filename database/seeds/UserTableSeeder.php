<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\User::class, 20)->create();

        $user1 = new App\User();
	    $user1->email = 'user1@codeup.com';
	    $user1->name = 'Alan';
	    $user1->password = Hash::make('password123');
	    $user1->save();
    }
}
