<?php

namespace App\Http\Controllers\FMTC;

use App\Models\FMTC\DealType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DealTypeController extends Controller
{

    public function index (Request $request)
    {
        return DealType::search($request->input(), true, true);
    }

    public function show (Request $request)
    {
        $deal_type                          = $this->getFromRoute($request);
        return response($deal_type);
    }


    /**
     * @param   Request $request
     * @return  DealType|null
     */
    private function getFromRoute (Request $request)
    {
        $id                                 = $request->route('id');

        $deal_type                          = DealType::find($id);
        if (is_null($deal_type))
            throw new NotFoundHttpException('DealType not found');
        return $deal_type;
    }

}
