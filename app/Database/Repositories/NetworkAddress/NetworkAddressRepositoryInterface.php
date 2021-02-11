<?php

namespace App\Database\Repositories\NetworkAddress;

/**
 * Interface NetworkAddressRepositoryInterface
 * @package App\Database\Repositories\NetworkAddress
 */
interface NetworkAddressRepositoryInterface
{
    /**
     * Find All
     *
     * @return array
     */
    public function findAll(): array;

    /**
     * Find By Id
     *
     * @param $id
     * @return object|null
     */
    public function findById($id);

    /**
     * Find By IP Address
     * - Supports IPV4 and IPV6 value
     *
     * @param string $ipAddress
     * @return mixed
     */
    public function findByIPAddress(string $ipAddress);

}
