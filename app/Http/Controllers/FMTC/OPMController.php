<?php

namespace App\Http\Controllers\FMTC;

use App\Models\FMTC\OPM;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OPMController extends Controller
{

    public function index (Request $request)
    {
        return OPM::search($request->input(), true, true);
    }

    public function show (Request $request)
    {
        $opm                                = $this->getFromRoute($request);
        return response($opm);
    }


    /**
     * @param   Request $request
     * @return  OPM|null
     */
    private function getFromRoute (Request $request)
    {
        $id                                 = $request->route('id');

        $opm                                = OPM::find($id);
        if (is_null($opm))
            throw new NotFoundHttpException('OPM not found');
        return $opm;
    }

}
