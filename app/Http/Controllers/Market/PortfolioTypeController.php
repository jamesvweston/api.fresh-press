<?php

namespace App\Http\Controllers\Market;

use App\Models\Market\PortfolioType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PortfolioTypeController extends Controller
{

    public function index (Request $request)
    {
        return PortfolioType::search($request->input(), true, true);
    }

    public function show (Request $request)
    {
        $portfolio_type                           = $this->getFromRoute($request);
        return response($portfolio_type);
    }

    /**
     * @param   Request $request
     * @return  PortfolioType
     */
    private function getFromRoute (Request $request)
    {
        $id                                 = $request->route('id');

        $portfolio_type                     = PortfolioType::find($id);
        if (is_null($portfolio_type))
            throw new NotFoundHttpException('PortfolioType not found');
        return $portfolio_type;
    }

}
