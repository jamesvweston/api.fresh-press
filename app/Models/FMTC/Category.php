<?php

namespace App\Models\FMTC;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property    int                             $nCategoryID
 * @property    string                          $cName
 * @property    int                             $nParentID
 * @property    bool                            $bRestricted
 * @property    int                             $nRecripicalID
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
                    'nCategoryID',
                    'cName',
                    'nParentID',
                    'bRestricted',
                    'nRecripicalID',
                ]
            );
        });

        static::addGlobalScope('only_active', function (Builder $builder)
        {
            $builder->where('bActive', 1);
        });
    }


    /**
     * @return array
     */
    public function toArray()
    {
        $object['id']                   = $this->nCategoryID;
        $object['name']                 = $this->cName;
        $object['parent_id']            = $this->nParentID;
        $object['restricted']           = $this->bRestricted;
        $object['recripical_id']        = $this->nRecripicalID;

        return $object;
    }

}