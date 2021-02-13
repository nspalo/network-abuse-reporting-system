<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Services\User\CreateUserService;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Exception;
use Illuminate\Http\JsonResponse;

/**
 * Class UserController
 * @package App\Http\Controllers\User
 */
class UserRegistrationController extends Controller
{
    /**
     * @var EntityManager
     */
    private $entityManager;
    /**
     * @var CreateUserService
     */
    private $userRegistrationService;

    /**
     * UserController constructor.
     * @param EntityManager $entityManager
     * @param CreateUserService $userRegistrationService
     */
    public function __construct(
        EntityManager $entityManager,
        CreateUserService $userRegistrationService
    ) {
        $this->entityManager = $entityManager;
        $this->userRegistrationService = $userRegistrationService;
    }

    /**
     * @param CreateUserRequest $userRegistrationRequest
     * @return JsonResponse
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws Exception
     */
    public function store(CreateUserRequest $userRegistrationRequest): JsonResponse
    {

        $user = $this->userRegistrationService->handle($userRegistrationRequest);

        $this->entityManager->persist($user);
        $this->entityManager->flush();
        $this->entityManager->refresh($user);

        return response()->json([
            'success' => true,
            'recordId' => $user->getId()
        ]);
    }
}
