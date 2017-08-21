<?php

namespace App\Repositories\Market;


use App\Models\Market\AgeRange;
use App\Repositories\RepositoryContract;
use App\Requests\GetAgeRanges;
use Illuminate\Pagination\LengthAwarePaginator;

class AgeRangeRepository implements RepositoryContract
{


    /**
     * @param   GetAgeRanges|[] $params
     * @param   bool $paginate_results
     * @return  AgeRange[]|LengthAwarePaginator
     */
    public function where ($params = [], $paginate_results = false)
    {
        $params                     = ($params instanceof GetAgeRanges) ? $params : new GetAgeRanges($params);
        $qb                         = $this->getQuery();

        if (!is_null($params->getIds()))
            $qb->whereIn('id', explode(',', $params->getIds()));

        $qb->orderBy($params->getOrderBy(), $params->getDirection());

        if ($paginate_results)
            return $qb->paginate($params->getPerPage());
        else
            return $qb->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getQuery ()
    {
        return AgeRange::query()->with($this->with());
    }

    /**
     * @return array
     */
    public function with ()
    {
        return [];
    }

    /**
     * @param   int $id
     * @return  AgeRange|null
     */
    public function find($id)
    {
        return $this->where(['ids' => $id])->first();
    }

}