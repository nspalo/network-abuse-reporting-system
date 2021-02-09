<?php

namespace App\Database\Entities\User;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
//use LaravelDoctrine\ACL\Contracts\Permission;
//use LaravelDoctrine\ACL\Contracts\Role;
use LaravelDoctrine\ACL\Mappings as ACL;
use LaravelDoctrine\ACL\Roles\HasRoles;
use LaravelDoctrine\ACL\Permissions\HasPermissions;
use LaravelDoctrine\ACL\Contracts\HasRoles as HasRolesContract;
use LaravelDoctrine\ACL\Contracts\HasPermissions as HasPermissionContract;
use App\Database\Entities\Entity;

/**
 * Class User
 * @package App\Database\Entities\User
 * @ORM\Entity
 */
class User extends Entity implements HasRolesContract, HasPermissionContract
{
    use HasRoles;
    use HasPermissions;

    /**
     * Username
     *
     * @ORM\Column(name="username", type="string", length=32, unique=false, nullable=false)
     * @var string
     */
    protected $username;

    /**
     *  Password
     *
     * @ORM\Column(name="password", type="string", length=255, unique=false, nullable=false)
     * @var string
     */
    protected $password;

    /**
     * First Name
     *
     * @ORM\Column(type="string", length=64, unique=false, nullable=false)
     * @var string
     */
    protected $firstName;

    /**
     * Last Name
     *
     * @ORM\Column(type="string", length=64, unique=false, nullable=false)
     * @var string
     */
    protected $lastName;

    /**
     * @ACL\HasRoles()
     * @var \Doctrine\Common\Collections\ArrayCollection|\LaravelDoctrine\ACL\Contracts\Role[]
     */
    protected $roles;

    /**
     * @ACL\HasPermissions
     */
    public $permissions;

    /**
     * User constructor.
     * @param string $username
     * @param string $password
     * @param string $firstName
     * @param string $lastName
     */
    public function __construct(string $username, string $password, string $firstName, string $lastName)
    {
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setFirstName($firstName);
        $this->setLastName($lastName);

        $this->roles = new ArrayCollection();
        $this->permissions = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        if (empty($username)) {
            throw new \Exception("Username is required.");
        }

        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        if (empty($password)) {
            throw new \Exception("Password is required.");
        }

        $this->password = password_hash($password, PASSWORD_BCRYPT); // bcrypt($password);
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        if (empty($firstName)) {
            throw new \Exception("First Name is required.");
        }

        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        if (empty($lastName)) {
            throw new \Exception("Last Name is required.");
        }

        $this->lastName = $lastName;
    }

    public function getRoles()
    {
        // TODO: Implement getRoles() method.
    }

    public function getPermissions()
    {
        // TODO: Implement getPermissions() method.
    }
}
