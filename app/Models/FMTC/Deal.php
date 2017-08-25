<?php

namespace App\Models\FMTC;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property    int                             $couponid
 * @property    int                             $merchantid
 * @property    string                          $label
 * @property    string                          $restrictions
 * @property    string                          $coupon
 * @property    string                          $nocode
 * @property    string                          $link
 * @property    string                          $directlink
 * @property    \Carbon\Carbon                  $begin
 * @property    \Carbon\Carbon|null             $expire
 * @property    \Carbon\Carbon                  $addedstamp
 * @property    \Carbon\Carbon                  $lastupdated
 *
 * @property    Merchant                        $merchant
 */
class Deal extends Model
{

    protected $connection = 'fmtc';

    protected $table = 'tblCouponsActive';

    protected $primaryKey = 'couponid';

    protected $with = ['merchant'];


    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('tblCouponsActive_column_mapping', function (Builder $builder)
        {
            $builder->select(
                [
                    'couponid',
                    'merchantid',
                    'label',
                    'restrictions',
                    'coupon',
                    'nocode',
                    'link',
                    'directlink',
                    'coupon',
                    'begin',
                    'expire',
                    'addedstamp',
                    'lastupdated',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function merchant ()
    {
        return $this->belongsTo(Merchant::class, 'merchantid', 'merchantid');
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $object['id']                   = $this->couponid;
        $object['label']                = $this->label;
        $object['restrictions']         = $this->restrictions;
        $object['no_code']              = $this->nocode;
        $object['link']                 = $this->link;
        $object['direct_link']          = $this->directlink;
        $object['coupon']               = $this->coupon;
        $object['starts_at']            = $this->begin;
        $object['expires_at']           = $this->expire;
        $object['created_at']           = $this->addedstamp;
        $object['updated_at']           = $this->lastupdated;
        $object['merchant']             = $this->merchant->toArray();

        return $object;
    }

}