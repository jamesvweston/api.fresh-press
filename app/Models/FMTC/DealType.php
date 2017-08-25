<?php

namespace App\Models\FMTC;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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

        static::addGlobalScope('column_mapping', function (Builder $builder)
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
     * @return array
     */
    public function toArray()
    {
        $object['id']                   = $this->typeid;
        $object['name']                 = $this->name;

        return $object;
    }

}