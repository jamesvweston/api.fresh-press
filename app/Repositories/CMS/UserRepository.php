<?php

namespace App\Repositories\CMS;


use App\Models\CMS\User;
use App\Repositories\RepositoryContract;
use App\Requests\GetUsers;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository implements RepositoryContract
{


    /**
     * @param   array $params
     * @param   bool $paginate_results
     * @return  User[]|LengthAwarePaginator
     */
    public function where ($params = [], $paginate_results = false)
    {
        $params                  = ($params instanceof GetUsers) ? $params : new GetUsers($params);

        $qb                     = $this->getQuery();
        if (!is_null($params->getIds()))
            $qb->whereIn('id', explode(',', $params->getIds()));

        if (!is_null($params->getCreatedFrom()))
            $qb->where('created_at', '>=', new \Carbon\Carbon($params->getCreatedFrom()));

        if (!is_null($params->getCreatedTo()))
            $qb->where('created_at', '<=', new \Carbon\Carbon($params->getCreatedTo()));

        $qb->orderBy($params->getOrderBy(), $params->getDirection());

        if ($paginate_results)
            return $qb->paginate($params->getPerPage());
        else
            return $qb->get();
    }

    /**
     * @param   int $id
     * @return  User|null
     */
    public function find($id)
    {
        return $this->where(['ids' => $id])->first();
    }

    /**
     * @param   string                  $email
     * @return  User|null
     */
    public function findByEmail ($email)
    {
        return $this->findOneBy(['email' => $email]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getQuery ()
    {
        return User::query()->with($this->with());
    }

    /**
     * @return array
     */
    public function with ()
    {
        return [];
    }

}