<?php

namespace App\Services\Networks\Connections;


use App\Models\Networks\NetworkConnection;
use App\Utilities\NetworkUtility;
use FMTCco\Integrations\Apis\PepperJam\PepperJamApi;
use FMTCco\Integrations\Apis\PepperJam\Requests\GetTransactionSummary;

class PepperjamService extends BaseNetworkConnectionService
{

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

    /**
     * @return string
     */
    public function getHelpLink()
    {
        return 'http://support.fmtc.co/solution/articles/221684-network-setup-pepperjam';
    }

    /**
     * @return string
     */
    public function getAffiliateIdRegex ()
    {
        return '/^\d+$/';
    }



}