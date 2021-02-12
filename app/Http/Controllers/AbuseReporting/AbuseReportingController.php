<?php

namespace App\Http\Controllers\AbuseReporting;

use App\Database\Entities\AbuseReports\AbuseReport;
use App\Database\Entities\User\User;
use App\Database\Repositories\AbuseReports\AbuseReportRepositoryInterface;
use App\Database\Repositories\NetworkAddress\NetworkAddressRepositoryInterface;
use App\Database\Repositories\User\UserRepositoryInterface;
use App\Http\Controllers\NetworkAbuseReportingSystemController;
use App\Http\Requests\NetworkAbuseReport\NetworkAbuseReportRequest;
use App\Renderers\AbuseReport\AbuseReportRenderer;
use App\Renderers\NetworkAddress\NetworkAddressRenderer;
use App\Services\NetworkAbuseReporting\NetworkAbuseReportingService;
use Doctrine\ORM\EntityManager;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class AbuseReportingController
 * @package App\Http\Controllers\AbuseReporting
 */
class AbuseReportingController extends NetworkAbuseReportingSystemController
{
    /**
     * @var NetworkAddressRepositoryInterface
     */
    private $networkAddressRepository;
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
     * @var NetworkAddressRenderer
     */
    private $networkAddressRenderer;
    /**
     * @var AbuseReportRenderer
     */
    private $abuseReportRenderer;

    /**
     * AbuseReportingController constructor.
     * @param EntityManager $entityManager
     * @param NetworkAddressRepositoryInterface $networkAddressRepository
     * @param AbuseReportRepositoryInterface $abuseReportRepository
     * @param UserRepositoryInterface $userRepository
     * @param NetworkAbuseReportingService $networkAbuseReportingService
     * @param NetworkAddressRenderer $networkAddressRenderer
     * @param AbuseReportRenderer $abuseReportRenderer
     */
    public function __construct(
        EntityManager $entityManager,
        NetworkAddressRepositoryInterface $networkAddressRepository,
        AbuseReportRepositoryInterface $abuseReportRepository,
        UserRepositoryInterface $userRepository,
        NetworkAbuseReportingService $networkAbuseReportingService,
        NetworkAddressRenderer $networkAddressRenderer,
        AbuseReportRenderer $abuseReportRenderer
    )
    {
        parent::__construct($entityManager);
        $this->networkAddressRepository = $networkAddressRepository;
        $this->abuseReportRepository = $abuseReportRepository;
        $this->userRepository = $userRepository;
        $this->networkAbuseReportingService = $networkAbuseReportingService;
        $this->networkAddressRenderer = $networkAddressRenderer;
        $this->abuseReportRenderer = $abuseReportRenderer;
    }

    /**
     * @return JsonResponse
     */
    public function getReports(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'records' => $this->abuseReportRenderer->render(
                $this->abuseReportRepository->findAll()
            )
        ]);
    }

    /**
     * @param string|null $ip
     * @return JsonResponse
     */
    public function checkReportByIP(string $ip = null): JsonResponse
    {
        return response()->json([
            'records' => $this->networkAddressRenderer->render(
                (isset($ip))
                    ? $this->networkAddressRepository->findByIPAddress($ip)
                        : $this->networkAddressRepository->findAll()
            )
        ]);
    }

    /**
     * @param string|null $username
     * @return JsonResponse
     */
    public function checkAbuseReportRecordByUsername(string $username = null): JsonResponse
    {
        return response()->json([
            'records' => (isset($username)) ?
                $this->abuseReportRenderer->render(
                    $this->abuseReportRepository->findReportsByUserId(
                        $this->userRepository->findByUsername($username)->getId()
                    )
                ) : []
        ]);
    }

    /**
     * Create Network Abuse Report
     *
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
            'recordId' => $abuseReport->getId(),
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function reportNetworkAbuseForm()
    {
        return view('layouts.main');
    }

}
