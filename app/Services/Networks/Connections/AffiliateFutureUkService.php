<?php

namespace App\Services\Networks\Connections;


use App\Utilities\NetworkUtility;

class AffiliateFutureUkService extends BaseNetworkConnectionService
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
        return NetworkUtility::AFFILIATE_FUTURE_UK;
    }

    /**
     * @return string
     */
    public function getHelpLink()
    {
        return 'http://support.fmtc.co/solution/articles/221672-network-setup-affiliate-future-uk';
    }

    /**
     * @return string
     */
    public function getAffiliateIdRegex ()
    {
        return '/^\w+$/';
    }

}