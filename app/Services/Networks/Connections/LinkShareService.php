<?php

namespace App\Services\Networks\Connections;


use App\Utilities\NetworkUtility;

class LinkShareService extends BaseNetworkConnectionService
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
        return NetworkUtility::RAKUTEN_LINKSHARE;
    }

    /**
     * @return string
     */
    public function getHelpLink()
    {
        return 'http://support.fmtc.co/solution/articles/221680-network-setup-linkshare';
    }

    /**
     * @return string
     */
    public function getAffiliateIdRegex ()
    {
        return '/^[\w\/]+$/';
    }

}