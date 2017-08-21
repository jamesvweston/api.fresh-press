<?php

namespace App\Models\Networks;


use App\Models\CMS\Influencer;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @SWG\Definition()
 *
 * @property    int                             $id
 * @property    string|null                     $affiliate_id
 * @property    int|null                        $publisher_id
 * @property    bool                            $is_sync
 * @property    Network                         $network
 * @property    Influencer                      $influencer
 * @property    string|null                     $sync_failed_message
 * @property    \Carbon\Carbon|null             $sync_failed_at
 * @property    \Carbon\Carbon                  $created_at
 * @property    \Carbon\Carbon                  $updated_at
 */
class NetworkConnection extends Model
{

    use HasTimestamps;

    protected $with = ['network'];


    protected $fields;

    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->affiliate_id             = AU::get($data['affiliate_id']);
        $this->publisher_id             = AU::get($data['publisher_id']);
        $this->is_sync                  = AU::get($data['is_sync'], false);
        $this->network                  = AU::get($data['network']);
        $this->influencer               = AU::get($data['influencer']);
        $this->sync_failed_at           = AU::get($data['sync_failed_at']);
        $this->sync_failed_message      = AU::get($data['sync_failed_message']);
        $this->fields                   = AU::get($data['fields']);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $object['id']                   = $this->id;
        $object['affiliate_id']         = $this->affiliate_id;
        $object['publisher_id']         = $this->publisher_id;
        $object['is_sync']              = $this->is_sync;
        $object['network']              = $this->network->toArray();

        return $object;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function network ()
    {
        return $this->belongsTo(Network::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function influencer ()
    {
        return $this->belongsTo(Influencer::class);
    }

}