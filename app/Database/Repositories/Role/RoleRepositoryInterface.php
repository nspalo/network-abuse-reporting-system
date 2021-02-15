<?php

namespace App\Database\Repositories\Role;

/**
 * Interface RoleRepositoryInterface
 * @package App\Database\Repositories\Role
 */
interface RoleRepositoryInterface
{
    /**
     * Find All
     *
     * @return array
     */
    public function findAll(): array;

    /**
     * Find Roles by Ids
     *
     * @param $roleIds
     * @return array|string
     */
    public function findByRolesIds($roleIds);

    /**
     * @param array|string $roleNames
     * @return mixed
     */
    public function findByRolesName($roleNames);
}
