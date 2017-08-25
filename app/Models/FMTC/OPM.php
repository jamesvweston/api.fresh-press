<?php

namespace App\Models\FMTC;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property    int                             $nOPMID
 * @property    string                          $cName
 * @property    string                          $cLogo
 * @property    string                          $cWebsite
 * @property    string                          $cDescription
 * @property    string                          $cEmail
 * @property    string                          $cPhone
 * @property    string                          $cFacebook
 * @property    string                          $cTwitter
 * @property    string                          $cLinkedIn
 * @property    string                          $cInstagram
 * @property    string                          $cPinterest
 * @property    string                          $cGooglePlus
 */
class OPM extends Model
{

    protected $connection = 'fmtc';

    protected $table = 'tblOPMs';

    protected $primaryKey = 'nOPMID';


    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('tblOPMs_column_mapping', function (Builder $builder)
        {
            $builder->select(
                [
                    'nOPMID',
                    'cName',
                    'cLogo',
                    'cWebsite',
                    'cDescription',
                    'cEmail',
                    'cPhone',
                    'cFacebook',
                    'cTwitter',
                    'cLinkedIn',
                    'cInstagram',
                    'cPinterest',
                    'cGooglePlus',
                ]
            );
        });

        static::addGlobalScope('only_active', function (Builder $builder)
        {
            $builder->where('bActive', 1);
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function master_merchants ()
    {
        return $this->hasMany(MasterMerchant::class, 'nOPMID', 'nOPMID');
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $object['id']                   = $this->nOPMID;
        $object['name']                 = $this->cName;
        $object['logo']                 = 'https://account.fmtc.co/assets/images/opm_logos/' . $this->cLogo;
        $object['website']              = $this->cWebsite;
        $object['description']          = $this->cDescription;
        $object['email']                = $this->cEmail;
        $object['phone']                = $this->cPhone;
        $object['facebook']             = $this->cFacebook;
        $object['twitter']              = $this->cTwitter;
        $object['linkedin']             = $this->cLinkedIn;
        $object['instagram']            = $this->cInstagram;
        $object['pinterest']            = $this->cPinterest;
        $object['google_plus']          = $this->cGooglePlus;

        return $object;
    }

}