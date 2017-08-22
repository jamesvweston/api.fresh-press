<?php

namespace App\Models\Market;


use Illuminate\Database\Eloquent\Model;
use jamesvweston\Utilities\ArrayUtil AS AU;


/**
 * @property    int                             $id
 * @property    int                             $min
 * @property    int|null                        $max
 */
class AgeRange extends Model
{

    protected $table = 'age_ranges';


    /**
     * @return array
     */
    public function toArray ()
    {
        $object['id']                   = $this->id;
        $object['min']                  = $this->min;
        $object['max']                  = $this->max;

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

        $qb->orderBy(AU::get($params['order_by'], 'id'), AU::get($params['direction'], 'asc'));

        if ($paginate_results)
            return $qb->paginate(AU::get($params['per_page'], 20));
        else
            return $qb->get();
    }

}