<?php

namespace App\Models\FMTC;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property    int                             $id
 * @property    string                          $name
 * @property    int                             $program_id
 * @property    int                             $master_merchant_id
 * @property    string                          $irs_slug
 * @property    int                             $ls_oid
 * @property    string                          $affiliate_url
 * @property    string                          $redirect_url
 * @property    bool                            $redirect_supported
 */
class Merchant extends Model
{

    protected $connection = 'fmtc';

    protected $table = 'tblMerchants';

    protected $primaryKey = 'merchantid';


    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('column_mapping', function (Builder $builder)
        {
            $builder->select(
                [
                    'merchantid AS id', 'name',
                    'programid AS program_id',
                    'nMasterID AS master_merchant_id',
                    'cIRSlug AS irs_slug',
                    'nLSOID AS ls_oid',
                    'affiliateurl AS affiliate_url',
                    'cRedirectURL AS redirect_url',
                    'bRedirectSupported AS redirect_supported',
                    ]
            );
        });

        static::addGlobalScope('only_active', function (Builder $builder)
        {
            $builder
                ->where('display', 1);
        });
    }

}