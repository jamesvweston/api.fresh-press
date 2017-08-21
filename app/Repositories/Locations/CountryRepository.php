<?php

namespace App\Repositories\Locations;


use App\Models\Locations\Country;
use App\Repositories\RepositoryContract;
use App\Requests\GetCountries;

class CountryRepository implements RepositoryContract
{


    /**
     * @param   GetCountries|[] $params
     * @param   bool $paginate_results
     * @return  \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Collection|static[]
     */
    public function where ($params = [], $paginate_results = false)
    {
        $params                  = ($params instanceof GetCountries) ? $params : new GetCountries($params);
        $qb                     = $this->getQuery();

        if (!is_null($params->getIds()))
            $qb->whereIn('id', explode(',', $params->getIds()));

        if (!is_null($params->getCodes()))
            $qb->whereIn('code', explode(',', $params->getCodes()));


        $qb->orderBy($params->getOrderBy(), $params->getDirection());

        if ($paginate_results)
            return $qb->paginate($params->getPerPage());
        else
            return $qb->get();
    }

    /**
     * @param   int $id
     * @return  Country|null
     */
    public function find($id)
    {
        return $this->where(['ids' => $id])->first();
    }

    /**
     * @param   string  $code
     * @return  Country|null
     */
    public function findByCode ($code)
    {
        return $this->where(['codes' => $code])->first();
    }

    /**
     * @return  Country
     */
    public function getUS ()
    {
        return $this->find(233);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getQuery ()
    {
        return Country::query()->with($this->with());
    }

    /**
     * @return array
     */
    public function with ()
    {
        return [];
    }

}