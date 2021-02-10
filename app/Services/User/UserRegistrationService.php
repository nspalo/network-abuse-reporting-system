<?php

namespace App\Services\User;

use App\Database\Entities\Role\Role;
use App\Database\Entities\User\User;
use App\Services\AbstractService;
use Doctrine\ORM\EntityManager;

/**
 * Class UserRegistrationService
 * @package App\Services\User
 */
class UserRegistrationService extends AbstractService
{
    /**
     * UserRegistrationService constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        parent::__construct($entityManager);
    }

    public function handle(UserRegistrationRequestInterface $userRegistrationRequest)
    {
        /** Create New User */
        $user = new User(
            $userRegistrationRequest->getUsername(),
            $userRegistrationRequest->getPassword(),
            $userRegistrationRequest->getFirstName(),
            $userRegistrationRequest->getLastName()
        );

        // Temporarily get the Guest Role and assign it to the new user.
        $sysRoles = $this->entityManager->getRepository(Role::class)->findBy(['name'=>'Guest']);
        $user->setRoles($sysRoles);

        return $user;
    }

}
