<?php

namespace App\Repositories\Market;


use App\Models\Market\PortfolioType;
use App\Repositories\Doctrine\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use LaravelDoctrine\ORM\Pagination\PaginatesFromParams;

class PortfolioTypeRepository extends BaseRepository
{

    use PaginatesFromParams;


    /**
     * @param   array $params
     * @param   bool $paginate_results
     * @return  PortfolioType[]|LengthAwarePaginator
     */
    public function where ($params = [], $paginate_results = false)
    {
        $qb                         = $this->createQueryBuilder('portfolio_type');

        if ($paginate_results)
            return $this->paginate($qb->getQuery(), 20);
        else
            return $qb->getQuery()->getResult();
    }

    /**
     * @param   int $id
     * @return  PortfolioType|null
     */
    public function find($id)
    {
        return parent::find($id);
    }

    /**
     * @param   string  $name
     * @return  PortfolioType|null
     */
    public function getOneByName ($name)
    {
        return $this->findOneBy(['name' => $name]);
    }

}