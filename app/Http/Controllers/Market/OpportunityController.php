<?php

namespace App\Http\Controllers\Market;


use App\Http\Controllers\Controller;
use App\Models\Market\Opportunity;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OpportunityController extends Controller
{

    public function index (Request $request)
    {
        return Opportunity::search($request->input(), true);
    }

    public function show (Request $request)
    {
        $opportunity                       = $this->getFromRoute($request);
        return response($opportunity);
    }

    public function getBids (Request $request)
    {
        $opportunity                       = $this->getFromRoute($request);
        return response($opportunity->bids);
    }

    public function getCompensationModels (Request $request)
    {
        $opportunity                       = $this->getFromRoute($request);
        return response($opportunity->getCompensationModels());
    }

    public function getCreatives (Request $request)
    {
        $opportunity                       = $this->getFromRoute($request);
        return response($opportunity->creatives);
    }

    /**
     * @param   Request $request
     * @return  Opportunity
     */
    private function getFromRoute (Request $request)
    {
        $id                                 = $request->route('id');

        $opportunity                        = Opportunity::find($id);
        if (is_null($opportunity))
            throw new NotFoundHttpException('Opportunity not found');
        return $opportunity;
    }

}
