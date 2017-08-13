<?php

namespace App\Http\Controllers\Market;

use App\Repositories\Market\SphereRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SphereController extends Controller
{

    /**
     * @var SphereRepository
     */
    private $sphere_repo;


    public function __construct(SphereRepository $sphere_repo)
    {
        $this->sphere_repo                  = $sphere_repo;
    }

    public function index (Request $request)
    {
        return $this->sphere_repo->findAll();
    }

    public function show (Request $request)
    {
        $sphere                           = $this->getFromRoute($request);
        return response($sphere);
    }

    /**
     * @param   Request $request
     * @return  Sphere
     */
    private function getFromRoute (Request $request)
    {
        $id                                 = $request->route('id');

        $sphere                           = $this->sphere_repo->find($id);
        if (is_null($sphere))
            throw new NotFoundHttpException('Sphere not found');
        return $sphere;
    }

}
