<?php

namespace App\Services\Networks\Connections;


use App\Models\Networks\NetworkConnection;
use App\Utilities\NetworkUtility;

class WebgainsService extends BaseNetworkConnectionService
{

    /**
     * @param   NetworkConnection   $network_connection
     * @return  bool
     */
    protected function testConnectionCredentials ($network_connection)
    {
        try
        {
            $response = $this->makeAPIRequest('getBriefProgramsAsString', $network_connection->getFieldByName('api_password')->value, $network_connection->affiliate_id);
            if (is_soap_fault($response)) {
                dd('error');
            }
            return true;
        }
        catch (\SoapFault $exception)
        {
            dd($exception);
            return false;
        }
    }

    public function makeAPIRequest($action, $password, $affiliateId)
    {
        $client = new \SoapClient("http://ws.webgains.com/aws.php", [
            'trace' =>  1,
            "style" => SOAP_RPC,
            "use" => SOAP_ENCODED,
            'exceptions' => 1]);

        return $client->$action('publishertoolkit', $password, $affiliateId);
    }

    /**
     * @return int
     */
    protected function getNetworkId ()
    {
        return NetworkUtility::WEBGAINS;
    }

    /**
     * @return string
     */
    public function getHelpLink()
    {
        return 'http://support.fmtc.co/solution/articles/223376-network-setup-webgains';
    }

    /**
     * @return string
     */
    public function getAffiliateIdRegex ()
    {
        return '/^\d+$/';
    }



}