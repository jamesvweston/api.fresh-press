<?php

namespace App\Http\Controllers\Market;

use App\Models\Market\Sphere;
use App\Models\Market\SphereCategory;
use App\Repositories\Market\SphereCategoryRepository;
use App\Repositories\Market\SphereRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SphereController extends Controller
{

    /**
     * @var SphereRepository
     */
    private $sphere_repo;

    /**
     * @var SphereCategoryRepository
     */
    private $sphere_category_repo;

    public function __construct(SphereRepository $sphere_repo, SphereCategoryRepository $sphere_category_repo)
    {
        $this->sphere_repo                  = $sphere_repo;
        $this->sphere_category_repo         = $sphere_category_repo;
    }

    public function index (Request $request)
    {
        return $this->sphere_repo->findAll();
    }

    public function show (Request $request)
    {
        $sphere                             = $this->getFromRoute($request);
        return response($sphere);
    }

    public function getCategories (Request $request)
    {
        $sphere                             = $this->getFromRoute($request);
        return response($sphere->getCategories());
    }

    public function addCategory (Request $request)
    {
        $sphere                             = $this->getFromRoute($request);
        $sphere_category                    = $this->getSphereCategoryFromRoute($request);

        if ($sphere->hasCategory($sphere_category))
            throw new BadRequestHttpException('The sphere already has the sphere_category');

        $sphere->addCategory($sphere_category);
        $this->sphere_repo->saveAndCommit($sphere);

        return response($sphere->getCategories(), 201);
    }

    public function deleteCategory (Request $request, SphereCategoryRepository $sphere_category_repo)
    {
        $sphere                             = $this->getFromRoute($request);
        $sphere_category                    = $this->getSphereCategoryFromRoute($request);

        if (!$sphere->hasCategory($sphere_category))
            throw new BadRequestHttpException('The sphere does not have the provided sphere_category');

        $sphere->removeCategory($sphere_category);
        $this->sphere_repo->saveAndCommit($sphere);

        return response('', 204);
    }

    public function getOutletConnections (Request $request)
    {
        $sphere                             = $this->getFromRoute($request);
        return response($sphere->getOutletConnections());
    }

    /**
     * @param   Request $request
     * @return  Sphere
     */
    private function getFromRoute (Request $request)
    {
        $id                                 = $request->route('id');

        $sphere                             = $this->sphere_repo->find($id);
        if (is_null($sphere))
            throw new NotFoundHttpException('Sphere not found');
        return $sphere;
    }

    /**
     * @param   Request $request
     * @return  SphereCategory
     */
    private function getSphereCategoryFromRoute (Request $request)
    {
        $id                                 = $request->route('sphere_category_id');

        $sphere_category                    = $this->sphere_category_repo->find($id);
        if (is_null($sphere_category))
            throw new NotFoundHttpException('SphereCategory not found');
        return $sphere_category;
    }


}
