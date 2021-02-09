<?php

namespace database\seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class UserRoleSeeder
 */
class UserRoleSeeder extends Seeder
{

    private const sysRoles = [
        [
            'id' => 1,
            'name' => 'Admin',
            'permissionIds' => [1, 2, 3]
        ],
        [
            'id' => 2,
            'name' => 'User',
            'permissionIds' => [2]
        ],
        [
            'id' => 3,
            'name' => 'Guest',
            'permissionIds' => [3]
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(self::sysRoles as $role) {

            DB::table('sys_roles')->insert([
                'id' => $role['id'],
                'name' => $role['name']
            ]);

            /** Connect permissions to roles */
            foreach($role['permissionIds'] as $permissionId) {
                DB::table('permission_role')->insert([
                    'role_id' => $role['id'],
                    'permission_id' => $permissionId
                ]);
            }
        }
    }
}
