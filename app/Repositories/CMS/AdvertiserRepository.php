<?php

namespace App\Repositories\CMS;


use App\Models\CMS\Advertiser;
use App\Repositories\Doctrine\BaseRepository;
use App\Requests\GetAdvertisers;
use Illuminate\Pagination\LengthAwarePaginator;
use LaravelDoctrine\ORM\Pagination\PaginatesFromParams;

class AdvertiserRepository extends BaseRepository
{

    use PaginatesFromParams;


    /**
     * @param   GetAdvertisers|array $params
     * @param   bool $paginate_results
     * @return  Advertiser[]|LengthAwarePaginator
     */
    public function where ($params = [], $paginate_results = false)
    {
        $params                     = $params instanceof GetAdvertisers ? $params : new GetAdvertisers($params);
        $qb                         = $this->createQueryBuilder('advertiser');

        if (!is_null($params->getIds()))
            $qb->andWhere($qb->expr()->in('advertiser.id', $params->getIds()));

        $qb->orderBy($params->getOrderBy(), $params->getDirection());

        if ($paginate_results)
            return $this->paginate($qb->getQuery(), $params->getPerPage(), $params->getPage());
        else
            return $qb->getQuery()->getResult();
    }

    /**
     * @param   int $id
     * @return  Advertiser|null
     */
    public function find($id)
    {
        return parent::find($id);
    }

}