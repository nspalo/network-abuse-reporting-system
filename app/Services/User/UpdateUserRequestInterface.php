<?php

namespace App\Services\User;

/**
 * Class UserRegistrationRequestInterface
 * @package App\Services\User
 */
interface UpdateUserRequestInterface extends CreateUserRequestInterface
{
    /**
     * @return array|string|null
     */
    public function getRoleIds();
}
