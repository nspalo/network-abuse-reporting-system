<?php

namespace App\Providers;

use App\Database\Entities\AbuseReports\AbuseReport;
use App\Database\Entities\NetworkAddress\NetworkAddress;
use App\Database\Entities\Role\Role;
use App\Database\Entities\User\User;
use App\Database\Repositories\AbuseReports\AbuseReportRepository;
use App\Database\Repositories\AbuseReports\AbuseReportRepositoryInterface;
use App\Database\Repositories\NetworkAddress\NetworkAddressRepository;
use App\Database\Repositories\NetworkAddress\NetworkAddressRepositoryInterface;
use App\Database\Repositories\Role\RoleRepository;
use App\Database\Repositories\Role\RoleRepositoryInterface;
use App\Database\Repositories\User\UserRepository;
use App\Database\Repositories\User\UserRepositoryInterface;
use Doctrine\ORM\EntityManager;
use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoryServiceProvider
 * @package App\Providers
 */
class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        [
            'interface' => RoleRepositoryInterface::class,
            'repository' => RoleRepository::class,
            'entity' => Role::class
        ],
        [
            'interface' => UserRepositoryInterface::class,
            'repository' => UserRepository::class,
            'entity' => User::class
        ],
        [
            'interface' => NetworkAddressRepositoryInterface::class,
            'repository' => NetworkAddressRepository::class,
            'entity' => NetworkAddress::class
        ],
        [
            'interface' => AbuseReportRepositoryInterface::class,
            'repository' => AbuseReportRepository::class,
            'entity' => AbuseReport::class
        ],
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $aRepository) {

            $this->app->bind($aRepository['interface'], function ($app) use ($aRepository) {

                /** @var EntityManager $entityManager */
                $entityManager = $app['em'];
                return new $aRepository['repository'](
                    $entityManager,
                    $entityManager->getClassMetaData($aRepository['entity'])
                );
            });
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
