<?php

namespace App\Http\Controllers\CMS;


use App\Models\CMS\Influencer;
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

}
