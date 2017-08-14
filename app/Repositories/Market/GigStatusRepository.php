<?php

namespace App\Repositories\Market;


use App\Models\Market\GigStatus;
use App\Repositories\Doctrine\BaseRepository;
use App\Requests\GetGigStatuses;
use Illuminate\Pagination\LengthAwarePaginator;
use LaravelDoctrine\ORM\Pagination\PaginatesFromParams;

class GigStatusRepository extends BaseRepository
{

    use PaginatesFromParams;


    /**
     * @param   GetGigStatuses|array $params
     * @param   bool $paginate_results
     * @return  GigStatus[]|LengthAwarePaginator
     */
    public function where ($params = [], $paginate_results = false)
    {
        $params                     = $params instanceof GetGigStatuses ? $params : new GetGigStatuses($params);
        $qb                         = $this->createQueryBuilder('gig_status');

        if (!is_null($params->getIds()))
            $qb->andWhere($qb->expr()->in('gig_status.id', $params->getIds()));

        $qb->orderBy($params->getOrderBy(), $params->getDirection());

        if ($paginate_results)
            return $this->paginate($qb->getQuery(), $params->getPerPage(), $params->getPage());
        else
            return $qb->getQuery()->getResult();
    }

    /**
     * @param   int $id
     * @return  GigStatus|null
     */
    public function find($id)
    {
        return parent::find($id);
    }

}