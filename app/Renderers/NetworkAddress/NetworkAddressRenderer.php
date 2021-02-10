<?php

namespace App\Renderers\NetworkAddress;

use App\Database\Entities\AbuseReports\AbuseReport;
use App\Database\Entities\NetworkAddress\NetworkAddress;
use App\Renderers\AbstractRender;
use Carbon\Carbon;

/**
 * Class NetworkAddressRenderer
 * @package App\Renderers\NetworkAddress
 */
class NetworkAddressRenderer extends AbstractRender
{
    /**
     * @param $networkAddress
     * @return array
     */
    public function render($networkAddress): array
    {

        if(is_null($networkAddress)) {
            return [];
        }

        if($networkAddress instanceof NetworkAddress ) {

            return [
                'id' => $networkAddress->getId(),
                'ipAddress' => $networkAddress->getIpAddress(),
                'abuseReports' => array_map(
                    static function (AbuseReport $report) {
                        return [
                            'id' => $report->getId(),
                            'comment' => $report->getComment(),
                            'date' => Carbon::createFromTimestamp($report->getCreatedAt()->getTimestamp())->format('Y-m-d h:s:i')
                        ];
                    },
                    $networkAddress->getAbuseReports()->toArray()
                )
            ];
        }

        return $this->renderList($networkAddress);
    }
}
