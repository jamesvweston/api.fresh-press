<?php

namespace App\Models\Networks;


use Illuminate\Database\Eloquent\Model;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @property    int                             $id
 * @property    string                          $label
 * @property    string                          $shorthand
 * @property    string                          $logo
 * @property    int                             $fmtc_network_id
 * @property    string|null                     $sub_id_key
 * @property    NetworkField[]                  $fields
 */
class Network extends Model
{

    /**
     * @return array
     */
    public function toArray()
    {
        $object['id']                   = $this->id;
        $object['label']                = $this->label;
        $object['shorthand']            = $this->shorthand;

        return $object;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fields()
    {
        return $this->hasMany(NetworkField::class);
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

        if (!is_null(AU::get($params['labels'])))
            $qb->whereIn('label', explode(',', AU::get($params['labels'])));

        if (!is_null(AU::get($params['shorthands'])))
            $qb->whereIn('shorthand', explode(',', AU::get($params['shorthands'])));

        $qb->orderBy(AU::get($params['order_by'], 'id'), AU::get($params['direction'], 'asc'));

        if ($paginate_results)
            return $qb->paginate(AU::get($params['per_page'], 20));
        else
            return $qb->get();
    }

}