<?php

namespace App\Services\Networks\Connections;


use App\Models\Networks\NetworkConnection;
use App\Utilities\NetworkUtility;
use FMTCco\Integrations\Apis\ShareASale\Requests\GetActivity;
use FMTCco\Integrations\Apis\ShareASale\ShareASaleApi;

class ShareASaleService extends BaseNetworkConnectionService
{

    /**
     * @param   NetworkConnection   $network_connection
     * @return  bool
     */
    protected function testConnectionCredentials ($network_connection)
    {
        $api                        = $this->getApi($network_connection);

        $getActivity                = new GetActivity();
        $getActivity->setDateStart('01/01/2016');
        $getActivity->setDateEnd('01/02/2016');
        $api->getActivity($getActivity);
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

    /**
     * @return string
     */
    public function getHelpLink()
    {
        return 'http://support.fmtc.co/solution/articles/221686-network-setup-shareasale';
    }

    /**
     * @return string
     */
    public function getAffiliateIdRegex ()
    {
        return '/^\d+$/';
    }



}