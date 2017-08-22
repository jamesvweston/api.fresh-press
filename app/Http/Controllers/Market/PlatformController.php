<?php

namespace App\Http\Controllers\Market;


use App\Models\Market\Platform;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PlatformController extends Controller
{

    public function index (Request $request)
    {
        return Platform::search($request->input(), true, true);
    }

    public function show (Request $request)
    {
        $platform                           = $this->getFromRoute($request);
        return response($platform);
    }

    /**
     * @param   Request $request
     * @return  Platform
     */
    private function getFromRoute (Request $request)
    {
        $id                                 = $request->route('id');

        $platform                           = Platform::find($id);
        if (is_null($platform))
            throw new NotFoundHttpException('Platform not found');
        return $platform;
    }

}
