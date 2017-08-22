<?php

namespace App\Services\Networks\Connections;


use App\Utilities\NetworkUtility;

class OneNetworkService extends BaseNetworkConnectionService
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
        return NetworkUtility::ONE_NETWORK;
    }

    /**
     * @return string
     */
    public function getHelpLink()
    {
        return 'http://support.fmtc.co/solution/articles/221683-network-setup-one-network';
    }

    /**
     * @return string
     */
    public function getAffiliateIdRegex ()
    {
        return '/^\w+$/';
    }



}