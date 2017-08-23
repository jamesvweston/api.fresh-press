<?php

namespace App\Services\Networks\Connections;


use App\Models\Networks\NetworkConnection;
use App\Utilities\NetworkUtility;
use FMTCco\Integrations\Exceptions\InvalidNetworkCredentialsException;
use \GuzzleHttp\Client;

class LinkShareService extends BaseNetworkConnectionService
{

    /**
     * @param   NetworkConnection   $network_connection
     * @return  bool
     * @throws  InvalidNetworkCredentialsException
     */
    protected function testConnectionCredentials ($network_connection)
    {
        $api                    = $this->getApi($network_connection, 'getMerchByName', '/aBogusNameForFastTesting');
        try
        {
            $api->request('GET');
        }
        catch (\Exception $exception)
        {
            throw new InvalidNetworkCredentialsException('Invalid LinkShare credentials');
        }
    }

    /**
     * @param   NetworkConnection   $network_connection
     * @return  Client
     */
    public function getApi ($network_connection, $action, $url_tail = '/')
    {
        $config     = [
            'base_uri'          => 'http://lld2.linksynergy.com/services/restLinks/' . $action . '/' . $network_connection->getFieldByName('web_services_token')->value . $url_tail,
        ];
        $client                 = new Client($config);
        return $client;
    }

    /**
     * @return int
     */
    protected function getNetworkId ()
    {
        return NetworkUtility::RAKUTEN_LINKSHARE;
    }

    /**
     * @return string
     */
    public function getHelpLink()
    {
        return 'http://support.fmtc.co/solution/articles/221680-network-setup-linkshare';
    }

    /**
     * @return string
     */
    public function getAffiliateIdRegex ()
    {
        return '/^[\w\/]+$/';
    }

}