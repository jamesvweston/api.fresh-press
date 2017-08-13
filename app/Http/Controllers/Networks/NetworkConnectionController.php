<?php

namespace App\Http\Controllers\Networks;

use App\Models\Networks\NetworkConnection;
use App\Repositories\Doctrine\Networks\NetworkConnectionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class NetworkConnectionController extends Controller
{

    /**
     * @var NetworkConnectionRepository
     */
    private $network_connection_repo;


    public function __construct(NetworkConnectionRepository $network_connection_repo)
    {
        $this->network_connection_repo          = $network_connection_repo;
    }

    public function index (Request $request)
    {
        return $this->network_connection_repo->findAll();
    }

    public function show (Request $request)
    {
        $network_connection                           = $this->getFromRoute($request);
        return response($network_connection);
    }

    /**
     * @param   Request $request
     * @return  NetworkConnection
     */
    private function getFromRoute (Request $request)
    {
        $id                                 = $request->route('id');

        $network_connection                           = $this->network_connection_repo->find($id);
        if (is_null($network_connection))
            throw new NotFoundHttpException('NetworkConnection not found');
        return $network_connection;
    }

}
