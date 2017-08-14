<?php

namespace App\Repositories\CMS;


use App\Models\CMS\User;
use App\Repositories\Doctrine\BaseRepository;
use App\Requests\GetUsers;
use Illuminate\Pagination\LengthAwarePaginator;
use LaravelDoctrine\ORM\Pagination\PaginatesFromParams;

class UserRepository extends BaseRepository
{

    use PaginatesFromParams;


    /**
     * @param   array $params
     * @param   bool $paginate_results
     * @return  User[]|LengthAwarePaginator
     */
    public function where ($params = [], $paginate_results = false)
    {
        $params                     = $params instanceof GetUsers ? $params : new GetUsers($params);
        $qb                         = $this->createQueryBuilder('user');

        if (!is_null($params->getIds()))
            $qb->andWhere($qb->expr()->in('user.id', $params->getIds()));

        $qb->orderBy($params->getOrderBy(), $params->getDirection());

        if ($paginate_results)
            return $this->paginate($qb->getQuery(), $params->getPerPage(), $params->getPage());
        else
            return $qb->getQuery()->getResult();
    }

    /**
     * @param   int $id
     * @return  User|null
     */
    public function find($id)
    {
        return parent::find($id);
    }

    /**
     * @param   string                  $email
     * @return  User|null
     */
    public function findByEmail ($email)
    {
        return $this->findOneBy(['email' => $email]);
    }

}