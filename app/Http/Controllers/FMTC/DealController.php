<?php

namespace App\Http\Controllers\FMTC;

use App\Models\FMTC\Deal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DealController extends Controller
{

    public function index (Request $request)
    {
        return Deal::search($request->input(), true, true);
    }

    public function show (Request $request)
    {
        $deal                               = $this->getFromRoute($request);
        return response($deal);
    }


    /**
     * @param   Request $request
     * @return  Deal|null
     */
    private function getFromRoute (Request $request)
    {
        $id                                 = $request->route('id');

        $deal                               = Deal::find($id);
        if (is_null($deal))
            throw new NotFoundHttpException('Deal not found');
        return $deal;
    }

}
