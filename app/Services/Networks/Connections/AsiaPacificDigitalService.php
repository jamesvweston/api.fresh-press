<?php

namespace App\Services\Networks\Connections;


use App\Utilities\NetworkUtility;

class AsiaPacificDigitalService extends BaseNetworkConnectionService
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return int
     */
    public function getNetworkId ()
    {
        return NetworkUtility::ASIA_PACIFIC_DIGITAL;
    }

    /**
     * @return string
     */
    public function getHelpLink()
    {
        return 'http://support.fmtc.co/solution/articles/221673-network-setup-asia-pacific-digital';
    }

    /**
     * @return string
     */
    public function getAffiliateIdRegex ()
    {
        return '/^\d+$/';
    }

}