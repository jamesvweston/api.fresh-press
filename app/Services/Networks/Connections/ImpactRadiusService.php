<?php

namespace App\Services\Networks\Connections;


use App\Models\Networks\NetworkConnection;
use App\Utilities\NetworkUtility;
use FMTCco\Integrations\Apis\ImpactRadius\ImpactRadiusApi;

class ImpactRadiusService extends BaseNetworkConnectionService
{

    /**
     * @param   NetworkConnection   $network_connection
     * @return  bool
     */
    protected function testConnectionCredentials ($network_connection)
    {
        $api                        = $this->getApi($network_connection);
        $api->getCampaigns(['PageSize' => 1, 'Page' => 1]);
        return true;
    }

    /**
     * @param   NetworkConnection $network_connection
     * @return  ImpactRadiusApi
     */
    public function getApi ($network_connection)
    {
        return new ImpactRadiusApi($network_connection->getFieldByName('account_sid')->value, $network_connection->getFieldByName('auth_token')->value);
    }

    /**
     * @return int
     */
    protected function getNetworkId ()
    {
        return NetworkUtility::IMPACT_RADIUS;
    }

    /**
     * @return string
     */
    public function getHelpLink()
    {
        return 'http://support.fmtc.co/solution/articles/221721-network-setup-impact-radius';
    }

    /**
     * @return string
     */
    public function getAffiliateIdRegex ()
    {
        return '/^\d+$/';
    }



}