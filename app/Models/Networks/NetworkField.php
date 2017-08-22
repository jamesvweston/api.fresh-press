<?php

namespace App\Models\Networks;


use Illuminate\Database\Eloquent\Model;
use jamesvweston\Utilities\ArrayUtil AS AU;
use Validator;

/**
 * @SWG\Definition()
 *
 * @property    int                             $id
 * @property    string                          $label
 * @property    string                          $field
 * @property    Network                         $network
 */
class NetworkField extends Model
{

    /**
     * @return array
     */
    public function toArray()
    {
        $object['id']                   = $this->id;
        $object['label']                = $this->label;
        $object['field']                = $this->field;

        return $object;
    }

    /**
     * @param   array   $params
     * @param   bool    $paginate_results
     * @param   bool    $validate
     * @return  \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function search ($params = [], $paginate_results = false, $validate = false)
    {
        if ($validate)
        {
            Validator::make($params, [
                'page'                      => 'nullable|integer|min:1',
                'per_page'                  => 'nullable|integer|min:10',
                'order_by'                  => 'nullable|string|in:id,label,shorthand',
                'direction'                 => 'nullable|string|in:asc,desc',
            ])->validate();
        }

        $qb                             = self::query();

        if (!is_null(AU::get($params['ids'])))
            $qb->whereIn('id', explode(',', AU::get($params['ids'])));

        if (!is_null(AU::get($params['network_ids'])))
            $qb->whereIn('network_id', explode(',', AU::get($params['network_ids'])));

        if (!is_null(AU::get($params['labels'])))
            $qb->whereIn('label', explode(',', AU::get($params['labels'])));

        if (!is_null(AU::get($params['fields'])))
            $qb->whereIn('field', explode(',', AU::get($params['fields'])));

        $qb->orderBy(AU::get($params['order_by'], 'id'), AU::get($params['direction'], 'asc'));

        if ($paginate_results)
            return $qb->paginate(AU::get($params['per_page'], 20));
        else
            return $qb->get();
    }

}