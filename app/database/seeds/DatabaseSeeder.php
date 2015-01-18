<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        $this->call('UserTableSeeder');
        $this->command->info('User table seeded!');

        $this->call('GroupTableSeeder');
        $this->command->info('Group table seeded!');

        $this->call('ResidentTableSeeder');
        $this->command->info('Resident table seeded!');


	}
}



