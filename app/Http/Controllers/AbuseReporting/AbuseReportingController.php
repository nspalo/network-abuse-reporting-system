<?php

namespace App\Http\Controllers\AbuseReporting;

use App\Database\Entities\AbuseReports\AbuseReport;
use App\Database\Entities\User\User;
use App\Database\Repositories\AbuseReports\AbuseReportRepositoryInterface;
use App\Database\Repositories\NetworkAddress\NetworkAddressRepositoryInterface;
use App\Database\Repositories\User\UserRepositoryInterface;
use App\Http\Controllers\NetworkAbuseReportingSystemController;
use App\Http\Requests\NetworkAbuseReport\NetworkAbuseReportRequest;
use App\Services\NetworkAbuseReporting\NetworkAbuseReportingService;
use Doctrine\ORM\EntityManager;
use Illuminate\Http\JsonResponse;

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
     * @var AbuseReportRepositoryInterface
     */
    private $userRepository;
    /**
     * @var NetworkAbuseReportingService
     */
    private $networkAbuseReportingService;

    /**
     * AbuseReportingController constructor.
     * @param EntityManager $entityManager
     * @param NetworkAddressRepositoryInterface $IPAddressRepository
     * @param AbuseReportRepositoryInterface $abuseReportRepository
     * @param UserRepositoryInterface $userRepository
     * @param NetworkAbuseReportingService $networkAbuseReportingService
     */
    public function __construct(
        EntityManager $entityManager,
        NetworkAddressRepositoryInterface $IPAddressRepository,
        AbuseReportRepositoryInterface $abuseReportRepository,
        UserRepositoryInterface $userRepository,
        NetworkAbuseReportingService $networkAbuseReportingService
    )
    {
        parent::__construct($entityManager);
        $this->IPAddressRepository = $IPAddressRepository;
        $this->abuseReportRepository = $abuseReportRepository;
        $this->userRepository = $userRepository;
        $this->networkAbuseReportingService = $networkAbuseReportingService;
    }

    /**
     * @return JsonResponse
     */
    public function checkReportByIP(): JsonResponse
    {
        $reports = $this->abuseReportRepository->findReportByIp('124.6.181.20');
        $abuseReports = [];

        /** @var AbuseReport $report */
        foreach ($reports as $report) {
            $abuseReports[] = [
                'ip' => $report->getIpAddress(),
                'comment' => $report->getComment(),
                'reporter' => ($report->getReporter())?$report->getReporter()->getUsername() : []
            ];
        }


        /** @var User $user */
        $user = $this->userRepository->findByUsername('jdoe');
        $userReports = $this->abuseReportRepository->findReportsByUserId($user->getId());
        $reports = [];

        foreach ($userReports as $report) {
            $reports[$user->getUsername()][] = [
                "ipAddress" => $report->getIpAddress(),
                "comment" => $report->getComment()
            ];
            //dump($report);
        }

        //dd($userReports);


        return response()->json([
            'success' => true,
            'reports' => $abuseReports,
            'userReports' => $reports
        ]);
    }

    /**
     * @param NetworkAbuseReportRequest $networkAbuseReportRequest
     * @return JsonResponse
     * @throws \Doctrine\ORM\ORMException
     */
    public function reportNetworkAbuse(NetworkAbuseReportRequest $networkAbuseReportRequest): JsonResponse
    {
        $abuseReport = $this->networkAbuseReportingService->handle($networkAbuseReportRequest);
        $this->entityManager->flush();
        $this->entityManager->refresh($abuseReport);

        return response()->json([
            'success' => true,
            'recordId' => $abuseReport->getId(),
        ]);
    }

}
