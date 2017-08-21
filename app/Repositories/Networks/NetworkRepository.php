<?php

namespace App\Repositories\Networks;


use App\Models\Networks\Network;
use App\Repositories\RepositoryContract;
use App\Requests\GetNetworks;

class NetworkRepository implements RepositoryContract
{

    /**
     * @param   GetNetworks|array   $params
     * @param   bool $paginate_results
     * @return  \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Collection|static[]
     */
    public function where ($params = [], $paginate_results = false)
    {
        $params                  = ($params instanceof GetNetworks) ? $params : new GetNetworks($params);
        $qb                     = $this->getQuery();

        if (!is_null($params->getIds()))
            $qb->whereIn('id', explode(',', $params->getIds()));

        if (!is_null($params->getLabels()))
            $qb->whereIn('label', explode(',', $params->getLabels()));

        if (!is_null($params->getShorthands()))
            $qb->whereIn('shorthand', explode(',', $params->getShorthands()));

        $qb->orderBy($params->getOrderBy(), $params->getDirection());

        if ($paginate_results)
            return $qb->paginate($params->getPerPage());
        else
            return $qb->get();
    }

    /**
     * @param   int $id
     * @return  Network|null
     */
    public function find($id)
    {
        return $this->where(['ids' => $id])->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getQuery ()
    {
        return Network::query()->with($this->with());
    }

    /**
     * @return array
     */
    public function with ()
    {
        return [];
    }

}