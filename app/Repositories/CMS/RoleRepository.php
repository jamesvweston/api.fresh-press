<?php

namespace App\Repositories\CMS;


use App\Models\CMS\Role;
use App\Repositories\Doctrine\BaseRepository;
use App\Requests\GetRoles;
use Illuminate\Pagination\LengthAwarePaginator;
use LaravelDoctrine\ORM\Pagination\PaginatesFromParams;

class RoleRepository extends BaseRepository
{

    use PaginatesFromParams;


    /**
     * @param   array $params
     * @param   bool $paginate_results
     * @return  Role[]|LengthAwarePaginator
     */
    public function where ($params = [], $paginate_results = false)
    {
        $params                     = $params instanceof GetRoles ? $params : new GetRoles($params);
        $qb                         = $this->createQueryBuilder('role');

        if (!is_null($params->getIds()))
            $qb->andWhere($qb->expr()->in('role.id', $params->getIds()));

        $qb->orderBy($params->getOrderBy(), $params->getDirection());

        if ($paginate_results)
            return $this->paginate($qb->getQuery(), $params->getPerPage(), $params->getPage());
        else
            return $qb->getQuery()->getResult();
    }


    /**
     * @param   int $id
     * @return  Role|null
     */
    public function find($id)
    {
        return parent::find($id);
    }

    /**
     * @return Role
     */
    public function getAdmin ()
    {
        return $this->find(1);
    }

}