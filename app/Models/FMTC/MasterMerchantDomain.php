<?php

namespace App\Models\FMTC;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property    int                             $id
 * @property    int                             $merchant_id
 * @property    string                          $domain
 * @property    string                          $homepage_url
 */
class MasterMerchantDomain extends Model
{

    protected $connection = 'fmtc';

    protected $table = 'tblMerchantsMasterDomains';

    protected $primaryKey = 'nDomainID';


    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('column_mapping', function (Builder $builder)
        {
            $builder->select(
                [
                    'nDomainID AS id',
                    'nMasterID AS merchant_id',
                    'cDomain AS domain',
                    'cHomepageURL AS homepage_url',
                ]
            );
        });
    }

}