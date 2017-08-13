<?php

namespace App\Http\Controllers\CMS;


use App\Http\Controllers\Controller;
use App\Models\CMS\Role;
use App\Repositories\CMS\RoleRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RoleController extends Controller
{

    /**
     * @var RoleRepository
     */
    private $role_repo;


    public function __construct(RoleRepository $role_repo)
    {
        $this->role_repo                    = $role_repo;
    }

    public function index (Request $request)
    {
        return $this->role_repo->findAll();
    }

    public function show (Request $request)
    {
        $role                               = $this->getFromRoute($request);
        return response($role);
    }

    /**
     * @param   Request $request
     * @return  Role
     */
    private function getFromRoute (Request $request)
    {
        $id                                 = $request->route('id');

        $role                               = $this->role_repo->find($id);
        if (is_null($role))
            throw new NotFoundHttpException('Role not found');
        return $role;
    }


}
