<?php

namespace App\Services\NetworkAbuseReporting;

/**
 * Interface NetworkAbuseReportRequestInterface
 * @package App\Http\Requests\NetworkAbuseReport
 */
interface NetworkAbuseReportRequestInterface
{
    /**
     * @return string
     */
    public function getNetworkAddress(): string;

    /**
     * @return string
     */
    public function getNetworkAbuseReport(): string;
}
