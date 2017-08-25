<?php

namespace App\Models\FMTC;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property    int                             $nDomainID
 * @property    int                             $nMasterID
 * @property    string                          $cDomain
 * @property    string                          $cHomepageURL
 */
class MasterMerchantDomain extends Model
{

    protected $connection = 'fmtc';

    protected $table = 'tblMerchantsMasterDomains';

    protected $primaryKey = 'nDomainID';


    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('tblMerchantsMasterDomains_column_mapping', function (Builder $builder)
        {
            $builder->select(
                [
                    'nDomainID',
                    'nMasterID',
                    'cDomain',
                    'cHomepageURL',
                ]
            );
        });
    }


    public function master_merchant ()
    {
        return $this->belongsTo(MasterMerchant::class);
    }


    /**
     * @return array
     */
    public function toArray()
    {
        $object['id']                   = $this->nDomainID;
        $object['domain']               = $this->cDomain;
        $object['homepage_url']         = $this->cHomepageURL;

        return $object;
    }

}