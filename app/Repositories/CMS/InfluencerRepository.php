<?php

namespace App\Repositories\CMS;


use App\Models\CMS\Influencer;
use App\Repositories\Doctrine\BaseRepository;
use App\Requests\GetInfluencers;
use Illuminate\Pagination\LengthAwarePaginator;
use LaravelDoctrine\ORM\Pagination\PaginatesFromParams;

class InfluencerRepository extends BaseRepository
{

    use PaginatesFromParams;


    /**
     * @param   array $params
     * @param   bool $paginate_results
     * @return  Influencer[]|LengthAwarePaginator
     */
    public function where ($params = [], $paginate_results = false)
    {
        $params                     = $params instanceof GetInfluencers ? $params : new GetInfluencers($params);
        $qb                         = $this->createQueryBuilder('influencer');

        if (!is_null($params->getIds()))
            $qb->andWhere($qb->expr()->in('influencer.id', $params->getIds()));

        $qb->orderBy($params->getOrderBy(), $params->getDirection());

        if ($paginate_results)
            return $this->paginate($qb->getQuery(), $params->getPerPage(), $params->getPage());
        else
            return $qb->getQuery()->getResult();
    }

    /**
     * @param   int $id
     * @return  Influencer|null
     */
    public function find($id)
    {
        return parent::find($id);
    }

}