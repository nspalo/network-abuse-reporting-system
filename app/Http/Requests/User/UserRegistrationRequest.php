<?php

namespace App\Http\Requests\User;

use App\Services\User\UserRegistrationRequestInterface;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UserRegistrationRequest
 * @package App\Http\Requests\User
 */
class UserRegistrationRequest extends FormRequest implements UserRegistrationRequestInterface
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'emailAddress' => 'required|string|email',
            'username' => 'required|string',
            'password' => 'required|string|min:8',
            'firstname' => 'required|string',
            'lastname' => 'required|string'
        ];
    }

    /**
     * @return array|string|null
     */
    public function getEmailAddress()
    {
        return $this->input('emailAddress');
    }

    /**
     * @return array|string|null
     */
    public function getUsername()
    {
        return $this->input('username');
    }

    /**
     * @return array|string|null
     */
    public function getPassword()
    {
        return $this->input('password');
    }

    /**
     * @return array|string|null
     */
    public function getFirstName()
    {
        return $this->input('firstname');
    }

    /**
     * @return array|string|null
     */
    public function getLastName()
    {
        return $this->input('lastname');
    }
}
