<?php

namespace App\Models\Locations;


use Illuminate\Database\Eloquent\Model;
use jamesvweston\Utilities\ArrayUtil AS AU;
use Validator;

/**
 * @property    int                             $id
 * @property    string                          $name
 * @property    string                          $code
 */
class Country extends Model
{

    protected $table = 'countries';


    /**
     * @return array
     */
    public function toArray ()
    {
        $object['id']                   = $this->id;
        $object['name']                 = $this->name;
        $object['code']                 = $this->code;

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
                'order_by'                  => 'nullable|string|in:id,name,code',
                'direction'                 => 'nullable|string|in:asc,desc',
            ])->validate();
        }

        $qb                             = self::query();

        if (!is_null(AU::get($params['ids'])))
            $qb->whereIn('id', explode(',', AU::get($params['ids'])));

        if (!is_null(AU::get($params['codes'])))
            $qb->whereIn('code', explode(',', AU::get($params['codes'])));

        $qb->orderBy(AU::get($params['order_by'], 'id'), AU::get($params['direction'], 'asc'));

        if ($paginate_results)
            return $qb->paginate(AU::get($params['per_page'], 20));
        else
            return $qb->get();
    }

    /**
     * @param   string  $code
     * @return  Country|null
     */
    public static function findByCode ($code)
    {
        return self::search(['codes' => $code])->first();
    }

    /**
     * @return  Country
     */
    public static function findUS ()
    {
        return self::find(233);
    }

}