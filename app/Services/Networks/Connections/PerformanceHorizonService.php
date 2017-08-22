<?php

namespace App\Services\Networks\Connections;


use App\Utilities\NetworkUtility;

class PerformanceHorizonService extends BaseNetworkConnectionService
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
        return NetworkUtility::PERFORMANCE_HORIZON;
    }

    /**
     * @return string
     */
    public function getHelpLink()
    {
        return 'http://support.fmtc.co/solution/articles/221685-network-setup-performance-horizon-group';
    }

    /**
     * @return string
     */
    public function getAffiliateIdRegex ()
    {
        return '/^[\w\|]+$/';
    }



}