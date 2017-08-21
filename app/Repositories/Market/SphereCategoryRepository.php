<?php

namespace App\Repositories\Market;


use App\Models\Market\SphereCategory;
use App\Repositories\RepositoryContract;
use App\Requests\GetSphereCategories;
use Illuminate\Pagination\LengthAwarePaginator;

class SphereCategoryRepository implements RepositoryContract
{

    /**
     * @param   array $params
     * @param   bool $paginate_results
     * @return  SphereCategory[]|LengthAwarePaginator
     */
    public function where ($params = [], $paginate_results = false)
    {
        $params                  = ($params instanceof GetSphereCategories) ? $params : new GetSphereCategories($params);

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
        return SphereCategory::query()->with($this->with());
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
     * @return  SphereCategory|null
     */
    public function find($id)
    {
        return $this->where(['ids' => $id])->first();
    }

}