<?php

namespace App\Http\Controllers\CMS;


use App\Models\CMS\Influencer;
use App\Repositories\CMS\InfluencerRepository;
use App\Requests\GetInfluencers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class InfluencerController extends Controller
{

    /**
     * @var InfluencerRepository
     */
    private $influencer_repo;


    public function __construct(InfluencerRepository $influencer_repo)
    {
        $this->influencer_repo                  = $influencer_repo;
    }

    public function index (Request $request)
    {
        $params                             = new GetInfluencers($request->input());
        $params->validate();

        return $this->influencer_repo->where($params, true);
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

        $influencer                         = $this->influencer_repo->find($id);
        if (is_null($influencer))
            throw new NotFoundHttpException('Influencer not found');
        return $influencer;
    }

}
