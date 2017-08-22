<?php

namespace App\Services\Networks\Connections;


use App\Utilities\NetworkUtility;

class AffiliateFutureService extends BaseNetworkConnectionService
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
        return NetworkUtility::AFFILIATE_FUTURE;
    }

    /**
     * @return string
     */
    public function getHelpLink()
    {
        return 'http://support.fmtc.co/solution/articles/221671-network-setup-affiliate-future';
    }

    /**
     * @return string
     */
    public function getAffiliateIdRegex ()
    {
        return '/^\d+$/';
    }

}