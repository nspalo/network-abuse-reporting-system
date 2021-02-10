<?php

namespace App\Database\Entities\Role;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use LaravelDoctrine\ACL\Mappings as ACL;
use LaravelDoctrine\ACL\Contracts\Permission;
use LaravelDoctrine\ACL\Contracts\Role as RoleContract;
use LaravelDoctrine\ACL\Permissions\HasPermissions;

/**
 * @ORM\Entity
 * @ORM\Table(name="sys_roles")
 */
class Role implements RoleContract
{
    use HasPermissions;

    /**
     * @ACL\HasPermissions
     */
    protected $permissions;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * Role constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
        $this->permissions = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return ArrayCollection|Permission[]
     */
    public function getPermissions()
    {
        return $this->permissions;
    }
}
