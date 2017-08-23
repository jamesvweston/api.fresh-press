<?php

namespace App\Http\Controllers\CMS;


use App\Models\CMS\Influencer;
use App\Models\Networks\NetworkConnection;
use App\Utilities\NetworkConnectionFactory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class InfluencerController extends Controller
{


    public function index (Request $request)
    {
        return Influencer::search($request->input(), true, true);
    }

    public function show (Request $request)
    {
        $influencer                         = $this->getFromRoute($request);
        return response($influencer);
    }

    public function getBillingAddress (Request $request)
    {
        $influencer                         = $this->getFromRoute($request);
        return response($influencer->billing_address);
    }

    public function getFavoriteMerchants (Request $request)
    {
        $influencer                         = $this->getFromRoute($request);
        return response($influencer->favorite_merchants);
    }

    public function getNetworkConnections (Request $request)
    {
        $influencer                         = $this->getFromRoute($request);
        return response($influencer->network_connections);
    }

    public function getNetworkConnectionFields (Request $request)
    {
        $influencer                         = $this->getFromRoute($request);
        $network_connection                 = $this->getNetworkConnectionFromRoute($request);

        return response($network_connection->fields);
    }

    public function testNetworkConnection (Request $request)
    {
        $influencer                         = $this->getFromRoute($request);
        $network_connection                 = $this->getNetworkConnectionFromRoute($request);
        $network_connection_service         = NetworkConnectionFactory::get($network_connection->network->id);
        $network_connection_service->testConnection($network_connection);

        return response($network_connection);
    }

    public function getSpheres (Request $request)
    {
        $influencer                         = $this->getFromRoute($request);
        return response($influencer->spheres);
    }

    /**
     * @param   Request $request
     * @return  Influencer|null
     */
    private function getFromRoute (Request $request)
    {
        $id                                 = $request->route('id');

        $influencer                         = Influencer::find($id);
        if (is_null($influencer))
            throw new NotFoundHttpException('Influencer not found');
        return $influencer;
    }

    /**
     * @param   Request $request
     * @return  NetworkConnection|null
     */
    private function getNetworkConnectionFromRoute (Request $request)
    {
        $network_connection_id              = $request->route('network_connection_id');

        $network_connection                 = NetworkConnection::find($network_connection_id);
        if (is_null($network_connection))
            throw new NotFoundHttpException('NetworkConnection not found');
        return $network_connection;
    }

}
