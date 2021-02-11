<?php

namespace App\Database\Entities\Permission;

use LaravelDoctrine\ACL\Contracts\Permission as PermissionContract;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Permission
 * @ORM\Entity
 * @ORM\Table(name="sys_permissions")
 */
class Permission implements PermissionContract
{
    /**
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var integer
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * User constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
