<?php

namespace App\Repositories\CMS;


use App\Models\CMS\Influencer;
use App\Repositories\RepositoryContract;
use App\Requests\GetInfluencers;
use Illuminate\Pagination\LengthAwarePaginator;

class InfluencerRepository implements RepositoryContract
{

    /**
     * @param   array $params
     * @param   bool $paginate_results
     * @return  Influencer[]|LengthAwarePaginator
     */
    public function where ($params = [], $paginate_results = false)
    {
        $params                     = $params instanceof GetInfluencers ? $params : new GetInfluencers($params);
        $qb                         = $this->getQuery();

        if (!is_null($params->getIds()))
            $qb->whereIn('id', explode(',', $params->getIds()));

        if (!is_null($params->getCreatedFrom()))
            $qb->where('created_at', '>=', new \Carbon\Carbon($params->getCreatedFrom()));

        if (!is_null($params->getCreatedTo()))
            $qb->where('created_at', '<=', new \Carbon\Carbon($params->getCreatedTo()));

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
        return Influencer::query()->with($this->with());
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
     * @return  Influencer|null
     */
    public function find($id)
    {
        return $this->where(['ids' => $id])->first();
    }

}