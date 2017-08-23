<?php

namespace App\Services\Networks\Connections;


use App\Models\Networks\NetworkConnection;
use App\Utilities\NetworkUtility;

class SheIsMediaService extends BaseNetworkConnectionService
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
        return NetworkUtility::SHE_IS_MEDIA;
    }

    /**
     * @return string
     */
    public function getHelpLink()
    {
        return 'http://support.fmtc.co/solution/articles/221687-network-setup-sheismedia';
    }

    /**
     * @return string
     */
    public function getAffiliateIdRegex ()
    {
        return '/^\d+$/';
    }



}