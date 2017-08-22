<?php

namespace App\Services\Networks\Connections;


use App\Utilities\NetworkUtility;

class AffiliateWindowService extends BaseNetworkConnectionService
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
        return NetworkUtility::AFFILIATE_WINDOW;
    }

    /**
     * @return string
     */
    public function getHelpLink()
    {
        return 'http://support.fmtc.co/solution/articles/221669-network-setup-affiliate-window';
    }

    /**
     * @return string
     */
    public function getAffiliateIdRegex ()
    {
        return '/^\d+$/';
    }


}