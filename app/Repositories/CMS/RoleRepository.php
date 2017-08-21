<?php

namespace App\Repositories\CMS;


use App\Models\CMS\Role;
use App\Repositories\RepositoryContract;
use App\Requests\GetRoles;
use Illuminate\Pagination\LengthAwarePaginator;

class RoleRepository  implements RepositoryContract
{


    /**
     * @param   array $params
     * @param   bool $paginate_results
     * @return  Role[]|LengthAwarePaginator
     */
    public function where ($params = [], $paginate_results = false)
    {
        $params                     = $params instanceof GetRoles ? $params : new GetRoles($params);
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
        return Role::query()->with($this->with());
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
     * @return  Role|null
     */
    public function find($id)
    {
        return $this->where(['ids' => $id])->first();
    }

    /**
     * @return Role
     */
    public function getAdmin ()
    {
        return $this->find(1);
    }

}