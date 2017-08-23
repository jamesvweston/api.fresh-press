<?php

namespace App\Models\Networks;


use App\Models\CMS\Influencer;
use App\Models\Traits\DBTransactions;
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
 *
 * @property    NetworkConnectionField[]        $fields
 */
class NetworkConnection extends Model
{

    use HasTimestamps, DBTransactions;

    protected $with = ['network'];


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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fields ()
    {
        return $this->hasMany(NetworkConnectionField::class);
    }

    public function clearSyncFailures()
    {
        $this->sync_failed_at           = null;
        $this->sync_failed_message      = null;
    }

    /**
     * @param   string  $errorMessage
     */
    public function recordSyncFailure ($errorMessage)
    {
        $this->sync_failed_message      = $errorMessage;
        $this->sync_failed_at           = $this->freshTimestamp();
    }

    /**
     * @param   string  $name
     * @return  NetworkConnectionField
     */
    public function getFieldByName ($name)
    {
        foreach ($this->fields AS $field)
        {
            if ($field->network_field->field == $name)
                return $field;
        }
        return null;
    }

}