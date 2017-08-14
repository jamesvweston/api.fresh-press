<?php

namespace App\Http\Controllers\CMS;


use App\Models\CMS\Advertiser;
use App\Repositories\CMS\AdvertiserRepository;
use App\Requests\GetAdvertisers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdvertiserController extends Controller
{

    /**
     * @var AdvertiserRepository
     */
    private $advertiser_repo;


    public function __construct(AdvertiserRepository $advertiser_repo)
    {
        $this->advertiser_repo              = $advertiser_repo;
    }

    public function index (Request $request)
    {
        $params                             = new GetAdvertisers($request->input());
        $params->validate();
        return $this->advertiser_repo->where($params, true);
    }

    public function show (Request $request)
    {
        $advertiser                         = $this->getFromRoute($request);
        return response($advertiser);
    }

    public function getCampaigns (Request $request)
    {
        $advertiser                         = $this->getFromRoute($request);
        return response($advertiser->getCampaigns());
    }

    public function getOpportunities (Request $request)
    {
        $advertiser                         = $this->getFromRoute($request);
        return response($advertiser->getOpportunities());
    }

    public function getProductLines (Request $request)
    {
        $advertiser                         = $this->getFromRoute($request);
        return response($advertiser->getProductLines());
    }

    /**
     * @param   Request $request
     * @return  Advertiser|null
     */
    private function getFromRoute (Request $request)
    {
        $id                                 = $request->route('id');

        $advertiser                         = $this->advertiser_repo->find($id);
        if (is_null($advertiser))
            throw new NotFoundHttpException('Advertiser not found');
        return $advertiser;
    }

}
