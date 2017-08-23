<?php

namespace App\Services\Networks\Connections;


use App\Models\Networks\NetworkConnection;
use App\Utilities\NetworkUtility;

class AffiliateFutureUkService extends BaseNetworkConnectionService
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