<?php

namespace App\Services\Networks\Connections;


use App\Models\Networks\NetworkConnection;
use App\Services\Networks\Connections\Contracts\Syncable;
use App\Utilities\NetworkUtility;
use FMTCco\Integrations\Apis\LinkConnector\LinkConnectorApi;
use FMTCco\Integrations\Exceptions\InvalidNetworkCredentialsException;

class LinkConnectorService extends BaseNetworkConnectionService implements Syncable
{

    public function getProgramIds($network_connection)
    {
        $api                    = $this->getApi($network_connection);
        $response               = $api->getApprovedCampaigns();

        $program_ids            = [];
        foreach ($response AS $campaign)
        {
            $program_ids[]      = $campaign->getMerchantID();
        }

        return $program_ids;
    }

    /**
     * @param   NetworkConnection   $network_connection
     * @return  bool
     * @throws  InvalidNetworkCredentialsException
     */
    protected function testConnectionCredentials ($network_connection)
    {
        $api                    = $this->getApi($network_connection);
        $api->getReportAccountBalance();
        return true;
    }

    /**
     * @param   NetworkConnection   $network_connection
     * @return  LinkConnectorApi
     */
    public function getApi ($network_connection)
    {
        return new LinkConnectorApi($network_connection->getFieldByName('api_key')->value);
    }

    /**
     * @return int
     */
    protected function getNetworkId ()
    {
        return NetworkUtility::LINK_CONNECTOR;
    }

}