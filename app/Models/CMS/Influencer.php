<?php

namespace App\Models\CMS;


use App\Models\Locations\Address;
use App\Models\Market\Sphere;
use App\Models\Networks\NetworkConnection;
use App\Models\Traits\DBTransactions;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use jamesvweston\Utilities\ArrayUtil AS AU;
use Validator;

/**
 * @property    int                             $id
 * @property    User                            $user
 * @property    Address|null                    $billing_address
 * @property    NetworkConnection[]             $network_connections
 * @property    Sphere[]                        $spheres
 * @property    \Carbon\Carbon                  $created_at
 * @property    \Carbon\Carbon                  $updated_at
 * @property    \Carbon\Carbon|null             $deleted_at
 */
class Influencer extends Model
{

    protected $connection = 'mysql';    //  This is needed to facilitate cross database relations

    use HasTimestamps, SoftDeletes, DBTransactions;


    /**
     * @return array
     */
    public function toArray ()
    {
        $object['id']                   = $this->id;

        return $object;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function billing_address()
    {
        return $this->hasOne(Address::class, 'id', 'billing_address_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function favorite_merchants ()
    {
        $connection                     = config('database.connections.mysql.database');
        return $this->belongsToMany(\App\Models\FMTC\MasterMerchant::class, $connection . '.favorite_merchants', 'influencer_id', 'fmtc_master_merchant_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function network_connections ()
    {
        return $this->hasMany(NetworkConnection::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function spheres ()
    {
        return $this->hasMany(Sphere::class);
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
                'created_from'              => 'nullable|date_format:Y-m-d',
                'created_to'                => 'nullable|date_format:Y-m-d',
                'page'                      => 'nullable|integer|min:1',
                'per_page'                  => 'nullable|integer|min:10',
                'order_by'                  => 'nullable|string|in:id,created_at',
                'direction'                 => 'nullable|string|in:asc,desc',
            ])->validate();
        }

        $qb                             = self::query();

        if (!is_null(AU::get($params['ids'])))
            $qb->whereIn('id', explode(',', AU::get($params['ids'])));

        if (!is_null(AU::get($params['created_from'])))
            $qb->where('created_at', '>=', new \Carbon\Carbon($params['created_from']));

        if (!is_null(AU::get($params['created_to'])))
            $qb->where('created_at', '<=', new \Carbon\Carbon($params['created_to']));

        $qb->orderBy(AU::get($params['order_by'], 'id'), AU::get($params['direction'], 'asc'));

        if ($paginate_results)
            return $qb->paginate(AU::get($params['per_page'], 20));
        else
            return $qb->get();
    }
}