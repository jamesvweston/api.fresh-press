<?php

namespace App\Http\Controllers\Networks;


use App\Models\Networks\Network;
use App\Repositories\Networks\NetworkRepository;
use App\Requests\GetNetworks;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class NetworkController extends Controller
{

    /**
     * @var NetworkRepository
     */
    private $network_repo;


    public function __construct(NetworkRepository $network_repo)
    {
        $this->network_repo                 = $network_repo;
    }

    public function index (Request $request)
    {
        $params                             = new GetNetworks($request->input());
        $params->validate();

        return $this->network_repo->where($params, true);
    }

    public function show (Request $request)
    {
        $network                            = $this->getFromRoute($request);
        return response($network);
    }

    public function getFields (Request $request)
    {
        $network                            = $this->getFromRoute($request);
        return response($network->fields);
    }

    /**
     * @param   Request $request
     * @return  Network|null
     */
    private function getFromRoute (Request $request)
    {
        $id                                 = $request->route('id');

        $network                            = $this->network_repo->find($id);
        if (is_null($network))
            throw new NotFoundHttpException('Network not found');
        return $network;
    }

}
