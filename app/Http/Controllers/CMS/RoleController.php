<?php

namespace App\Http\Controllers\CMS;


use App\Http\Controllers\Controller;
use App\Models\CMS\Role;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RoleController extends Controller
{

    public function index (Request $request)
    {
        return Role::search($request->input(), true, true);
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

        $role                               = Role::find($id);
        if (is_null($role))
            throw new NotFoundHttpException('Role not found');
        return $role;
    }


}
