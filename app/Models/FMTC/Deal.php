<?php

namespace App\Models\FMTC;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property    int                             $id
 * @property    int                             $merchant_id
 * @property    string                          $label
 * @property    string                          $restrictions
 * @property    string                          $coupon
 * @property    string                          $no_code
 * @property    string                          $link
 * @property    string                          $direct_link
 * @property    string                          $restrictions
 * @property    string                          $link
 * @property    string                          $coupon
 * @property    \Carbon\Carbon                  $starts_at
 * @property    \Carbon\Carbon|null             $expires_at
 * @property    \Carbon\Carbon                  $created_at
 * @property    \Carbon\Carbon                  $updated_at
 */
class Deal extends Model
{

    protected $connection = 'fmtc';

    protected $table = 'tblCouponsActive';

    protected $primaryKey = 'couponid';

    protected $dates = ['starts_at, expires_at', 'created_at', 'updated_at'];


    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('column_mapping', function (Builder $builder)
        {
            $builder->select(
                [
                    'couponid AS id',
                    'merchantid AS merchant_id',
                    'label',
                    'restrictions',
                    'coupon',
                    'nocode AS no_code',
                    'link',
                    'directlink AS direct_link',
                    'restrictions',
                    'link',
                    'coupon',
                    \DB::raw('from_unixtime(begin) AS starts_at'),
                    \DB::raw('from_unixtime(expire) AS expires_at'),
                    \DB::raw('from_unixtime(addedstamp) AS created_at'),
                    \DB::raw('from_unixtime(lastupdated) AS updated_at'),
                ]
            );
        });

        static::addGlobalScope('only_active', function (Builder $builder)
        {
            $builder
                ->where('exclusiveid', '0')
                ->where('score', '<=', '3')
                ->where('expire', '>', time())
                ->where('nonaffiliate', '0')
                ->where('deleted', '0');
        });

    }

}