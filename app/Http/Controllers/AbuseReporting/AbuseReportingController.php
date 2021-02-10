<?php

namespace App\Http\Controllers\AbuseReporting;

use App\Database\Entities\AbuseReports\AbuseReport;
use App\Database\Repositories\AbuseReports\AbuseReportRepositoryInterface;
use App\Database\Repositories\NetworkAddress\NetworkAddressRepositoryInterface;
use App\Http\Controllers\NetworkAbuseReportingSystemController;
use Doctrine\ORM\EntityManager;

/**
 * Class AbuseReportingController
 * @package App\Http\Controllers\AbuseReporting
 */
class AbuseReportingController extends NetworkAbuseReportingSystemController
{
    /**
     * @var NetworkAddressRepositoryInterface
     */
    private $IPAddressRepository;
    /**
     * @var AbuseReportRepositoryInterface
     */
    private $abuseReportRepository;

    /**
     * AbuseReportingController constructor.
     * @param EntityManager $entityManager
     * @param NetworkAddressRepositoryInterface $IPAddressRepository
     * @param AbuseReportRepositoryInterface $abuseReportRepository
     */
    public function __construct(
        EntityManager $entityManager,
        NetworkAddressRepositoryInterface $IPAddressRepository,
        AbuseReportRepositoryInterface  $abuseReportRepository
    )
    {
        parent::__construct($entityManager);
        $this->IPAddressRepository = $IPAddressRepository;
        $this->abuseReportRepository = $abuseReportRepository;
    }

    public function checkReportByIP()
    {
        $reports = $this->abuseReportRepository->findReportByIP('124.6.181.20');
        $abuseReports = [];

        /** @var AbuseReport $report */
        foreach ($reports as $report) {
            $abuseReports[] = [
                'ip' => $report->getIpAddress(),
                'comment' => $report->getComment(),
            ];
        }

        return response()->json([
            'success' => true,
            'reports' => $abuseReports
        ]);
    }


}
