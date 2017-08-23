<?php

namespace App\Services\Networks\Connections;


use App\Models\Networks\NetworkConnection;
use App\Utilities\NetworkUtility;
use FMTCco\Integrations\Apis\CommissionJunction\CommissionJunctionApi;

class CommissionJunctionService extends BaseNetworkConnectionService
{

    /**
     * @param   NetworkConnection   $network_connection
     * @return  bool
     */
    protected function testConnectionCredentials ($network_connection)
    {
        $api                        = $this->getApi($network_connection);
        $api->makeHttpRequest('get', 'languages');

    }

    /**
     * @param   NetworkConnection   $network_connection
     * @return  CommissionJunctionApi
     */
    protected function getApi ($network_connection)
    {
        return new CommissionJunctionApi($network_connection->getFieldByName('api_key')->value);
    }

    /**
     * @return int
     */
    protected function getNetworkId ()
    {
        return NetworkUtility::COMMISSION_JUNCTION;
    }

    /**
     * @return string
     */
    public function getHelpLink()
    {
        return 'http://support.fmtc.co/solution/articles/221676-network-setup-commission-junction';
    }

    /**
     * @return string
     */
    public function getAffiliateIdRegex ()
    {
        return '/^\d+$/';
    }



}