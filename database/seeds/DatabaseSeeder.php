<?php

use database\seeds\UserPermisionSeeder;
use database\seeds\UserRoleSeeder;
use database\seeds\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([
            UserPermisionSeeder::class,
            UserRoleSeeder::class,
            UserSeeder::class,
        ]);
    }
}
