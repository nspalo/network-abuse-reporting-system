<?php

namespace App\Database\Repositories\AbuseReports;

/**
 * Interface AbuseReportRepositoryInterface
 * @package App\Database\Repositories\AbuseReports
 */
interface AbuseReportRepositoryInterface
{
    /**
     * Find All
     *
     * @return array
     */
    public function findAll(): array;

    /**
     * Find By Id
     *
     * @param $id
     * @return object|null
     */
    public function findById($id);

    /**
     * Find Report Records By IP
     * - Supports IPV4 and IPV6 value
     *
     * @param string $ipAddress
     * @return mixed
     */
    public function findReportByIP(string $ipAddress);
}
