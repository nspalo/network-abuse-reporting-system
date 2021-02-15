<?php

namespace App\Database\Repositories\Role;

use App\Database\Entities\Role\Role;
use Doctrine\ORM\EntityRepository;

/**
 * Class RoleRepository
 * @package App\Database\Repositories\Role
 */
class RoleRepository extends EntityRepository implements RoleRepositoryInterface
{
    /**
     * Find All
     *
     * @return array
     */
    public function findAll(): array
    {
        return parent::findAll();
    }

    /**
     * Find Roles by Ids
     *
     * @param $roleIds
     * @return array|string
     */
    public function findByRolesIds($roleIds)
    {
        return $this->getEntityManager()->createQueryBuilder()
            ->select("roles")
            ->from(Role::class, 'roles')
            ->where('roles.id IN (:pRoleIds)')
            ->setParameter('pRoleIds', $roleIds)
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * Find Roles by Name
     *
     * @param array|string $roleNames
     * @return mixed
     */
    public function findByRolesName($roleNames)
    {
        return $this->getEntityManager()->createQueryBuilder()
            ->select("roles")
            ->from(Role::class, 'roles')
            ->where('roles.name IN (:pRoleNames)')
            ->setParameter('pRoleNames', $roleNames)
            ->getQuery()
            ->getResult()
            ;
    }
}
