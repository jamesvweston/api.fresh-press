<?php

namespace App\Services\Networks\Connections;


use App\Models\Networks\NetworkConnection;
use App\Services\Networks\Connections\Contracts\Syncable;
use App\Utilities\NetworkUtility;
use FMTCco\Integrations\Apis\AffiliateWindow\AffiliateWindowApi;
use FMTCco\Integrations\Apis\AffiliateWindow\Requests\GetClickStats;
use FMTCco\Integrations\Apis\AffiliateWindow\Requests\GetMerchantList;
use FMTCco\Integrations\Exceptions\InvalidNetworkCredentialsException;

class AffiliateWindowService extends BaseNetworkConnectionService implements Syncable
{

    /**
     * @param   NetworkConnection   $network_connection
     * @return  bool
     * @throws  InvalidNetworkCredentialsException
     */
    protected function testConnectionCredentials ($network_connection)
    {
        $request                    = new GetClickStats();
        $request->setDStartDate(date('c', time()-(60*60*24*30)));
        $request->setDEndDate(date('c'));
        $request->setILimit(1);

        $api                        = $this->getApi($network_connection);
        $api->getClickStats($request);
        return true;
    }

    /**
     * @param   NetworkConnection   $network_connection
     * @return  int[]
     */
    public function getProgramIds($network_connection)
    {
        $api                        = $this->getApi($network_connection);
        $request                    = new GetMerchantList();
        $request->setSRelationship('joined');

        $result                     = $api->getMerchantList($request);
        $programIds                 = [];
        foreach ($result AS $item)
            $programIds[]           = $item->getIId();

        return $programIds;

    }

    /**
     * @param   NetworkConnection   $network_connection
     * @return  AffiliateWindowApi
     */
    public function getApi ($network_connection)
    {
        return new AffiliateWindowApi($network_connection->affiliate_id, $network_connection->getFieldByName('api_password')->value);
    }

    /**
     * @return int
     */
    protected function getNetworkId ()
    {
        return NetworkUtility::AFFILIATE_WINDOW;
    }

}