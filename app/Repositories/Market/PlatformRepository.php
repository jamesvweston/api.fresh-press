<?php

namespace App\Repositories\Market;


use App\Models\Market\Platform;
use App\Repositories\RepositoryContract;
use App\Requests\GetPlatforms;
use Illuminate\Pagination\LengthAwarePaginator;

class PlatformRepository implements RepositoryContract
{

    /**
     * @param   array $params
     * @param   bool $paginate_results
     * @return  Platform[]|LengthAwarePaginator
     */
    public function where ($params = [], $paginate_results = false)
    {
        $params                     = $params instanceof GetPlatforms ? $params : new GetPlatforms($params);
        $qb                         = $this->getQuery();

        if (!is_null($params->getIds()))
            $qb->whereIn('id', explode(',', $params->getIds()));

        if (!is_null($params->getNames()))
            $qb->whereIn('name', explode(',', $params->getNames()));

        $qb->orderBy($params->getOrderBy(), $params->getDirection());

        if (!$paginate_results)
            return $qb->get();
        else
            return $qb->paginate($params->getPerPage());
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getQuery ()
    {
        return Platform::query()->with($this->with());
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
     * @return  Platform|null
     */
    public function find($id)
    {
        return $this->where(['ids' => $id])->first();
    }

}