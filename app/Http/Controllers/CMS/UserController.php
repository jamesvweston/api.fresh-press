<?php

namespace App\Http\Controllers\CMS;


use App\Models\CMS\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserController extends Controller
{

    public function index (Request $request)
    {
        return User::search($request->input(), true, true);
    }

    public function me (Request $request)
    {
        return Auth::user();
    }

    public function show (Request $request)
    {
        $user                               = $this->getFromRoute($request);
        return response($user);
    }

    public function getRoles (Request $request)
    {
        $user                               = $this->getFromRoute($request);
        return response($user->roles);
    }


    /**
     * @param   Request $request
     * @return  User|null
     */
    private function getFromRoute (Request $request)
    {
        $id                                 = $request->route('id');

        $user                               = User::find($id);
        if (is_null($user))
            throw new NotFoundHttpException('User not found');
        return $user;
    }

}
