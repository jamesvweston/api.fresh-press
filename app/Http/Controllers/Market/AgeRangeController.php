<?php

namespace App\Http\Controllers\Market;


use App\Http\Controllers\Controller;
use App\Models\Market\AgeRange;
use App\Repositories\Market\AgeRangeRepository;
use App\Requests\GetAgeRanges;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AgeRangeController extends Controller
{

    /**
     * @var AgeRangeRepository
     */
    private $age_range_repo;


    public function __construct(AgeRangeRepository $age_range_repo)
    {
        $this->age_range_repo                   = $age_range_repo;
    }


    public function index (Request $request)
    {
        $params                                 = new GetAgeRanges($request->input());
        $params->validate();

        return $this->age_range_repo->where($params, true);
    }

    public function show (Request $request)
    {
        $age_range                               = $this->getFromRoute($request);
        return response($age_range);
    }

    /**
     * @param   Request $request
     * @return  AgeRange|null
     */
    private function getFromRoute (Request $request)
    {
        $id                                 = $request->route('id');

        $age_range                               = $this->age_range_repo->find($id);
        if (is_null($age_range))
            throw new NotFoundHttpException('AgeRange not found');
        return $age_range;
    }

}
