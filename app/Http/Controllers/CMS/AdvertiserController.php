<?php

namespace App\Http\Controllers\CMS;


use App\Models\CMS\Advertiser;
use App\Models\Market\Campaign;
use App\Models\Market\ProductLine;
use App\Repositories\CMS\AdvertiserRepository;
use App\Repositories\Market\CampaignRepository;
use App\Repositories\Market\ProductLineRepository;
use App\Requests\CreateCampaign;
use App\Requests\CreateProductLine;
use App\Requests\GetAdvertisers;
use App\Requests\UpdateCampaign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdvertiserController extends Controller
{

    /**
     * @var AdvertiserRepository
     */
    private $advertiser_repo;

    /**
     * @var CampaignRepository
     */
    private $campaign_repo;


    public function __construct(AdvertiserRepository $advertiser_repo, CampaignRepository $campaign_repo)
    {
        $this->advertiser_repo              = $advertiser_repo;
        $this->campaign_repo                = $campaign_repo;
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
        return response($advertiser->campaigns);
    }

    public function createCampaign (Request $request)
    {
        $advertiser                         = $this->getFromRoute($request);
        $create_campaign                    = new CreateCampaign($request->input());
        $create_campaign->validate();

        $campaign                           = new Campaign();
        $campaign->advertiser_id            = $advertiser->id;
        $campaign->name                     = $create_campaign->getName();
        $campaign->description              = $create_campaign->getDescription();

        $this->campaign_repo->save($campaign);

        return response($campaign, 201);
    }

    public function updateCampaign (Request $request)
    {
        $advertiser                         = $this->getFromRoute($request);
        $campaign                           = $this->getCampaignFromRoute($request);

        if ($advertiser->id != $campaign->advertiser_id)
            throw new BadRequestHttpException('Cannot update campaigns for other Advertisers');

        $update_campaign                    = new UpdateCampaign($request->input());
        if (!is_null($update_campaign->getName()))
            $campaign->name             = $update_campaign->getName();
        if (!is_null($update_campaign->getDescription()))
            $campaign->description      = $update_campaign->getDescription();

        $this->campaign_repo->update($campaign);

        return response($campaign);
    }

    public function getOpportunities (Request $request)
    {
        $advertiser                         = $this->getFromRoute($request);
        return response($advertiser->opportunities);
    }

    public function getProductLines (Request $request)
    {
        $advertiser                         = $this->getFromRoute($request);
        return response($advertiser->product_lines);
    }

    public function createProductLine (Request $request, ProductLineRepository $product_line_repo)
    {
        $advertiser                         = $this->getFromRoute($request);
        $create_product_line                = new CreateProductLine($request->input());
        $create_product_line->validate();

        $product_line                       = new ProductLine($request->input());
        $product_line->advertiser_id        = $advertiser->id;
        $product_line_repo->save($product_line);
        return response($product_line, 201);
    }


    public function updateProductLine (Request $request, ProductLineRepository $product_line_repo)
    {
        $advertiser                         = $this->getFromRoute($request);

        $product_line_id                    = $request->route('product_line_id');
        if (is_null($product_line_id))
            throw new BadRequestHttpException('product_line_id is required');

        $product_line                       = $product_line_repo->find($product_line_id);
        if (is_null($product_line))
            throw new NotFoundHttpException('ProductLine not found');

        if ($advertiser->id != $product_line->advertiser_id)
            throw new BadRequestHttpException('Cannot update product_lines for other Advertisers');

        $product_line->fill($request->input());
        $product_line_repo->update($product_line);
        return response($product_line);
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

    /**
     * @param Request $request
     * @return Campaign
     */
    private function getCampaignFromRoute (Request $request)
    {
        $campaign_id                        = $request->route('campaign_id');
        if (is_null($campaign_id))
            throw new BadRequestHttpException('campaign_id is required');

        $campaign                           = $this->campaign_repo->find($campaign_id);
        if (is_null($campaign))
            throw new NotFoundHttpException('Campaign not found');
        return $campaign;
    }

}
