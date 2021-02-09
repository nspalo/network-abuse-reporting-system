<?php

namespace database\seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class UserPermisionSeeder
 */
class UserPermisionSeeder extends Seeder
{
    private const sysPermision = [
        ['id' => 1, 'name' => 'AdminPermission'],
        ['id' => 2, 'name' => 'UserPermission'],
        ['id' => 3, 'name' => 'GuestPermission'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(self::sysPermision as $permission) {
            DB::table('sys_permissions')->insert($permission);
        }
    }
}
