<?php

namespace App\Services\Networks\Connections;


use App\Models\Networks\NetworkConnection;
use App\Services\Networks\Connections\Contracts\Syncable;
use App\Utilities\NetworkUtility;
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
        try
        {
            $client = $this->getApi($network_connection->affiliate_id, $network_connection->getFieldByName('api_password')->value);
            $client->getClickStats([
                'dStartDate'    =>  date('c', time()-(60*60*24*30)),
                'dEndDate'      =>  date('c'),
                'sDateType'     =>  'transaction',
                'iLimit'        =>  5
            ]);
            return true;
        }
        catch (\Exception $exception)
        {
            throw new InvalidNetworkCredentialsException($exception->getMessage());
        }
    }

    /**
     * @param   string  $affiliateId
     * @param   string  $apiPassword
     * @return  \SoapClient
     */
    public function getApi ($affiliateId, $apiPassword)
    {
        $user = new \stdClass();
        $user->iId = $affiliateId;
        $user->sType = 'affiliate';
        $user->sPassword = $apiPassword;

        $client = new \SoapClient("http://api.affiliatewindow.com/v4/AffiliateService?wsdl");
        $client->__setSoapHeaders([
            new \SoapHeader(
                'http://api.affiliatewindow.com/v4/AffiliateService',
                'UserAuthentication',
                $user
            )
        ]);

        return $client;
    }

    /**
     * @param   NetworkConnection   $network_connection
     */
    public function syncRelations($network_connection)
    {

    }

    /**
     * @return int
     */
    protected function getNetworkId ()
    {
        return NetworkUtility::AFFILIATE_WINDOW;
    }

    /**
     * @return string
     */
    public function getHelpLink()
    {
        return 'http://support.fmtc.co/solution/articles/221669-network-setup-affiliate-window';
    }

    /**
     * @return string
     */
    public function getAffiliateIdRegex ()
    {
        return '/^\d+$/';
    }


}