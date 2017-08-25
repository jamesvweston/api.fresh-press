<?php

namespace App\Models\FMTC;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use jamesvweston\Utilities\ArrayUtil AS AU;
use Validator;

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

        static::addGlobalScope('tblCouponsActive_only_active', function (Builder $builder)
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
            $qb->whereIn('couponid', explode(',', AU::get($params['ids'])));

        $qb->orderBy(AU::get($params['order_by'], 'couponid'), AU::get($params['direction'], 'asc'));

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
        $object['merchant']             = is_null($this->merchant) ? null : $this->merchant->toArray();

        return $object;
    }

}