<?php

namespace App\Models\CMS;


use App\Models\Market\Campaign;
use App\Models\Market\Opportunity;
use App\Models\Market\ProductLine;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use jamesvweston\Utilities\ArrayUtil AS AU;


/**
 * @property    int                             $id
 * @property    string                          $name
 * @property    User                            $user
 * @property    Campaign[]                      $campaigns
 * @property    Opportunity[]                   $opportunities
 * @property    ProductLine[]                   $product_lines
 * @property    \Carbon\Carbon                  $created_at
 * @property    \Carbon\Carbon                  $updated_at
 * @property    \Carbon\Carbon|null             $deleted_at
 */
class Advertiser extends Model
{

    use HasTimestamps, SoftDeletes;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->name                     = AU::get($data['name']);
        $this->user                     = AU::get($data['user']);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $object['id']                   = $this->id;
        $object['name']                 = $this->name;

        return $object;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function campaigns ()
    {
        return $this->hasMany(Campaign::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product_lines ()
    {
        return $this->hasMany(ProductLine::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function opportunities()
    {
        return $this->hasMany(Opportunity::class);
    }

}