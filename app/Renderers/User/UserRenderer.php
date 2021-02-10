<?php

namespace App\Renderers\User;

use App\Database\Entities\Permission\Permission;
use App\Database\Entities\Role\Role;
use App\Database\Entities\User\User;
use App\Renderers\AbstractRender;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * Class UserRenderer
 * @package App\Renderers\User
 */
class UserRenderer extends AbstractRender
{
    /**
     * @param Role $role
     * @return array|array[]
     */
    private function renderUserPermissions(Role $role): array
    {
        return array_map(
            static function (Permission $permission) {
                return [
                    'id' => $permission->getId(),
                    'name' => $permission->getName(),
                ];
            },
            $role->getPermissions()->toArray()
        );
    }

    /**
     * @param User $user
     * @param bool $showPermission
     * @return array|array[]
     */
    public function renderUserRoles(User $user, bool $showPermission = false): array
    {
        return array_map(
            function (Role $role) use ($showPermission) {

                $userRole = [
                    'id' => $role->getId(),
                    'name' => $role->getName(),
                ];

                if($showPermission) {
                    $userRole['permissions'] = $this->renderUserPermissions($role);
                }

                return $userRole;
            },
            $user->getRoles()->toArray()
        );
    }

    /**
     * @param $user
     * @return array
     */
    public function render($user): array
    {
        if(is_null($user)) {
            return [];
        }

        if($user instanceof User) {

            return [
                'username' => $user->getUsername(),
                'firstname' => $user->getFirstName(),
                'lastname' => $user->getLastName(),
                'roles' => $this->renderUserRoles($user), // implode(",",$user->getRoleNames()),
            ];
        }

        return $this->renderList($user);
    }
}
