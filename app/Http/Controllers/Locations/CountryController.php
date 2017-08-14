<?php

namespace App\Http\Controllers\Locations;

use App\Http\Controllers\Controller;
use App\Models\Locations\Country;
use App\Repositories\Locations\CountryRepository;
use App\Requests\GetCountries;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CountryController extends Controller
{

    /**
     * @var CountryRepository
     */
    private $country_repo;


    public function __construct(CountryRepository $country_repo)
    {
        $this->country_repo                     = $country_repo;
    }


    public function index (Request $request)
    {
        $params                             = new GetCountries($request->input());
        $params->validate();

        return $this->country_repo->where($params, true);
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

        $country                               = $this->country_repo->find($id);
        if (is_null($country))
            throw new NotFoundHttpException('Country not found');
        return $country;
    }

}
