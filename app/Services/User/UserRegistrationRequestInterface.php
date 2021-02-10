<?php

namespace App\Services\User;

/**
 * Class UserRegistrationRequestInterface
 * @package App\Services\User
 */
interface UserRegistrationRequestInterface
{
    public function getUsername();
    public function getPassword();
    public function getFirstName();
    public function getLastName();
}
