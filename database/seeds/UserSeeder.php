<?php

namespace database\seeds;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * Class UserSeeder
 */
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userId = Str::uuid();

        DB::table('users')->insert([
            'id' => $userId,
            'username' => 'sysAdmin',
            'password' => password_hash('1234567890', PASSWORD_BCRYPT),
            'first_name' => 'John',
            'last_name' => 'Doe',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        /** Set the user above as a Administrator */
        DB::table('role_user')->insert([
            'user_id' => $userId,
            'role_id' => 1
        ]);
    }
}
