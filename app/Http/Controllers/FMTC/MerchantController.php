<?php

namespace App\Http\Controllers\FMTC;

use App\Models\FMTC\Merchant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MerchantController extends Controller
{

    public function index (Request $request)
    {
        return Merchant::search($request->input(), true, true);
    }

    public function show (Request $request)
    {
        $merchant                           = $this->getFromRoute($request);
        return response($merchant);
    }

    public function getBanners (Request $request)
    {
        $merchant                           = $this->getFromRoute($request);
        return response($merchant->banners);
    }


    /**
     * @param   Request $request
     * @return  Merchant|null
     */
    private function getFromRoute (Request $request)
    {
        $id                                 = $request->route('id');

        $merchant                           = Merchant::find($id);
        if (is_null($merchant))
            throw new NotFoundHttpException('Merchant not found');
        return $merchant;
    }

}
