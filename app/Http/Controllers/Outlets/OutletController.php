<?php

namespace App\Http\Controllers\Outlets;


use App\Models\Outlets\Outlet;
use App\Repositories\Outlets\OutletRepository;
use App\Requests\GetOutlets;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OutletController extends Controller
{

    /**
     * @var OutletRepository
     */
    private $outlet_repo;


    public function __construct(OutletRepository $outlet_repo)
    {
        $this->outlet_repo                  = $outlet_repo;
    }


    public function index (Request $request)
    {
        $params                             = new GetOutlets($request->input());
        $params->validate();

        return $this->outlet_repo->where($params, true);
    }


    public function show (Request $request)
    {
        $outlet                             = $this->getFromRoute($request);
        return response($outlet);
    }

    /**
     * @param   Request $request
     * @return  Outlet|null
     */
    private function getFromRoute (Request $request)
    {
        $id                                 = $request->route('id');

        $outlet                            = $this->outlet_repo->find($id);
        if (is_null($outlet))
            throw new NotFoundHttpException('Outlet not found');
        return $outlet;
    }

}
