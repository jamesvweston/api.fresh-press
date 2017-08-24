<?php

namespace App\Services\Networks\Connections;


use App\Models\Networks\NetworkConnection;
use App\Services\Networks\Connections\Contracts\Syncable;
use App\Utilities\NetworkUtility;
use FMTCco\Integrations\Apis\CommissionJunction\CommissionJunctionApi;
use FMTCco\Integrations\Apis\CommissionJunction\Requests\GetAdvertisers;

class CommissionJunctionService extends BaseNetworkConnectionService implements Syncable
{

    /**
     * @param   NetworkConnection   $network_connection
     * @return  int[]
     */
    public function getProgramIds($network_connection)
    {
        $api                        = $this->getApi($network_connection);

        $request                    = new GetAdvertisers();
        $request->setAdvertiserIds('joined');
        $request->setRecordsPerPage(1);

        $pages_response             = $api->getAdvertisers($request);
        $pages                      = ceil($pages_response->getTotalMatched() / 100);

        $request->setRecordsPerPage(100);

        $programIds                 = [];

        for ($i = 1; $i < $pages; $i++)
        {
            $request->setPageNumber($i);

            $response               = $api->getAdvertisers($request);
            foreach ($response->getAdvertisers() AS $advertiser)
            {
                $programIds[]       = $advertiser->getAdvertiserId();
            }
        }
        return $programIds;
    }

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
     * @return int
     */
    protected function getNetworkId ()
    {
        return NetworkUtility::COMMISSION_JUNCTION;
    }

    /**
     * @param   NetworkConnection   $network_connection
     * @return  CommissionJunctionApi
     */
    protected function getApi ($network_connection)
    {
        return new CommissionJunctionApi($network_connection->getFieldByName('api_key')->value);
    }

}