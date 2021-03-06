<?php

namespace DoctrineProxies\__CG__\App\Database\Entities\User;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class User extends \App\Database\Entities\User\User implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array<string, null> properties to be lazy loaded, indexed by property name
     */
    public static $lazyPropertiesNames = array (
);

    /**
     * @var array<string, mixed> default values of properties to be lazy loaded, with keys being the property names
     *
     * @see \Doctrine\Common\Proxy\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array (
);



    public function __construct(?\Closure $initializer = null, ?\Closure $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     *
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', 'emailAddress', 'username', 'password', 'firstName', 'lastName', 'roles', 'id', 'createdAt', 'updatedAt', 'rememberToken'];
        }

        return ['__isInitialized__', 'emailAddress', 'username', 'password', 'firstName', 'lastName', 'roles', 'id', 'createdAt', 'updatedAt', 'rememberToken'];
    }

    /**
     *
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (User $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy::$lazyPropertiesDefaults as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     *
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @deprecated no longer in use - generated code now relies on internal components rather than generated public API
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }


    /**
     * {@inheritDoc}
     */
    public function getEmail(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmailAddress', []);

        return parent::getEmail();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail(string $emailAddress): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmailAddress', [$emailAddress]);

        parent::setEmail($emailAddress);
    }

    /**
     * {@inheritDoc}
     */
    public function getUsername(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUsername', []);

        return parent::getUsername();
    }

    /**
     * {@inheritDoc}
     */
    public function setUsername(string $username): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUsername', [$username]);

        parent::setUsername($username);
    }

    /**
     * {@inheritDoc}
     */
    public function getPassword(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPassword', []);

        return parent::getPassword();
    }

    /**
     * {@inheritDoc}
     */
    public function setPassword(string $password): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPassword', [$password]);

        parent::setPassword($password);
    }

    /**
     * {@inheritDoc}
     */
    public function getFirstName(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFirstName', []);

        return parent::getFirstName();
    }

    /**
     * {@inheritDoc}
     */
    public function setFirstName(string $firstName): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFirstName', [$firstName]);

        parent::setFirstName($firstName);
    }

    /**
     * {@inheritDoc}
     */
    public function getLastName(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLastName', []);

        return parent::getLastName();
    }

    /**
     * {@inheritDoc}
     */
    public function setLastName(string $lastName): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLastName', [$lastName]);

        parent::setLastName($lastName);
    }

    /**
     * {@inheritDoc}
     */
    public function getRoles()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRoles', []);

        return parent::getRoles();
    }

    /**
     * {@inheritDoc}
     */
    public function getRoleNames(): array
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRoleNames', []);

        return parent::getRoleNames();
    }

    /**
     * {@inheritDoc}
     */
    public function setRoles(array $roles): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRoles', [$roles]);

        parent::setRoles($roles);
    }

    /**
     * {@inheritDoc}
     */
    public function updateRoleTo(array $roles): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'updateRoleTo', [$roles]);

        parent::updateRoleTo($roles);
    }

    /**
     * {@inheritDoc}
     */
    public function getPermissionNamesByRole(\App\Database\Entities\Role\Role $role): array
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPermissionNamesByRole', [$role]);

        return parent::getPermissionNamesByRole($role);
    }

    /**
     * {@inheritDoc}
     */
    public function getId(): string
    {
        if ($this->__isInitialized__ === false) {
            return  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedAt', []);

        return parent::getCreatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdatedAt', []);

        return parent::getUpdatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedAt(\DateTime $createdAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedAt', [$createdAt]);

        return parent::setCreatedAt($createdAt);
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdatedAt', [$updatedAt]);

        return parent::setUpdatedAt($updatedAt);
    }

    /**
     * {@inheritDoc}
     */
    public function hasRole($role, $requireAll = false)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'hasRole', [$role, $requireAll]);

        return parent::hasRole($role, $requireAll);
    }

    /**
     * {@inheritDoc}
     */
    public function hasRoleByName($name, $requireAll = false)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'hasRoleByName', [$name, $requireAll]);

        return parent::hasRoleByName($name, $requireAll);
    }

    /**
     * {@inheritDoc}
     */
    public function hasPermissionTo($name, $requireAll = false)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'hasPermissionTo', [$name, $requireAll]);

        return parent::hasPermissionTo($name, $requireAll);
    }

    /**
     * {@inheritDoc}
     */
    public function getAuthIdentifierName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAuthIdentifierName', []);

        return parent::getAuthIdentifierName();
    }

    /**
     * {@inheritDoc}
     */
    public function getAuthIdentifier()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAuthIdentifier', []);

        return parent::getAuthIdentifier();
    }

    /**
     * {@inheritDoc}
     */
    public function getAuthPassword()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAuthPassword', []);

        return parent::getAuthPassword();
    }

    /**
     * {@inheritDoc}
     */
    public function getRememberToken()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRememberToken', []);

        return parent::getRememberToken();
    }

    /**
     * {@inheritDoc}
     */
    public function setRememberToken($value)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRememberToken', [$value]);

        return parent::setRememberToken($value);
    }

    /**
     * {@inheritDoc}
     */
    public function getRememberTokenName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRememberTokenName', []);

        return parent::getRememberTokenName();
    }

    /**
     * {@inheritDoc}
     */
    public function getEmailForPasswordReset()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmailForPasswordReset', []);

        return parent::getEmailForPasswordReset();
    }

    /**
     * {@inheritDoc}
     */
    public function sendPasswordResetNotification($token)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'sendPasswordResetNotification', [$token]);

        return parent::sendPasswordResetNotification($token);
    }

    /**
     * {@inheritDoc}
     */
    public function encryptWithMD5(string $password): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'encryptWithMD5', [$password]);

        return parent::encryptWithMD5($password);
    }

    /**
     * {@inheritDoc}
     */
    public function encryptWithSaltedMD5(string $password, string $salt): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'encryptWithSaltedMD5', [$password, $salt]);

        return parent::encryptWithSaltedMD5($password, $salt);
    }

    /**
     * {@inheritDoc}
     */
    public function encryptWithSha1(string $password): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'encryptWithSha1', [$password]);

        return parent::encryptWithSha1($password);
    }

    /**
     * {@inheritDoc}
     */
    public function encryptWithSha256(string $password): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'encryptWithSha256', [$password]);

        return parent::encryptWithSha256($password);
    }

    /**
     * {@inheritDoc}
     */
    public function encryptWithBcrypt(string $password): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'encryptWithBcrypt', [$password]);

        return parent::encryptWithBcrypt($password);
    }

}
