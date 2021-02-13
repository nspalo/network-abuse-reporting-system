<?php

namespace App\Services\User;

/**
 * Class UserRegistrationRequestInterface
 * @package App\Services\User
 */
interface CreateUserRequestInterface
{
    public function getEmailAddress();
    public function getUsername();
    public function getPassword();
    public function getFirstName();
    public function getLastName();
}
