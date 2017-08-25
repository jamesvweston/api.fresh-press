<?php

namespace App\Models\FMTC;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use jamesvweston\Utilities\ArrayUtil AS AU;
use Validator;

/**
 * @property    int                             $typeid
 * @property    string                          $name
 */
class DealType extends Model
{

    protected $connection = 'fmtc';

    protected $table = 'tblTypes';

    protected $primaryKey = 'typeid';


    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('tblTypes_column_mapping', function (Builder $builder)
        {
            $builder->select(
                [
                    'typeid',
                    'name'
                ]
            );
        });

        static::addGlobalScope('only_active', function (Builder $builder)
        {
            $builder
                ->where('exclusiveid', 0)
                ->where('bV2', 1)
                ->whereNotIn('typeid', [27, 34]);
        });
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
                'order_by'                  => 'nullable|string|in:id',
                'direction'                 => 'nullable|string|in:asc,desc',
            ])->validate();
        }

        $qb                             = self::query();

        if (!is_null(AU::get($params['ids'])))
            $qb->whereIn('typeid', explode(',', AU::get($params['ids'])));

        $qb->orderBy(AU::get($params['order_by'], 'typeid'), AU::get($params['direction'], 'asc'));

        if ($paginate_results)
            return $qb->paginate(AU::get($params['per_page'], 20));
        else
            return $qb->get();
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $object['id']                   = $this->typeid;
        $object['name']                 = $this->name;

        return $object;
    }

}