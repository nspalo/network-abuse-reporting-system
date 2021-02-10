<?php

namespace App\Http\Controllers;

use Doctrine\ORM\EntityManager;

/**
 * Class NerworkAbuseReportingSystemController
 * @package App\Http\Controllers
 */
class NetworkAbuseReportingSystemController extends Controller
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }
}
