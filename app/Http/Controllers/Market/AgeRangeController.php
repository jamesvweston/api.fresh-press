<?php

namespace App\Http\Controllers\Market;


use App\Http\Controllers\Controller;
use App\Models\Market\AgeRange;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AgeRangeController extends Controller
{

    public function index (Request $request)
    {
        return AgeRange::search($request->input(), true, true);
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

        $age_range                          = AgeRange::find($id);
        if (is_null($age_range))
            throw new NotFoundHttpException('AgeRange not found');
        return $age_range;
    }

}
