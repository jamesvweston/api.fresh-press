<?php

namespace App\Models\FMTC;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use jamesvweston\Utilities\ArrayUtil AS AU;
use Validator;

/**
 * @property    int                             $networkid
 * @property    string                          $name
 */
class Network extends Model
{

    protected $connection = 'fmtc';

    protected $table = 'tblNetworks';

    protected $primaryKey = 'networkid';


    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('tblNetworks_column_mapping', function (Builder $builder)
        {
            $builder->select(
                [
                    'networkid',
                    'name'
                ]
            );
        });

        static::addGlobalScope('tblNetworks_only_active', function (Builder $builder)
        {
            $builder->where('bActive', 1);
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function merchants ()
    {
        return $this->hasMany(Merchant::class, 'networkid', 'networkid');
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
            $qb->whereIn('networkid', explode(',', AU::get($params['ids'])));

        $qb->orderBy(AU::get($params['order_by'], 'networkid'), AU::get($params['direction'], 'asc'));

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
        $object['id']                   = $this->networkid;
        $object['name']                 = $this->name;

        return $object;
    }

}