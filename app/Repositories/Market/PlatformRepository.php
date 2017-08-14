<?php

namespace App\Repositories\Market;


use App\Models\Market\Platform;
use App\Repositories\Doctrine\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use LaravelDoctrine\ORM\Pagination\PaginatesFromParams;

class PlatformRepository extends BaseRepository
{

    use PaginatesFromParams;


    /**
     * @param   array $params
     * @param   bool $paginate_results
     * @return  Platform[]|LengthAwarePaginator
     */
    public function where ($params = [], $paginate_results = false)
    {
        $qb                         = $this->createQueryBuilder('platform');

        if ($paginate_results)
            return $this->paginate($qb->getQuery(), 20);
        else
            return $qb->getQuery()->getResult();
    }

    /**
     * @param   int $id
     * @return  Platform|null
     */
    public function find($id)
    {
        return parent::find($id);
    }

}