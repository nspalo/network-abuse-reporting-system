<?php

namespace App\Services\User;

use App\Database\Entities\User\User;
use App\Database\Repositories\Role\RoleRepository;
use App\Database\Repositories\Role\RoleRepositoryInterface;
use App\Database\Repositories\User\UserRepositoryInterface;
use App\Services\AbstractService;
use Doctrine\ORM\EntityManager;
use Exception;

/**
 * Class UpdateUserService
 * @package App\Services\User
 */
class UpdateUserService extends AbstractService
{
    /**
     * @var RoleRepositoryInterface
     */
    private $roleRepository;
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * UpdateUserService constructor.
     * @param EntityManager $entityManager
     * @param RoleRepositoryInterface $roleRepository
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(EntityManager $entityManager, RoleRepositoryInterface $roleRepository, UserRepositoryInterface $userRepository)
    {
        parent::__construct($entityManager);
        $this->roleRepository = $roleRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * @param UpdateUserRequestInterface $updateUserRequest
     * @return User|null
     * @throws Exception
     */
    public function handle(UpdateUserRequestInterface $updateUserRequest): ?User
    {
        /** @var User $user */
        $user = $this->userRepository->findByEmailAddress($updateUserRequest->getEmailAddress());

        if($user) {
            $user->setEmail($updateUserRequest->getEmailAddress());
            $user->setUsername($updateUserRequest->getUsername());
            $user->setPassword($updateUserRequest->getPassword());
            $user->setFirstName($updateUserRequest->getFirstName());
            $user->setLastName($updateUserRequest->getLastName());
            $user->updateRoleTo(
                $this->roleRepository->findByRolesIds(
                    $updateUserRequest->getRoleIds()
                )
            );
        }

        return $user;
    }
}
