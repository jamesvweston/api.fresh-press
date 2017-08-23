<?php

namespace App\Services\Networks\Connections;


use App\Models\Networks\NetworkConnection;
use App\Utilities\NetworkUtility;

class LsLeadAdvantageService extends BaseNetworkConnectionService
{

    /**
     * @param   NetworkConnection   $network_connection
     * @return  bool
     */
    protected function testConnectionCredentials ($network_connection)
    {
        return false;
    }

    /**
     * @return int
     */
    protected function getNetworkId ()
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