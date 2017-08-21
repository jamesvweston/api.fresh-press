<?php

namespace App\Models\CMS;


use App\Models\Locations\Address;
use App\Models\Market\Sphere;
use App\Models\Networks\FavoriteMerchant;
use App\Models\Networks\NetworkConnection;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @SWG\Definition()
 *
 * @property    int                             $id
 * @property    User                            $user
 * @property    Address|null                    $billing_address
 * @property    NetworkConnection[]             $network_connections
 * @property    Sphere[]                        $spheres
 * @property    FavoriteMerchant[]              $favorite_merchants
 * @property    \Carbon\Carbon                  $created_at
 * @property    \Carbon\Carbon                  $updated_at
 * @property    \Carbon\Carbon|null             $deleted_at
 */
class Influencer extends Model
{

    use HasTimestamps, SoftDeletes;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->user                     = AU::get($data['user']);
        $this->billing_address          = AU::get($data['billing_address']);
        $this->favorite_merchants       = AU::get($data['favorite_merchants']);
        $this->network_connections      = AU::get($data['network_connections']);
        $this->spheres                  = AU::get($data['spheres']);
    }

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function favorite_merchants ()
    {
        return $this->hasMany(FavoriteMerchant::class);
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

}