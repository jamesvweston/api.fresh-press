<?php

namespace App\Http\Controllers\Outlets;


use App\Models\Outlets\Outlet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OutletController extends Controller
{

    public function index (Request $request)
    {
        return Outlet::search($request->input(), true, true);
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

        $outlet                            = Outlet::find($id);
        if (is_null($outlet))
            throw new NotFoundHttpException('Outlet not found');
        return $outlet;
    }

}
