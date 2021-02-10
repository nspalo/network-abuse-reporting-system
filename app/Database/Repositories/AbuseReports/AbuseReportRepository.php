<?php

namespace App\Database\Repositories\AbuseReports;

use App\Database\Entities\AbuseReports\AbuseReport;
use App\Database\Entities\NetworkAddress\NetworkAddress;
use Doctrine\ORM\EntityRepository;

/**
 * Class AbuseReportRepository
 * @package App\Database\Repositories\AbuseReports
 */
class AbuseReportRepository extends EntityRepository implements AbuseReportRepositoryInterface
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
        return $this->findOneBy(['id' => $id]);
    }

    /**
     * Find Report Records By IP
     * - Supports IPV4 and IPV6 value
     *
     * @param string $ipAddress
     * @return mixed
     */
    public function findReportByIP(string $ipAddress)
    {
        return $this->getEntityManager()->createQueryBuilder()
            ->select("abuseReports")
            ->from(AbuseReport::class, 'abuseReports')
            ->join(NetworkAddress::class, 'networkAddress')
            ->where('networkAddress.id = abuseReports.ipAddress')
            ->AndWhere('networkAddress.ipAddress = :pIpAddress')
            ->setParameter('pIpAddress', $ipAddress)
            ->getQuery()
            ->getResult()
        ;
    }
}
