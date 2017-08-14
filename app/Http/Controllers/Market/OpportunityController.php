<?php

namespace App\Http\Controllers\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\Opportunity;
use App\Repositories\Market\OpportunityRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OpportunityController extends Controller
{

    /**
     * @var OpportunityRepository
     */
    private $opportunity_repo;


    public function __construct(OpportunityRepository $opportunity_repo)
    {
        $this->opportunity_repo                 = $opportunity_repo;
    }

    public function index (Request $request)
    {
        return $this->opportunity_repo->where([], true);
    }

    public function show (Request $request)
    {
        $opportunity                       = $this->getFromRoute($request);
        return response($opportunity);
    }

    public function getBids (Request $request)
    {
        $opportunity                       = $this->getFromRoute($request);
        return response($opportunity->getBids());
    }

    public function getCompensationModels (Request $request)
    {
        $opportunity                       = $this->getFromRoute($request);
        return response($opportunity->getCompensationModels());
    }

    public function getCreatives (Request $request)
    {
        $opportunity                       = $this->getFromRoute($request);
        return response($opportunity->getCreatives());
    }

    /**
     * @param   Request $request
     * @return  Opportunity
     */
    private function getFromRoute (Request $request)
    {
        $id                                 = $request->route('id');

        $opportunity                               = $this->opportunity_repo->find($id);
        if (is_null($opportunity))
            throw new NotFoundHttpException('Opportunity not found');
        return $opportunity;
    }

}
