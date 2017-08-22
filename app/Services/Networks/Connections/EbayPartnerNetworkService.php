<?php

namespace App\Services\Networks\Connections;


use App\Utilities\NetworkUtility;

class EbayPartnerNetworkService extends BaseNetworkConnectionService
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
        return NetworkUtility::EBAY_PARTNER_NETWORK;
    }

    /**
     * @return string
     */
    public function getHelpLink()
    {
        return 'http://support.fmtc.co/solution/articles/221677-network-setup-ebay-partner-network';
    }

    /**
     * @return string
     */
    public function getAffiliateIdRegex ()
    {
        return '/^[\w\|]+$/';
    }



}