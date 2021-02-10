<?php

namespace App\Traits;

/**
 * Trait PasswordEncryption
 * @package App\Traits
 */
trait PasswordEncryption
{
    /**
     * Encryption: MD5
     *
     * @param string $password
     * @return string
     */
    public function encryptWithMD5(string $password): string
    {
        return md5($password);
    }

    /**
     * Encryption: MD5 + Salt
     *
     * @param string $password
     * @param string $salt
     * @return string
     */
    public function encryptWithSaltedMD5(string $password, string $salt): string
    {
        $salt = (empty($salt)) ?   // If no user defined salt,
            env("APP_SALT",    // Assign a custom salt from env
                env("APP_KEY") // Use the App key as a fallback if not set
            ) : $salt              // Use the user defined salt value
        ;

        return $this->encryptWithMD5($password . $salt);
    }

    /**
     * Encryption: Sha1
     *
     * @param string $password
     * @return string
     */
    public function encryptWithSha1(string $password): string
    {
        return HASH( "sha1", $password );
    }

    /**
     * Encryption: Sha256
     *
     * @param string $password
     * @return string
     */
    public function encryptWithSha256(string $password): string
    {
        return HASH( "sha256", $password );
    }

    /**
     * Encryption: bcrypt
     *
     * @param string $password
     * @return string
     */
    public function encryptWithBcrypt(string $password): string
    {
        return bcrypt($password);
    }
}

