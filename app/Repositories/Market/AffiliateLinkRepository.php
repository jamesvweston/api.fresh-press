<?php

namespace App\Repositories\Market;


use App\Models\Market\AffiliateLink;
use App\Repositories\Doctrine\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use LaravelDoctrine\ORM\Pagination\PaginatesFromParams;

class AffiliateLinkRepository extends BaseRepository
{

    use PaginatesFromParams;


    /**
     * @param   array $params
     * @param   bool $paginate_results
     * @return  AffiliateLink[]|LengthAwarePaginator
     */
    public function where ($params = [], $paginate_results = false)
    {
        $qb                         = $this->createQueryBuilder('affiliate_link');

        if ($paginate_results)
            return $this->paginate($qb->getQuery(), 20);
        else
            return $qb->getQuery()->getResult();
    }

    /**
     * @param   int $id
     * @return  AffiliateLink|null
     */
    public function find($id)
    {
        return parent::find($id);
    }

}