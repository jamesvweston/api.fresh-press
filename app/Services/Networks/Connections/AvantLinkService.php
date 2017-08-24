<?php

namespace App\Services\Networks\Connections;


use App\Models\Networks\NetworkConnection;
use App\Services\Networks\Connections\Contracts\Reportable;
use App\Services\Networks\Connections\Contracts\Syncable;
use App\Utilities\NetworkUtility;
use FMTCco\Integrations\Apis\AvantLink\AvantLinkApi;
use FMTCco\Integrations\Apis\AvantLink\Requests\GetAssociationFeed;

class AvantLinkService extends BaseNetworkConnectionService implements Reportable, Syncable
{

    /**
     * @param   NetworkConnection   $network_connection
     * @return  bool
     */
    protected function testConnectionCredentials ($network_connection)
    {
        $avant_link_api             = $this->getApi($network_connection);
        $avant_link_api->getAffiliatePerformanceSummary([]);
        return true;
    }

    /**
     * @param   NetworkConnection   $network_connection
     * @return  int[]
     */
    public function getProgramIds($network_connection)
    {
        $api                        = $this->getApi($network_connection);
        $request                    = new GetAssociationFeed();
        $request->setAssociationStatus('active');

        $result                     = $api->getAssociationFeed($request);
        $programIds                 = [];
        foreach ($result AS $item)
            $programIds[]           = $item->getMerchantId();

        return $programIds;
    }

    /**
     * @param   \App\Models\Networks\NetworkConnection $network_connection
     * @param   string  $from_date
     * @param   string  $to_date
     */
    public function handleImports ($network_connection, $from_date = 'now', $to_date = 'now')
    {

    }

    /**
     * @param   NetworkConnection   $network_connection
     * @return  AvantLinkApi
     */
    protected function getApi ($network_connection)
    {
        return new AvantLinkApi($network_connection->getFieldByName('affiliate_id')->value, $network_connection->getFieldByName('api_key')->value, 'xml');
    }

    /**
     * @return int
     */
    protected function getNetworkId ()
    {
        return NetworkUtility::AVANT_LINK;
    }

}