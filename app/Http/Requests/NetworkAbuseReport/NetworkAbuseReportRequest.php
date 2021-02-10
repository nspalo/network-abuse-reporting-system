<?php

namespace App\Http\Requests\NetworkAbuseReport;

use App\Services\NetworkAbuseReporting\NetworkAbuseReportRequestInterface;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class NetworkAbuseReportRequest
 * @package App\Http\Requests\NetworkAbuseReport
 */
class NetworkAbuseReportRequest extends FormRequest implements NetworkAbuseReportRequestInterface
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'ipAddress' => 'required|string|ip',
            'comment' => 'string|max:256',
        ];
    }

    /**
     * @return string
     */
    public function getNetworkAddress(): string
    {
        return $this->input('ipAddress');
    }

    /**
     * @return string
     */
    public function getNetworkAbuseReport(): string
    {
        return $this->input('comment');
    }
}
