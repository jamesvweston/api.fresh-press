<?php

namespace App\Http\Controllers\Locations;

use App\Http\Controllers\Controller;
use App\Models\Locations\Country;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CountryController extends Controller
{

    public function index (Request $request)
    {
        return Country::search($request->input(), true, true);
    }

    public function show (Request $request)
    {
        $country                               = $this->getFromRoute($request);
        return response($country);
    }

    /**
     * @param   Request $request
     * @return  Country|null
     */
    private function getFromRoute (Request $request)
    {
        $id                                 = $request->route('id');

        $country                            = Country::find($id);
        if (is_null($country))
            throw new NotFoundHttpException('Country not found');
        return $country;
    }

}
