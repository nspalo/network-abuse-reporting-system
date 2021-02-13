<?php

namespace App\Database\Seeders;

use App\Traits\PasswordEncryption;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * Class UserSeeder
 */
class UserSeeder extends Seeder
{
    use PasswordEncryption;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userId = Str::uuid();
        $currentDateTime = Carbon::now();
        $defaultPassword = '1234567890';

        /** Create a Default User */
        DB::table('users')->insert([
            'id' => $userId,
            'email_address' => 'jdoe@example.com',
            'username' => 'sysAdmin',
            'password' => $this->encryptWithBcrypt($defaultPassword),//password_hash('1234567890', PASSWORD_BCRYPT),
            'first_name' => 'John',
            'last_name' => 'Doe',
            'created_at' => $currentDateTime,
            'updated_at' => $currentDateTime
        ]);

        /** Set the user above as a Administrator */
        DB::table('role_user')->insert([
            'user_id' => $userId,
            'role_id' => 1
        ]);
    }
}
