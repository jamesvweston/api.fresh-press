<?php

namespace App\Http\Controllers\Market;


use App\Http\Controllers\Controller;
use App\Models\Market\GigStatus;
use App\Repositories\Market\GigStatusRepository;
use App\Requests\GetGigStatuses;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GigStatusController extends Controller
{

    /**
     * @var GigStatusRepository
     */
    private $gig_status_repo;


    public function __construct(GigStatusRepository $gig_status_repo)
    {
        $this->gig_status_repo            = $gig_status_repo;
    }


    public function index (Request $request)
    {
        $params                             = new GetGigStatuses($request->input());
        $params->validate();

        return $this->gig_status_repo->where($params, true);
    }

    public function show (Request $request)
    {
        $gig_status                       = $this->getFromRoute($request);
        return response($gig_status);
    }

    /**
     * @param   Request $request
     * @return  GigStatus|null
     */
    private function getFromRoute (Request $request)
    {
        $id                                 = $request->route('id');

        $gig_status                               = $this->gig_status_repo->find($id);
        if (is_null($gig_status))
            throw new NotFoundHttpException('GigStatus not found');
        return $gig_status;
    }

}
