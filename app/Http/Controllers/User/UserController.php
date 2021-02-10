<?php

namespace App\Http\Controllers\User;

use App\Database\Repositories\User\UserRepositoryInterface;
use App\Http\Controllers\NetworkAbuseReportingSystemController;
use App\Renderers\User\UserRenderer;
use Doctrine\ORM\EntityManager;
use Illuminate\Http\JsonResponse;

/**
 * Class UserController
 * @package App\Http\Controllers\User
 */
class UserController extends NetworkAbuseReportingSystemController
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;
    /**
     * @var UserRenderer
     */
    private $userRenderer;

    /**
     * UserController constructor.
     * @param EntityManager $entityManager
     * @param UserRepositoryInterface $userRepository
     * @param UserRenderer $userRenderer
     */
    public function __construct(
        EntityManager $entityManager,
        UserRepositoryInterface $userRepository,
        UserRenderer $userRenderer
    )
    {
        parent::__construct($entityManager);
        $this->userRepository = $userRepository;
        $this->userRenderer = $userRenderer;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'users' => $this->userRenderer->render(
                $this->userRepository->findAllUser()
            )
        ]);
    }
}
