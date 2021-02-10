<?php

namespace App\Renderers\AbuseReport;

use App\Database\Entities\AbuseReports\AbuseReport;
use App\Renderers\AbstractRender;
use Carbon\Carbon;

/**
 * Class AbuseReportRenderer
 * @package App\Renderers\AbuseReport
 */
class AbuseReportRenderer extends AbstractRender
{
    /**
     * @param $abuseReport
     * @return array
     */
    public function render($abuseReport): array
    {
        if(is_null($abuseReport)) {
            return [];
        }

        if($abuseReport instanceof AbuseReport ) {

            return [
                'id' => $abuseReport->getId(),
                'ipAddress' => $abuseReport->getIpAddress(),
                'comment' => $abuseReport->getComment(),
                'date' => Carbon::createFromTimestamp($abuseReport->getCreatedAt()->getTimestamp())->format('Y-m-d h:s:i'),
                'reporter' => ($abuseReport->getReporter()) ? $abuseReport->getReporter()->getUsername() : null
            ];
        }

        return $this->renderList($abuseReport);
    }
}
