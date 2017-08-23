<?php

namespace App\Services\Networks\Connections;


use App\Models\Networks\NetworkConnection;
use App\Utilities\NetworkUtility;

class SkimlinksService extends BaseNetworkConnectionService
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
        return NetworkUtility::SKIMLINKS;
    }

    /**
     * @return string
     */
    public function getHelpLink()
    {
        return 'https://support.fmtc.co/solution/articles/221573-how-do-i-find-my-skimlinks-site-id-';
    }

    /**
     * @return string
     */
    public function getAffiliateIdRegex ()
    {
        return '/.+/';
    }



}