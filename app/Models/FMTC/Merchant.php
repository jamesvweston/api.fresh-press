<?php

namespace App\Models\FMTC;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use jamesvweston\Utilities\ArrayUtil AS AU;
use Validator;

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
 * @property    string                          $logo
 * @property    string                          $homepage_url
 */
class Merchant extends Model
{

    protected $connection = 'fmtc';

    protected $table = 'tblMerchants';

    protected $primaryKey = 'merchantid';


    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('tblMerchants_column_mapping', function (Builder $builder)
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
                    '120x60 AS logo',
                    'homepageurl AS homepage_url',
                    ]
            );
        });

        static::addGlobalScope('tblMerchants_only_active', function (Builder $builder)
        {
            $builder
                ->where('display', '1')
                ->where('deleted', '0')
                ->where('exclusiveid', 0)
                ->where('bPrivateMerchantHub', 0);
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
     * @param   array   $params
     * @param   bool    $paginate_results
     * @param   bool    $validate
     * @return  \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function search ($params = [], $paginate_results = false, $validate = false)
    {
        if ($validate)
        {
            Validator::make($params, [
                'page'                      => 'nullable|integer|min:1',
                'per_page'                  => 'nullable|integer|min:10',
                'order_by'                  => 'nullable|string|in:id',
                'direction'                 => 'nullable|string|in:asc,desc',
            ])->validate();
        }

        $qb                             = self::query();

        if (!is_null(AU::get($params['ids'])))
            $qb->whereIn('merchantid', explode(',', AU::get($params['ids'])));

        $qb->orderBy(AU::get($params['order_by'], 'merchantid'), AU::get($params['direction'], 'asc'));

        if ($paginate_results)
            return $qb->paginate(AU::get($params['per_page'], 20));
        else
            return $qb->get();
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
        $object['logo']                 = trim($this->logo) == '' ? null : 'https://logos.fmtc.co/120x60/' . $this->logo;
        $object['homepage_url']          = $this->homepage_url;

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