<?php

namespace App\Services\Networks\Connections;


use App\Models\Networks\NetworkConnection;
use App\Utilities\NetworkUtility;
use FMTCco\Integrations\Apis\Skimlinks\Requests\GetReportMerchants;
use FMTCco\Integrations\Apis\Skimlinks\SkimlinksApi;
use Carbon\Carbon;

class SkimlinksService extends BaseNetworkConnectionService
{

    /**
     * @param   NetworkConnection   $network_connection
     * @return  bool
     */
    protected function testConnectionCredentials ($network_connection)
    {
        $api                        = $this->getApi($network_connection);
        $yesterday                  = Carbon::parse('yesterday')->format('Y-m-d');
        $request                    = new GetReportMerchants();
        $request->setStartDate($yesterday);
        $request->setEndDate($yesterday);
        $request->setResponseLimit(1);

        $api->getCommissions($request);
        return true;
    }

    /**
     * @param   NetworkConnection   $network_connection
     * @return  SkimlinksApi
     */
    public function getApi ($network_connection)
    {
        return new SkimlinksApi($network_connection->getFieldByName('public_api_key')->value, $network_connection->getFieldByName('private_api_key')->value);
    }

    /**
     * @return int
     */
    protected function getNetworkId ()
    {
        return NetworkUtility::SKIMLINKS;
    }

}