<?php

namespace App\Services\Networks\Connections;


use App\Utilities\NetworkUtility;

class AvantLinkCAService extends BaseNetworkConnectionService
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
        return NetworkUtility::AVANT_LINK_CA;
    }

    /**
     * @return string
     */
    public function getHelpLink()
    {
        return 'http://support.fmtc.co/solution/articles/221674-network-setup-avantlink';
    }

    /**
     * @return string
     */
    public function getAffiliateIdRegex ()
    {
        return '/^\d+$/';
    }



}