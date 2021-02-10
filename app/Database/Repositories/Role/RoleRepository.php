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
