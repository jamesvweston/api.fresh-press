<?php

namespace App\Http\Controllers\Market;

use App\Models\Market\SphereCategory;
use App\Repositories\Market\SphereCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SphereCategoryController extends Controller
{

    /**
     * @var SphereCategoryRepository
     */
    private $sphere_category_repo;


    public function __construct(SphereCategoryRepository $sphere_category_repo)
    {
        $this->sphere_category_repo             = $sphere_category_repo;
    }

    public function index (Request $request)
    {
        return $this->sphere_category_repo->findAll();
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

        $sphere_category                           = $this->sphere_category_repo->find($id);
        if (is_null($sphere_category))
            throw new NotFoundHttpException('SphereCategory not found');
        return $sphere_category;
    }

}
