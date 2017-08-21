<?php

namespace App\Repositories\Market;


use App\Models\Market\PortfolioType;
use App\Repositories\RepositoryContract;
use App\Requests\GetPortfolioTypes;
use Illuminate\Pagination\LengthAwarePaginator;

class PortfolioTypeRepository implements RepositoryContract
{

    /**
     * @param   array $params
     * @param   bool $paginate_results
     * @return  PortfolioType[]|LengthAwarePaginator
     */
    public function where ($params = [], $paginate_results = false)
    {
        $params                     = ($params instanceof GetPortfolioTypes) ? $params : new GetPortfolioTypes($params);
        $qb                         = $this->getQuery();

        if (!is_null($params->getIds()))
            $qb->whereIn('id', explode(',', $params->getIds()));

        if (!is_null($params->getNames()))
            $qb->whereIn('name', explode(',', $params->getNames()));

        $qb->orderBy($params->getOrderBy(), $params->getDirection());

        if ($paginate_results)
            return $qb->paginate($params->getPerPage());
        else
            return $qb->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getQuery ()
    {
        return PortfolioType::query()->with($this->with());
    }

    /**
     * @return array
     */
    public function with ()
    {
        return [];
    }

    /**
     * @param   int $id
     * @return  PortfolioType|null
     */
    public function find($id)
    {
        return $this->where(['ids' => $id])->first();
    }

    /**
     * @param   string $name
     * @return  PortfolioType|null
     */
    public function findByName($name)
    {
        return $this->where(['names' => $name])->first();
    }

}