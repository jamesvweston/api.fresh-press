<?php

namespace App\Http\Controllers\FMTC;

use App\Models\FMTC\MasterMerchant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MasterMerchantController extends Controller
{

    public function index (Request $request)
    {
        return MasterMerchant::search($request->input(), true, true);
    }

    public function show (Request $request)
    {
        $master_merchant                    = $this->getFromRoute($request);
        return response($master_merchant);
    }

    public function getOPM (Request $request)
    {
        $master_merchant                    = $this->getFromRoute($request);
        return response($master_merchant->opm);
    }

    public function getDomains (Request $request)
    {
        $master_merchant                    = $this->getFromRoute($request);
        return response($master_merchant->domains);
    }

    public function getProgramDetails (Request $request)
    {
        $master_merchant                    = $this->getFromRoute($request);
        return response($master_merchant->program_details);
    }

    /**
     * @param   Request $request
     * @return  MasterMerchant|null
     */
    private function getFromRoute (Request $request)
    {
        $id                                 = $request->route('id');

        $master_merchant                    = MasterMerchant::find($id);
        if (is_null($master_merchant))
            throw new NotFoundHttpException('MasterMerchant not found');
        return $master_merchant;
    }

}
