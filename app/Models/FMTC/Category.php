<?php

namespace App\Models\FMTC;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property    int                             $id
 * @property    string                          $name
 * @property    int                             $parent_id
 * @property    bool                            $restricted
 */
class Category extends Model
{

    protected $connection = 'fmtc';

    protected $table = 'tblCategoriesV2';

    protected $primaryKey = 'nCategoryID';

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('column_mapping', function (Builder $builder)
        {
            $builder->select(
                [
                    'nCategoryID AS id',
                    'cName AS name',
                    'nParentID AS parent_id',
                    'bRestricted AS restricted'
                ]
            );
        });

        static::addGlobalScope('only_active', function (Builder $builder)
        {
            $builder->where('bActive', 1);
        });
    }


}