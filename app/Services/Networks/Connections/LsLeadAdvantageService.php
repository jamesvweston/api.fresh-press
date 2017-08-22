<?php

namespace App\Services\Networks\Connections;


use App\Utilities\NetworkUtility;

class LsLeadAdvantageService extends BaseNetworkConnectionService
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
        return NetworkUtility::LS_LEAD_ADVANTAGE;
    }

    /**
     * @return string
     */
    public function getHelpLink()
    {
        return 'http://support.fmtc.co/solution/articles/221681-network-setup-ls-lead-advantage';
    }

    /**
     * @return string
     */
    public function getAffiliateIdRegex ()
    {
        return '/^[\w\*\/]+$/';
    }



}