<?php

namespace App\Http\Controllers\CMS;


use App\Models\CMS\User;
use App\Repositories\CMS\UserRepository;
use App\Requests\GetUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserController extends Controller
{

    /**
     * @var UserRepository
     */
    private $user_repo;


    public function __construct(UserRepository $user_repo)
    {
        $this->user_repo                    = $user_repo;
    }

    public function index (Request $request)
    {
        $params                             = new GetUsers($request->input());
        $params->validate();

        return $this->user_repo->where($params, true);
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

        $user                               = $this->user_repo->find($id);
        if (is_null($user))
            throw new NotFoundHttpException('User not found');
        return $user;
    }

}
