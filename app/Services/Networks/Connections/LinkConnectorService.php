<?php

namespace App\Services\Networks\Connections;


use App\Models\Networks\NetworkConnection;
use App\Utilities\NetworkUtility;
use FMTCco\Integrations\Exceptions\InvalidNetworkCredentialsException;
use \GuzzleHttp\Client;

class LinkConnectorService extends BaseNetworkConnectionService
{

    /**
     * @param   NetworkConnection   $network_connection
     * @return  bool
     * @throws  InvalidNetworkCredentialsException
     */
    protected function testConnectionCredentials ($network_connection)
    {
        $api                    = $this->getApi($network_connection, 'getCampaignApproved');
        $res                    = $api->request('POST');

        if ($res->getBody()->getContents() == 'Unable to complete request: Invalid API Key')
        {
            throw new InvalidNetworkCredentialsException($res->getBody()->getContents());
        }
        return true;
    }

    /**
     * @param   NetworkConnection   $network_connection
     * @param   string              $action
     * @return  Client
     */
    public function getApi ($network_connection, $action)
    {
        $config     = [
            'base_uri'          => 'http://www.linkconnector.com/api/',
            'form_params'       => [
                'Key'       => $network_connection->getFieldByName('api_key')->value,
                'Function'  => $action,
                'Format' => 'JSON',
            ]
        ];
        $client                 = new Client($config);
        return $client;
    }

    /**
     * @return int
     */
    protected function getNetworkId ()
    {
        return NetworkUtility::LINK_CONNECTOR;
    }

    /**
     * @return string
     */
    public function getHelpLink()
    {
        return 'http://support.fmtc.co/solution/articles/221679-network-setup-linkconnector';
    }

    /**
     * @return string
     */
    public function getAffiliateIdRegex ()
    {
        return '/^\d+$/';
    }

}