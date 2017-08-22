<?php

namespace App\Http\Controllers\CMS;


use App\Models\CMS\Advertiser;
use App\Models\Market\Campaign;
use App\Models\Market\ProductLine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdvertiserController extends Controller
{


    public function index (Request $request)
    {
        return Advertiser::search($request->input(), true, true);
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

        $campaign                           = new Campaign($request->all());
        $campaign->advertiser_id            = $advertiser->id;
        $campaign->getValidator()->validate();
        $campaign->save();

        return response($campaign, 201);
    }

    public function updateCampaign (Request $request)
    {
        $advertiser                         = $this->getFromRoute($request);
        $campaign                           = $this->getCampaignFromRoute($request);

        if ($advertiser->id != $campaign->advertiser_id)
            throw new BadRequestHttpException('Cannot update campaigns for other Advertisers');

        $campaign->fill($request->all());
        $campaign->getValidator()->validate();

        $campaign->update();

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

    public function createProductLine (Request $request)
    {
        $advertiser                         = $this->getFromRoute($request);

        $product_line                       = new ProductLine($request->input());
        $product_line->advertiser_id        = $advertiser->id;
        $product_line->getValidator()->validate();

        $product_line->save();
        return response($product_line, 201);
    }


    public function updateProductLine (Request $request)
    {
        $advertiser                         = $this->getFromRoute($request);

        $product_line_id                    = $request->route('product_line_id');
        if (is_null($product_line_id))
            throw new BadRequestHttpException('product_line_id is required');

        $product_line                       = ProductLine::find($product_line_id);
        if (is_null($product_line))
            throw new NotFoundHttpException('ProductLine not found');

        if ($advertiser->id != $product_line->advertiser_id)
            throw new BadRequestHttpException('Cannot update product_lines for other Advertisers');

        $product_line->fill($request->input());
        $product_line->getValidator()->validate();
        $product_line->update();
        return response($product_line);
    }

    /**
     * @param   Request $request
     * @return  Advertiser|null
     */
    private function getFromRoute (Request $request)
    {
        $id                                 = $request->route('id');

        $advertiser                         = Advertiser::find($id);
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

        $campaign                           = Campaign::find($campaign_id);
        if (is_null($campaign))
            throw new NotFoundHttpException('Campaign not found');
        return $campaign;
    }

}
