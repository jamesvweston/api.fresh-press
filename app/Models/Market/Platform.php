<?php

namespace App\Models\Market;


use Illuminate\Database\Eloquent\Model;
use jamesvweston\Utilities\ArrayUtil AS AU;


/**
 * @property    int                             $id
 * @property    string                          $name
 */
class Platform extends Model
{

    /**
     * @return array
     */
    public function toArray ()
    {
        $object['id']                   = $this->id;
        $object['name']                 = $this->name;

        return $object;
    }

    /**
     * @param array $params
     * @param bool $paginate_results
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function search ($params = [], $paginate_results = false)
    {
        $qb                             = self::query();

        if (!is_null(AU::get($params['ids'])))
            $qb->whereIn('id', explode(',', AU::get($params['ids'])));

        if (!is_null(AU::get($params['names'])))
            $qb->whereIn('name', explode(',', AU::get($params['names'])));

        $qb->orderBy(AU::get($params['order_by'], 'id'), AU::get($params['direction'], 'asc'));

        if ($paginate_results)
            return $qb->paginate(AU::get($params['per_page'], 20));
        else
            return $qb->get();
    }

    /**
     * @param   string $name
     * @return  Platform|null
     */
    public static function findByName($name)
    {
        return self::search(['names' => $name])->first();
    }

}