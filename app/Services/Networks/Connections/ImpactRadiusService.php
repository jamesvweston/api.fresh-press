<?php

namespace App\Services\Networks\Connections;


use App\Models\Networks\NetworkConnection;
use App\Services\Networks\Connections\Contracts\Syncable;
use App\Utilities\NetworkUtility;
use FMTCco\Integrations\Apis\ImpactRadius\ImpactRadiusApi;
use FMTCco\Integrations\Apis\ImpactRadius\Requests\GetCampaigns;

class ImpactRadiusService extends BaseNetworkConnectionService implements Syncable
{

    /**
     * @param   NetworkConnection   $network_connection
     * @return  int[]
     */
    public function getProgramIds($network_connection)
    {
        $api                        = $this->getApi($network_connection);
        $request                    = new GetCampaigns();
        $request->setPageSize(100);
        $page                       = 1;
        $programIds                 = [];

        do {
            $request->setPage($page);
            $response               = $api->getCampaigns($request);
            foreach ($response->getData() AS $item)
            {
                $programIds[]       = $item->getCampaignId();
            }
            $page++;
        } while ($response->getPage() < $response->getNumpages());

        return $programIds;
    }

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

}