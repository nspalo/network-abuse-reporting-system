<?php

namespace App\Services\NetworkAbuseReporting;

use App\Database\Entities\AbuseReports\AbuseReport;
use App\Database\Entities\NetworkAddress\NetworkAddress;
use App\Database\Repositories\NetworkAddress\NetworkAddressRepository;
use App\Database\Repositories\NetworkAddress\NetworkAddressRepositoryInterface;
use App\Services\AbstractService;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMException;

/**
 * Class NetworkAbuseReportingService
 * @package App\Services\NetworkAbuseReport
 */
class NetworkAbuseReportingService extends AbstractService
{
    /**
     * @var NetworkAddressRepository
     */
    private $networkAddressRepository;

    /**
     * @param NetworkAbuseReportRequestInterface $networkAbuseReportRequest
     * @return NetworkAddress
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    private function createOrRetrieveNetworkAddress(NetworkAbuseReportRequestInterface $networkAbuseReportRequest): NetworkAddress
    {
        if(empty($networkAddress = $this->networkAddressRepository->findByIPAddress($networkAbuseReportRequest->getNetworkAddress()))) {
            try {
                $networkAddress = new NetworkAddress($networkAbuseReportRequest->getNetworkAddress());
                $this->entityManager->persist($networkAddress);
            } catch (ORMException $e) {
                throw new \RuntimeException('Unable to create new address ' . $networkAbuseReportRequest->getNetworkAddress());
            }
        }
        return $networkAddress;
    }

    /**
     * @param NetworkAddress $networkAddress
     * @param NetworkAbuseReportRequestInterface $networkAbuseReportRequest
     * @return AbuseReport
     */
    private function createAbuseReport(NetworkAddress $networkAddress, NetworkAbuseReportRequestInterface $networkAbuseReportRequest): AbuseReport
    {
        try {
            $abuseReport = new AbuseReport($networkAddress, $networkAbuseReportRequest->getNetworkAbuseReport());
            $this->entityManager->persist($abuseReport);
        } catch (ORMException $e) {
            throw new \RuntimeException('Unable to create new abuse report for ' . $networkAbuseReportRequest->getNetworkAddress());
        }

        return $abuseReport;
    }

    /**
     * NetworkAbuseReportingService constructor.
     * @param EntityManager $entityManager
     * @param NetworkAddressRepositoryInterface $networkAddressRepository
     */
    public function __construct(
        EntityManager $entityManager,
        NetworkAddressRepositoryInterface $networkAddressRepository
    )
    {
        parent::__construct($entityManager);
        $this->networkAddressRepository = $networkAddressRepository;
    }

    /**
     * @param NetworkAbuseReportRequestInterface $networkAbuseReportRequest
     * @return AbuseReport
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function handle(NetworkAbuseReportRequestInterface $networkAbuseReportRequest): AbuseReport
    {
        $networkAddress = $this->createOrRetrieveNetworkAddress($networkAbuseReportRequest);
        $networkAbuseReport = $this->createAbuseReport($networkAddress, $networkAbuseReportRequest);

        // Add a new network abuse record to the network address
        $networkAddress->addAbuseReports($networkAbuseReport);

        return $networkAbuseReport;
    }
}
