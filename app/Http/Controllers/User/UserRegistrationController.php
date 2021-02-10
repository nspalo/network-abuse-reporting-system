<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRegistrationRequest;
use App\Services\User\UserRegistrationService;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @var UserRegistrationService
     */
    private $userRegistrationService;

    /**
     * UserController constructor.
     * @param EntityManager $entityManager
     * @param UserRegistrationService $userRegistrationService
     */
    public function __construct(
        EntityManager $entityManager,
        UserRegistrationService $userRegistrationService
    ) {
        $this->entityManager = $entityManager;
        $this->userRegistrationService = $userRegistrationService;
        Auth::guest();
    }


    public function index()
    {
        // Test route
        dd("UserRegistrationController::index()");
    }

    /**
     * @param UserRegistrationRequest $userRegistrationRequest
     * @return JsonResponse
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(UserRegistrationRequest $userRegistrationRequest): JsonResponse
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
