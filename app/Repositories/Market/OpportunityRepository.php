<?php

namespace App\Repositories\Market;


use App\Models\Market\Opportunity;
use App\Repositories\Doctrine\BaseRepository;
use App\Requests\GetOpportunities;
use Doctrine\ORM\Query;
use Illuminate\Pagination\LengthAwarePaginator;
use LaravelDoctrine\ORM\Pagination\PaginatesFromParams;

class OpportunityRepository extends BaseRepository
{

    use PaginatesFromParams;


    /**
     * @param   array $params
     * @param   bool $paginate_results
     * @return  Opportunity[]|LengthAwarePaginator
     */
    public function where ($params = [], $paginate_results = false)
    {
        $params                     = $params instanceof GetOpportunities ? $params : new GetOpportunities($params);
        $qb                         = $this->createQueryBuilder('opportunity');

        if (!is_null($params->getIds()))
            $qb->andWhere($qb->expr()->in('opportunity.id', $params->getIds()));

        if (!is_null($params->getAdvertiserIds()))
        {
            $qb->join('opportunity.advertiser', 'advertiser', Query\Expr\Join::ON);
            $qb->andWhere($qb->expr()->in('advertiser.id', $params->getAdvertiserIds()));
        }

        if (!is_null($params->getCampaignIds()))
        {
            $qb->join('opportunity.campaign', 'campaign', Query\Expr\Join::ON);
            $qb->andWhere($qb->expr()->in('campaign.id', $params->getCampaignIds()));
        }

        if (!is_null($params->getDeliverableTypeIds()))
        {
            $qb->join('opportunity.deliverable_type', 'deliverable_type', Query\Expr\Join::ON);
            $qb->andWhere($qb->expr()->in('deliverable_type.id', $params->getDeliverableTypeIds()));
        }

        if (!is_null($params->getProductLineIds()))
        {
            $qb->join('opportunity.product_line', 'product_line', Query\Expr\Join::ON);
            $qb->andWhere($qb->expr()->in('product_line.id', $params->getProductLineIds()));
        }

        $qb->orderBy($params->getOrderBy(), $params->getDirection());

        if ($paginate_results)
            return $this->paginate($qb->getQuery(), $params->getPerPage(), $params->getPage());
        else
            return $qb->getQuery()->getResult();
    }

    /**
     * @param   int $id
     * @return  Opportunity|null
     */
    public function find($id)
    {
        return parent::find($id);
    }

}