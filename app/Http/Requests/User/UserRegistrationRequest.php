<?php

namespace App\Http\Requests\User;

use App\Services\User\UserRegistrationRequestInterface;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

/**
 * Class UserRegistrationRequest
 * @package App\Http\Requests\User
 */
class UserRegistrationRequest extends FormRequest implements UserRegistrationRequestInterface
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'string|required',
            'password' => 'string|min:8',
            'firstname' => 'string|required',
            'lastname' => 'string|required'
        ];
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
