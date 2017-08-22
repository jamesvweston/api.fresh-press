<?php

namespace App\Repositories\Market;


use App\Models\Market\Campaign;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryContract;
use App\Requests\GetCampaigns;
use Illuminate\Pagination\LengthAwarePaginator;

class CampaignRepository extends BaseRepository implements RepositoryContract
{


    /**
     * @param   GetCampaigns|[] $params
     * @param   bool $paginate_results
     * @return  Campaign[]|LengthAwarePaginator
     */
    public function where ($params = [], $paginate_results = false)
    {
        $params                     = ($params instanceof GetCampaigns) ? $params : new GetCampaigns($params);
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
        return Campaign::query()->with($this->with());
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
     * @return  Campaign|null
     */
    public function find($id)
    {
        return $this->where(['ids' => $id])->first();
    }

}