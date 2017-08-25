<?php

namespace App\Models\FMTC;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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
     * @return array
     */
    public function toArray()
    {
        $object['id']                   = $this->networkid;
        $object['name']                 = $this->name;

        return $object;
    }

}