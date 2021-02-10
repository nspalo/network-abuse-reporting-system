<?php


namespace App\Database\Repositories\Role;


interface RoleRepositoryInterface
{
    public function findAll();

    /**
     * @param array|string $roleNames
     * @return mixed
     */
    public function findByRolesName($roleNames);
}
