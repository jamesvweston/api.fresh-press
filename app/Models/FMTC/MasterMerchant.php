<?php

namespace App\Models\FMTC;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use jamesvweston\Utilities\ArrayUtil AS AU;
use Validator;

/**
 * @property    int                             $nMasterID
 * @property    string                          $cName
 * @property    string                          $cPrimaryCountry
 * @property    string                          $cHomepageURL
 * @property    int                             $nSkimlinksID
 * @property    string                          $nOPMID
 *
 *
 * @property    Merchant                        $merchant
 */
class MasterMerchant extends Model
{

    protected $connection = 'fmtc';

    protected $table = 'tblMerchantsMaster';

    protected $primaryKey = 'nMasterID';

    protected $with = ['merchants'];


    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('tblMerchantsMaster_column_mapping', function (Builder $builder)
        {
            $builder
                ->select([
                    'nMasterID',
                    'cName',
                    'cPrimaryCountry',
                    'cHomepageURL',
                    'nSkimlinksID',
                    'nOPMID']);
            //  ->leftJoin('tblMerchants', 'm.nMasterID', '=', 'tblMerchantsMaster.nMasterID')
            //  ->groupBy('tblMerchantsMaster.nMasterID')
            //  ->withoutGlobalScope('tblMerchants_only_active');
            //  ->where('M.display', '1')
            //  ->where('M.deleted', '0')
            //  ->where('M.exclusiveid', 0)
            //  ->where('M.bPrivateMerchantHub', 0)
        });
    }

    public function networks ()
    {
        return $this->belongsToMany(Network::class, 'tblMerchants', 'nMasterID', 'networkid')
            ->withoutGlobalScope('tblNetworks_column_mapping')
            ->select(['tblNetworks.networkid', 'tblNetworks.name']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function influencers ()
    {
        $connection                     = config('database.connections.mysql.database');
        return $this->belongsToMany(\App\Models\CMS\Influencer::class,
            $connection . '.favorite_merchants', 'fmtc_master_merchant_id', 'influencer_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function domains ()
    {
        return $this->hasMany(MasterMerchantDomain::class, 'nMasterID', 'nMasterID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function merchants ()
    {
        return $this->hasMany(Merchant::class, 'nMasterID', 'nMasterID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function program_details ()
    {
        return $this->hasMany(ProgramDetail::class, 'nMasterID', 'nMasterID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function opm ()
    {
        return $this->belongsTo(OPM::class, 'nOPMID', 'nOPMID');
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
            $qb->whereIn('nMasterID', explode(',', AU::get($params['ids'])));

        $qb->orderBy(AU::get($params['order_by'], 'nMasterID'), AU::get($params['direction'], 'asc'));

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
        $object['id']                   = $this->nMasterID;
        $object['name']                 = $this->cName;
        $object['primary_country']      = $this->cPrimaryCountry;
        $object['homepage_url']         = $this->cHomepageURL;
        $object['skimlinks_id']         = $this->nSkimlinksID;
        $object['opm_id']               = $this->nOPMID;
        $object['merchant']             = is_null($this->merchants->first()) ? null : $this->merchants->first()->toArray();

        return $object;
    }

}