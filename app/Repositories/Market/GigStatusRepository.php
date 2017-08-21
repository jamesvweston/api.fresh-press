<?php

namespace App\Repositories\Market;


use App\Models\Market\GigStatus;
use App\Repositories\RepositoryContract;
use App\Requests\GetGigStatuses;
use Illuminate\Pagination\LengthAwarePaginator;

class GigStatusRepository implements RepositoryContract
{


    /**
     * @param   GetGigStatuses|array $params
     * @param   bool $paginate_results
     * @return  GigStatus[]|LengthAwarePaginator
     */
    public function where ($params = [], $paginate_results = false)
    {
        $params                     = $params instanceof GetGigStatuses ? $params : new GetGigStatuses($params);
        $qb                         = $this->getQuery();

        if (!is_null($params->getIds()))
            $qb->whereIn('id', explode(',', $params->getIds()));

        if (!is_null($params->getNames()))
            $qb->whereIn('name', explode(',', $params->getNames()));

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
        return GigStatus::query()->with($this->with());
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
     * @return  GigStatus|null
     */
    public function find($id)
    {
        return $this->where(['ids' => $id])->first();
    }

}