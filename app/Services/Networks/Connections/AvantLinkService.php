<?php

namespace App\Services\Networks\Connections;


use App\Services\Networks\Connections\Contracts\Reportable;
use App\Utilities\NetworkUtility;

class AvantLinkService extends BaseNetworkConnectionService implements Reportable
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
        return NetworkUtility::AVANT_LINK;
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

    /**
     * @param   \App\Models\Networks\NetworkConnection $network_connection
     * @param   string  $from_date
     * @param   string  $to_date
     */
    public function handleImports ($network_connection, $from_date = 'now', $to_date = 'now')
    {

    }

}