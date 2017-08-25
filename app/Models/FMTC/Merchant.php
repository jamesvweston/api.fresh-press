<?php

namespace App\Models\FMTC;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property    int                             $merchantid
 * @property    int                             $nMasterID
 * @property    string                          $name
 * @property    int                             $programid
 * @property    string                          $cIRSlug
 * @property    int                             $nLSOID
 * @property    string                          $affiliateurl
 * @property    string                          $cRedirectURL
 * @property    bool                            $bRedirectSupported
 * @property    int                             $networkid
 * @property    string                          $cPrimaryCountry
 * @property    bool                            $apofpo
 * @property    bool                            $usa
 * @property    bool                            $uk
 * @property    bool                            $canada
 * @property    bool                            $bAustralia
 * @property    bool                            $bWorldWide
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
                    'merchantid',
                    'nMasterID',
                    'name',
                    'programid',
                    'cIRSlug',
                    'nLSOID',
                    'affiliateurl',
                    'cRedirectURL',
                    'bRedirectSupported',
                    'networkid',
                    'cPrimaryCountry',
                    'apofpo',
                    'usa',
                    'uk',
                    'canada',
                    'bAustralia',
                    'bWorldWide',
                    ]
            );
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function masterMerchant ()
    {
        return $this->belongsTo(MasterMerchant::class, 'nMasterID', 'nMasterID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function network ()
    {
        return $this->belongsTo(Network::class, 'networkid', 'networkid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deals ()
    {
        return $this->hasMany(Deal::class, 'merchantid', 'merchantid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function banners ()
    {
        return $this->hasMany(Banner::class, 'merchantid', 'merchantid');
    }


    /**
     * @return array
     */
    public function toArray()
    {
        $object['id']                   = $this->merchantid;
        $object['name']                 = $this->name;
        $object['program_id']           = $this->programid;
        $object['irs_slug']             = $this->cIRSlug;
        $object['ls_oid']               = $this->nLSOID;
        $object['affiliate_url']        = $this->affiliateurl;
        $object['redirect_url']         = $this->cRedirectURL;
        $object['redirect_supported']   = $this->bRedirectSupported;
        $object['primary_country']      = $this->cPrimaryCountry;

        $object['shipTos']              = [];

        if ($this->usa)
            $object['shipTos'][]        = 'US';
        if ($this->apofpo)
            $object['shipTos'][]        = 'APO/FPO';
        if ($this->uk)
            $object['shipTos'][]        = 'UK';
        if ($this->canada)
            $object['shipTos'][]        = 'Canada';
        if ($this->bAustralia)
            $object['shipTos'][]        = 'Australia';
        if ($this->bWorldWide)
            $object['shipTos'][]        = 'WorldWide';


        return $object;
    }

}