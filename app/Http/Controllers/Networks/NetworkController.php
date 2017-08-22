<?php

namespace App\Http\Controllers\Networks;


use App\Models\Networks\Network;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class NetworkController extends Controller
{

    public function index (Request $request)
    {
        return Network::search($request->input(), true, true);
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

        $network                            = Network::find($id);
        if (is_null($network))
            throw new NotFoundHttpException('Network not found');
        return $network;
    }

}
