<?php

namespace App\Database\Repositories\User;

/**
 * Interface UserRepositoryInterface
 * @package App\Database\Repositories\User
 */
interface UserRepositoryInterface
{
    /**
     * Find all Users
     * - Including Admin
     *
     * @return array
     */
    public function findAll(): array;

    /**
     * Find all Users (Non-Admin)
     * - Excluding Admin
     *
     * @return array
     */
    public function findAllUser(): array;

    /**
     * Find User By Id
     *
     * @param $id
     * @return object|null
     */
    public function findById($id);

    /**
     * Find Users By Role(s)
     *
     * @param string|array $roles
     * @return mixed
     */
    public function findByRole($roles);


    /**
     * Find User By Email Address
     *
     * @param string $emailAddress
     * @return int|mixed|string|null
     */
    public function findByEmailAddress(string $emailAddress);

    /**
     * Find User By Username
     *
     * @param string $username
     * @return int|mixed|string
     */
    public function findByUsername(string $username);
}
