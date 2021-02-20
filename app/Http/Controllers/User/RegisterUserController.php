<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\NetworkAbuseReportingSystemController;
use App\Http\Requests\User\CreateUserRequest;
use App\Services\User\CreateUserService;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Exception;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;

/**
 * Class UserController
 * @package App\Http\Controllers\User
 */
class RegisterUserController extends NetworkAbuseReportingSystemController
{
    use RegistersUsers;

    /**
     * @var CreateUserService
     */
    private $userRegistrationService;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * UserController constructor.
     * @param EntityManager $entityManager
     * @param CreateUserService $userRegistrationService
     */
    public function __construct(
        EntityManager $entityManager,
        CreateUserService $userRegistrationService
    ) {
        parent::__construct($entityManager);
        $this->entityManager = $entityManager;
        $this->userRegistrationService = $userRegistrationService;

        $this->middleware('guest');
    }

    /**
     * TODO - Implementation for the Registration form
     */
    public function create()
    {
        return view('user.register');
    }

    /**
     * @param CreateUserRequest $createUserRequest
     * @return JsonResponse
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws Exception
     */
    public function store(CreateUserRequest $createUserRequest): JsonResponse
    {
        $user = $this->userRegistrationService->handle($createUserRequest);

        $this->entityManager->persist($user);
        $this->entityManager->flush();
        $this->entityManager->refresh($user);

        //event(new Registered($user));
        $this->guard()->login($user);

        return response()->json([
            'success' => true,
            'recordId' => $user->getId()
        ]);
    }
}
