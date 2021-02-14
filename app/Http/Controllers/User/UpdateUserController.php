<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateUserRequest;
use App\Services\User\UpdateUserService;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Exception;
use Illuminate\Http\JsonResponse;

/**
 * Class UserController
 * @package App\Http\Controllers\User
 */
class UpdateUserController extends Controller
{
    /**
     * @var EntityManager
     */
    private $entityManager;
    /**
     * @var UpdateUserService
     */
    private $updateUserService;

    /**
     * UserController constructor.
     * @param EntityManager $entityManager
     * @param UpdateUserService $updateUserService
     */
    public function __construct(
        EntityManager $entityManager,
        UpdateUserService $updateUserService
    ) {
        $this->entityManager = $entityManager;
        $this->updateUserService = $updateUserService;
    }

    /**
     * @param UpdateUserRequest $updateUserRequest
     * @return JsonResponse
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws Exception
     */
    public function store(UpdateUserRequest $updateUserRequest): JsonResponse
    {
        $user = $this->updateUserService->handle($updateUserRequest);

        $this->entityManager->persist($user);
        $this->entityManager->flush();
        $this->entityManager->refresh($user);

        return response()->json([
            'success' => true,
            'recordId' => $user->getId()
        ]);
    }
}
