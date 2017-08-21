<?php

namespace App\Repositories\Market;


use App\Models\Market\Opportunity;
use App\Repositories\RepositoryContract;
use App\Requests\GetOpportunities;
use Illuminate\Pagination\LengthAwarePaginator;

class OpportunityRepository implements RepositoryContract
{

    /**
     * @param   array $params
     * @param   bool $paginate_results
     * @return  Opportunity[]|LengthAwarePaginator
     */
    public function where ($params = [], $paginate_results = false)
    {
        $params                     = $params instanceof GetOpportunities ? $params : new GetOpportunities($params);
        $qb                         = $this->getQuery();

        if (!is_null($params->getIds()))
            $qb->whereIn('id', explode(',', $params->getIds()));

        if (!is_null($params->getAdvertiserIds()))
            $qb->whereIn('advertiser_id', explode(',', $params->getAdvertiserIds()));

        if (!is_null($params->getCampaignIds()))
            $qb->whereIn('campaign_id', explode(',', $params->getCampaignIds()));

        if (!is_null($params->getDeliverableTypeIds()))
            $qb->whereIn('deliverable_type_id', explode(',', $params->getDeliverableTypeIds()));

        if (!is_null($params->getProductLineIds()))
            $qb->whereIn('product_line_id', explode(',', $params->getProductLineIds()));

        if (!is_null($params->getCreatedFrom()))
            $qb->where('created_at', '>=', new \Carbon\Carbon($params->getCreatedFrom()));

        if (!is_null($params->getCreatedTo()))
            $qb->where('created_at', '<=', new \Carbon\Carbon($params->getCreatedTo()));

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
        return Opportunity::query()->with($this->with());
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
     * @return  Opportunity|null
     */
    public function find($id)
    {
        return $this->where(['ids' => $id])->first();
    }

}