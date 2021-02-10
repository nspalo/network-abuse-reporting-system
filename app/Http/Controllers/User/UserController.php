<?php

namespace App\Http\Controllers\User;

use App\Database\Entities\Role\Role;
use App\Database\Entities\User\User;
use App\Http\Controllers\Controller;
use Doctrine\ORM\EntityManager;

/**
 * Class UserController
 * @package App\Http\Controllers\User
 */
class UserController extends Controller
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * UserController constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {

        $this->entityManager = $entityManager;
    }



    public function index()
    {
        $users = $this->entityManager->getRepository(User::class)->findAll();
        //dump($users);

        $usersInfo = [];

        /** @var User $user */
        foreach( $users as $user ) {

//            $roles = $user->getRoles()->toArray();
//            /** @var Role $role */
//            foreach ( $roles as $role) {
//                $roleName = $role->getName();
//                $rolePermissions = $user->getPermissionNamesByRole($role);
//            }

            $usersInfo[] = [
                'username' => $user->getUsername(),
                'firstname' => $user->getFirstName(),
                'lastname' => $user->getLastName(),
                'roles' => implode(",",$user->getRoleNames()),
            ];

        }


        dump($usersInfo);
        dd('stop');
        //return view('testview', compact('users'));
    }
}
