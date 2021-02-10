<?php

namespace App\Database\Repositories\NetworkAddress;

use App\Database\Entities\NetworkAddress\NetworkAddress;
use Doctrine\ORM\EntityRepository;

/**
 * Class NetworkAddressRepository
 * @package App\Database\Repositories\NetworkAddress
 */
class NetworkAddressRepository extends EntityRepository implements NetworkAddressRepositoryInterface
{
    /**
     * Find All
     *
     * @return array
     */
    public function findAll(): array
    {
        return parent::findAll();
    }

    /**
     * Find By Id
     *
     * @param $id
     * @return object|null
     */
    public function findById($id)
    {
        $this->findOneBy(['id' => $id]);
    }

    /**
     * Find By IP Address
     * - Supports IPV4 and IPV6 value
     *
     * @param string $ipAddress
     * @return mixed
     */
    public function findByIPAddress(string $ipAddress)
    {
        return $this->getEntityManager()->createQueryBuilder()
            ->select("networkAddress")
            ->from(NetworkAddress::class, 'networkAddress')
            ->where('networkAddress.ipAddress IN (:pIpAddress)')
            ->setParameter('pIpAddress', $ipAddress)
            ->getQuery()
            ->getResult()
        ;
    }
}
