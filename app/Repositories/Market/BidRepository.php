<?php

namespace App\Repositories\Market;


use App\Models\Market\Bid;
use App\Repositories\Doctrine\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use LaravelDoctrine\ORM\Pagination\PaginatesFromParams;

class BidRepository extends BaseRepository
{

    use PaginatesFromParams;


    /**
     * @param   array $params
     * @param   bool $paginate_results
     * @return  Bid[]|LengthAwarePaginator
     */
    public function where ($params = [], $paginate_results = false)
    {
        $qb                         = $this->createQueryBuilder('bid');

        if ($paginate_results)
            return $this->paginate($qb->getQuery(), 20);
        else
            return $qb->getQuery()->getResult();
    }

    /**
     * @param   int $id
     * @return  Bid|null
     */
    public function find($id)
    {
        return parent::find($id);
    }

}