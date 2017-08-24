<?php

namespace App\Services\Networks\Connections;


use App\Models\Networks\NetworkConnection;
use App\Services\Networks\Connections\Contracts\Syncable;
use App\Utilities\NetworkUtility;
use FMTCco\Integrations\Apis\PepperJam\PepperJamApi;
use FMTCco\Integrations\Apis\PepperJam\Requests\GetAdvertisers;
use FMTCco\Integrations\Apis\PepperJam\Requests\GetTransactionSummary;

class PepperjamService extends BaseNetworkConnectionService implements Syncable
{


    public function getProgramIds($network_connection)
    {
        $api                    = $this->getApi($network_connection);
        $page                   = 1;
        $program_ids            = [];
        $request                = new GetAdvertisers();
        $request->setStatus('joined');

        do {
            $request->setPage($page);
            $response           = $api->getAdvertisers($request);

            foreach ($response->getData() AS $advertiser)
                $program_ids[]  = $advertiser->getId();

            $page++;
        } while ($page < $response->getPagination()->getTotalPages());

        return $program_ids;
    }

    /**
     * @param   NetworkConnection   $network_connection
     * @return  bool
     */
    protected function testConnectionCredentials ($network_connection)
    {
        $api                    = $this->getApi($network_connection);
        $request                = new GetTransactionSummary();
        $request->setStartDate('2016-01-01');
        $request->setEndDate('2016-01-02');

        $api->getTransactionSummary($request);
        return true;
    }

    /**
     * @param   NetworkConnection   $network_connection
     * @return  PepperJamApi
     */
    public function getApi ($network_connection)
    {
        return new PepperJamApi($network_connection->getFieldByName('api_key')->value);
    }

    /**
     * @return int
     */
    protected function getNetworkId ()
    {
        return NetworkUtility::PEPPER_JAM;
    }

}