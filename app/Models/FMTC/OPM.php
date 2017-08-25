<?php

namespace App\Models\FMTC;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use jamesvweston\Utilities\ArrayUtil AS AU;
use Validator;

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
            $qb->whereIn('nOPMID', explode(',', AU::get($params['ids'])));

        $qb->orderBy(AU::get($params['order_by'], 'nOPMID'), AU::get($params['direction'], 'asc'));

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