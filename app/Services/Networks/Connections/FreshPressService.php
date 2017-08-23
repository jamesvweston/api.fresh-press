<?php

namespace App\Services\Networks\Connections;


use App\Models\Networks\NetworkConnection;
use App\Utilities\NetworkUtility;

class FreshPressService extends BaseNetworkConnectionService
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
        return NetworkUtility::FRESH_PRESS;
    }

    /**
     * @return string
     */
    public function getHelpLink()
    {
        return 'http://support.fmtc.co';
    }

    /**
     * @return string
     */
    public function getAffiliateIdRegex ()
    {
        return '/^\d+$/';
    }



}