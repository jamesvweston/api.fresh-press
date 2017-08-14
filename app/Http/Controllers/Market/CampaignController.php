<?php

namespace App\Http\Controllers\Market;

use App\Models\Market\Campaign;
use App\Repositories\Market\CampaignRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CampaignController extends Controller
{
    /**
     * @var CampaignRepository
     */
    private $campaign_repo;


    public function __construct(CampaignRepository $campaign_repo)
    {
        $this->campaign_repo                = $campaign_repo;
    }

    public function index (Request $request)
    {
        return $this->campaign_repo->where([], true);
    }

    public function show (Request $request)
    {
        $campaign                               = $this->getFromRoute($request);
        return response($campaign);
    }

    /**
     * @param   Request $request
     * @return  Campaign|null
     */
    private function getFromRoute (Request $request)
    {
        $id                                 = $request->route('id');

        $campaign                               = $this->campaign_repo->find($id);
        if (is_null($campaign))
            throw new NotFoundHttpException('Campaign not found');
        return $campaign;
    }

}
