<?php

namespace App\Services\Networks\Connections;


use App\Models\Networks\NetworkConnection;
use App\Services\Networks\Connections\Contracts\Syncable;
use App\Utilities\NetworkUtility;
use FMTCco\Integrations\Apis\ShareASale\Requests\GetActivity;
use FMTCco\Integrations\Apis\ShareASale\Requests\GetBalance;
use FMTCco\Integrations\Apis\ShareASale\Requests\GetMerchantStatus;
use FMTCco\Integrations\Apis\ShareASale\ShareASaleApi;

class ShareASaleService extends BaseNetworkConnectionService implements Syncable
{

    public function getProgramIds($network_connection)
    {
        $api                        = $this->getApi($network_connection);
        $program_ids                = [];
        $request                    = new GetMerchantStatus();
        $response                   = $api->getMerchantStatus($request);

        foreach ($response AS $merchantStatus)
            $program_ids[]          = $merchantStatus->getMerchantid();

        return $program_ids;
    }

    /**
     * @param   NetworkConnection   $network_connection
     * @return  bool
     */
    protected function testConnectionCredentials ($network_connection)
    {
        $api                        = $this->getApi($network_connection);

        $request                    = new GetBalance();
        $api->getBalance($request);

        return true;
    }

    /**
     * @param   NetworkConnection   $network_connection
     * @return  ShareASaleApi
     */
    public function getApi ($network_connection)
    {
        return new ShareASaleApi($network_connection->affiliate_id, $network_connection->getFieldByName('token')->value, $network_connection->getFieldByName('secret_key')->value);
    }


    /**
     * @return int
     */
    protected function getNetworkId ()
    {
        return NetworkUtility::SHARE_A_SALE;
    }

}