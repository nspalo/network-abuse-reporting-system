<?php

namespace App\Database\Entities\User;

use App\Database\Entities\Permission\Permission;
use App\Database\Entities\Role\Role;
use App\Database\Entities\Entity;
use App\Traits\PasswordEncryption;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Str;
use LaravelDoctrine\ACL\Mappings as ACL;
use LaravelDoctrine\ACL\Roles\HasRoles;
use LaravelDoctrine\ACL\Permissions\HasPermissions;
use LaravelDoctrine\ACL\Contracts\HasRoles as HasRolesContract;
use LaravelDoctrine\ORM\Auth\Authenticatable;

/**
 * Class User
 * @package App\Database\Entities\User
 * @ORM\Entity
 */
class User extends Entity implements HasRolesContract, AuthenticatableContract, CanResetPasswordContract
{
    use HasRoles, HasPermissions, Authenticatable, CanResetPassword, PasswordEncryption;

    /**
     * Email Address
     *
     * @ORM\Column(name="email", type="string", length=128, unique=true, nullable=false)
     * @var string
     */
    protected $email;

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
     * User Roles
     *
     * @ACL\HasRoles()
     * @var ArrayCollection|Role[]
     */
    protected $roles;

    /**
     * User constructor.
     * @param string $emailAddress
     * @param string $username
     * @param string $password
     * @param string $firstName
     * @param string $lastName
     * @throws Exception
     */
    public function __construct(string $emailAddress, string $username, string $password, string $firstName, string $lastName)
    {
        $this->setEmail($emailAddress);
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setFirstName($firstName);
        $this->setLastName($lastName);

        $this->roles = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set User email
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        if (empty($email)) {
            throw new \RuntimeException('Email address cannot be empty.');
        }

        if (strlen($email) > 128) {
            throw new \RuntimeException('Email address was more than 128 characters.');
        }

        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \RuntimeException('Email address is not valid.');
        }

        $this->email = $email;
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
            throw new \RuntimeException("Username is required.");
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
            throw new \RuntimeException("Password is required.");
        }

        $this->password = $this->encryptWithBcrypt($password); // password_hash($password, PASSWORD_BCRYPT); // bcrypt($password);
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
            throw new \RuntimeException("First Name is required.");
        }

        $this->firstName = Str::ucfirst($firstName);
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
     * @throws Exception
     */
    public function setLastName(string $lastName): void
    {
        if (empty($lastName)) {
            throw new \RuntimeException("Last Name is required.");
        }

        $this->lastName = Str::ucfirst($lastName);
    }

    /**
     * @return ArrayCollection|Role[]
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @return array|string[]
     */
    public function getRoleNames(): array
    {
        return array_map(
            static function (Role $role) {
                return $role->getName();
            },
            $this->roles->toArray()
        );
    }

    /**
     * @param array $roles
     */
    public function setRoles(array $roles): void
    {
        foreach ($roles as $role) {
            $this->roles->add($role);
        }
    }

    /**
     * @param array $roles
     */
    public function updateRoleTo(array $roles): void
    {
        foreach ($this->roles as $aRole) {
            $this->roles->removeElement($aRole);
        }

        $this->setRoles($roles);
    }

    /**
     * @param Role $role
     * @return string[]
     */
    public function getPermissionNamesByRole(Role $role): array
    {
        return array_map(
            function (Permission $permission) {
                return $permission->getName();
            },
            $role->getPermissions()->toArray()
        );
    }

}
