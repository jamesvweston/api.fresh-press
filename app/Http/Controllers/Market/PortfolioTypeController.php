<?php

namespace App\Http\Controllers\Market;

use App\Models\Market\PortfolioType;
use App\Repositories\Market\PortfolioTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PortfolioTypeController extends Controller
{

    /**
     * @var PortfolioTypeRepository
     */
    private $portfolio_type_repo;


    public function __construct(PortfolioTypeRepository $portfolio_type_repo)
    {
        $this->portfolio_type_repo              = $portfolio_type_repo;
    }

    public function index (Request $request)
    {
        return $this->portfolio_type_repo->findAll();
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

        $portfolio_type                           = $this->portfolio_type_repo->find($id);
        if (is_null($portfolio_type))
            throw new NotFoundHttpException('PortfolioType not found');
        return $portfolio_type;
    }

}
