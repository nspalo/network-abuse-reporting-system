<?php

namespace App\Database\Repositories\User;

use App\Database\Entities\User\User;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NonUniqueResultException;

/**
 * Class UserRepository
 * @package App\Database\Repositories\User
 */
class UserRepository extends EntityRepository implements UserRepositoryInterface
{
    /**
     * Find all Users
     * - Including Admin
     *
     * @return array
     */
    public function findAll(): array
    {
        return parent::findAll(); // TODO: Change the autogenerated stub
    }

    /**
     * Find all Users (Non-Admin)
     * - Excluding Admin
     *
     * @return array
     */
    public function findAllUser(): array
    {
        return $this->findByRole(["User", "Guest"]);
    }

    /**
     * Find User By Id
     *
     * @param $id
     * @return object|null
     */
    public function findById($id)
    {
        return $this->findOneBy(['id' => $id]);
    }

    /**
     * Find Users By Role(s)
     *
     * @param string|array $roles
     * @return mixed
     */
    public function findByRole($roles)
    {
        return $this->getEntityManager()->createQueryBuilder()
            ->select("users")
            ->from(User::class, 'users')
            ->join('users.roles', 'role')
            ->where('role.name IN (:pRoles)')
            ->setParameter('pRoles', $roles)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * Find User By Email Address
     *
     * @param string $emailAddress
     * @return int|mixed|string|null
     * @throws NonUniqueResultException
     */
    public function findByEmailAddress(string $emailAddress)
    {
        return $this->getEntityManager()->createQueryBuilder()
            ->select("users")
            ->from(User::class, 'users')
            ->where('users.emailAddress = :pEmailAddress')
            ->setParameter('pEmailAddress', $emailAddress)
            ->getQuery()
            ->getOneOrNullResult()
            ;
    }

    /**
     * Find User By Username
     *
     * @param string $username
     * @return int|mixed|string|null
     * @throws NonUniqueResultException
     */
    public function findByUsername(string $username)
    {
        return $this->getEntityManager()->createQueryBuilder()
            ->select("users")
            ->from(User::class, 'users')
            ->where('users.username = :pUsername')
            ->setParameter('pUsername', $username)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
