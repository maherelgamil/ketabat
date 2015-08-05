<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

        $this->call('UserTableSeeder');

        $this->command->info('User table seeded!');
	}

}


class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create([
                'email' => 'a@b.co',
                'password' => bcrypt('123456'),
                'role' => 'admin'
            ]);
    }

}