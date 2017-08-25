<?php

namespace App\Models\FMTC;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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