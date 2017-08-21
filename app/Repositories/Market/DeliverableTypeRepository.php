<?php

namespace App\Repositories\Market;


use App\Models\Market\DeliverableType;
use App\Repositories\RepositoryContract;
use App\Requests\GetDeliverableTypes;

class DeliverableTypeRepository implements RepositoryContract
{


    /**
     * @param   GetDeliverableTypes|array   $params
     * @param   bool $paginate_results
     * @return  \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Collection|static[]
     */
    public function where ($params = [], $paginate_results = false)
    {
        $params                  = ($params instanceof GetDeliverableTypes) ? $params : new GetDeliverableTypes($params);
        $qb                     = $this->getQuery();

        if (!is_null($params->getIds()))
            $qb->whereIn('id', explode(',', $params->getIds()));

        if (!is_null($params->getLabels()))
            $qb->whereIn('label', explode(',', $params->getLabels()));


        $qb->orderBy($params->getOrderBy(), $params->getDirection());

        if ($paginate_results)
            return $qb->paginate($params->getPerPage());
        else
            return $qb->get();

    }

    /**
     * @param   int $id
     * @return  DeliverableType|null
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
        return DeliverableType::query()->with($this->with());
    }

    /**
     * @return array
     */
    public function with ()
    {
        return [];
    }

}