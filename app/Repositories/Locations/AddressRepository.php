<?php

namespace App\Repositories\Locations;


use App\Models\Locations\Address;
use App\Repositories\Doctrine\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use LaravelDoctrine\ORM\Pagination\PaginatesFromParams;

class AddressRepository extends BaseRepository
{

    use PaginatesFromParams;


    /**
     * @param   array $params
     * @param   bool $paginate_results
     * @return  Address[]|LengthAwarePaginator
     */
    public function where ($params = [], $paginate_results = false)
    {
        $qb                         = $this->createQueryBuilder('address');

        if ($paginate_results)
            return $this->paginate($qb->getQuery(), 20);
        else
            return $qb->getQuery()->getResult();
    }

    /**
     * @param   int $id
     * @return  Address|null
     */
    public function find($id)
    {
        return parent::find($id);
    }


}