<?php

namespace App\Models\FMTC;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property    int                             $id
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

        static::addGlobalScope('column_mapping', function (Builder $builder)
        {
            $builder->select(
                [
                    'networkid AS id',
                    'name'
                ]
            );
        });

        static::addGlobalScope('only_active', function (Builder $builder)
        {
            $builder->where('bActive', 1);
        });
    }

}