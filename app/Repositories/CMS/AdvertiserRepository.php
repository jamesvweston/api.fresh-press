<?php

namespace App\Repositories\CMS;


use App\Models\CMS\Advertiser;
use App\Repositories\RepositoryContract;
use App\Requests\GetAdvertisers;
use Illuminate\Pagination\LengthAwarePaginator;

class AdvertiserRepository implements RepositoryContract
{

    /**
     * @param   GetAdvertisers|array $params
     * @param   bool $paginate_results
     * @return  Advertiser[]|LengthAwarePaginator
     */
    public function where ($params = [], $paginate_results = false)
    {
        $params                     = $params instanceof GetAdvertisers ? $params : new GetAdvertisers($params);
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
        return Advertiser::query()->with($this->with());
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
     * @return  Advertiser|null
     */
    public function find($id)
    {
        return $this->where(['ids' => $id])->first();
    }

}