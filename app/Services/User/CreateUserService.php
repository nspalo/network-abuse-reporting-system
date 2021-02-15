<?php

namespace App\Services\User;

use App\Database\Entities\User\User;
use App\Database\Repositories\Role\RoleRepositoryInterface;
use App\Services\AbstractService;
use Doctrine\ORM\EntityManager;
use Exception;

/**
 * Class UserRegistrationService
 * @package App\Services\User
 */
class CreateUserService extends AbstractService
{
    /**
     * @var RoleRepositoryInterface
     */
    private $roleRepository;

    /**
     * UserRegistrationService constructor.
     * @param EntityManager $entityManager
     * @param RoleRepositoryInterface $roleRepository
     */
    public function __construct(EntityManager $entityManager, RoleRepositoryInterface $roleRepository)
    {
        parent::__construct($entityManager);
        $this->roleRepository = $roleRepository;
    }

    /**
     * Process user Registration
     *
     * @param CreateUserRequestInterface $userRegistrationRequest
     * @return User
     * @throws Exception
     */
    public function handle(CreateUserRequestInterface $userRegistrationRequest): User
    {
        /** Create New User */
        $user = new User(
            $userRegistrationRequest->getEmailAddress(),
            $userRegistrationRequest->getUsername(),
            $userRegistrationRequest->getPassword(),
            $userRegistrationRequest->getFirstName(),
            $userRegistrationRequest->getLastName()
        );

        $user->setRoles(// Set New User's Role to User
            $this->roleRepository->findByRolesName("User")
        );

        return $user;
    }

}
