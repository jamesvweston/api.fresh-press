<?php

namespace App\Repositories\Locations;


use App\Models\Locations\Country;
use App\Repositories\Doctrine\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use LaravelDoctrine\ORM\Pagination\PaginatesFromParams;

class CountryRepository extends BaseRepository
{

    use PaginatesFromParams;


    /**
     * @param   array $params
     * @param   bool $paginate_results
     * @return  Country[]|LengthAwarePaginator
     */
    public function where ($params = [], $paginate_results = false)
    {
        $qb                         = $this->createQueryBuilder('country');

        if ($paginate_results)
            return $this->paginate($qb->getQuery(), 20);
        else
            return $qb->getQuery()->getResult();
    }

    /**
     * @param   int $id
     * @return  Country|null
     */
    public function find($id)
    {
        return parent::find($id);
    }

    /**
     * @param   string  $code
     * @return  Country|null
     */
    public function getOneByCode ($code)
    {
        return $this->findOneBy(['code' => $code]);
    }

    /**
     * @return  Country
     */
    public function getUS ()
    {
        return $this->find(233);
    }

}