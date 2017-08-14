<?php

namespace App\Repositories\Locations;


use App\Models\Locations\Country;
use App\Repositories\Doctrine\BaseRepository;
use App\Requests\GetCountries;
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
        $params                     = $params instanceof GetCountries ? $params : new GetCountries($params);
        $qb                         = $this->createQueryBuilder('country');

        if (!is_null($params->getIds()))
            $qb->andWhere($qb->expr()->in('country.id', $params->getIds()));

        $qb->orderBy($params->getOrderBy(), $params->getDirection());

        if ($paginate_results)
            return $this->paginate($qb->getQuery(), $params->getPerPage(), $params->getPage());
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