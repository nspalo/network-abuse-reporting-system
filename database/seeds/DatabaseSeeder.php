<?php

use App\Database\Seeders\UserPermisionSeeder;
use App\Database\Seeders\UserRoleSeeder;
use App\Database\Seeders\UserSeeder;
use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Populate Initial Data
         */
        $this->call([
            UserPermisionSeeder::class,
            UserRoleSeeder::class,
            UserSeeder::class,
        ]);
    }
}
