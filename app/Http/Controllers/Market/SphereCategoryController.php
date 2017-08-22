<?php

namespace App\Http\Controllers\Market;

use App\Models\Market\SphereCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SphereCategoryController extends Controller
{

    public function index (Request $request)
    {
        return SphereCategory::search($request->input(), true, true);
    }

    public function show (Request $request)
    {
        $sphere_category                           = $this->getFromRoute($request);
        return response($sphere_category);
    }

    /**
     * @param   Request $request
     * @return  SphereCategory
     */
    private function getFromRoute (Request $request)
    {
        $id                                 = $request->route('id');

        $sphere_category                    = SphereCategory::find($id);
        if (is_null($sphere_category))
            throw new NotFoundHttpException('SphereCategory not found');
        return $sphere_category;
    }

}
