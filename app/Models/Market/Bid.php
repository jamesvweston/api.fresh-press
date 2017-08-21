<?php

namespace App\Models\Market;


use App\Models\CMS\Influencer;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @SWG\Definition()
 *
 * @property    int                             $id
 * @property    float                           $amount
 * @property    string|null                     $message
 * @property    string|null                     $product_address
 * @property    string|null                     $product_choices
 * @property    string|null                     $rejected_reason
 * @property    float                           $freshpress_cut
 * @property    Influencer                      $influencer
 * @property    Opportunity                     $opportunity
 * @property    \Carbon\Carbon|null             $accepted_at
 * @property    \Carbon\Carbon|null             $rejected_at
 * @property    \Carbon\Carbon                  $created_at
 * @property    \Carbon\Carbon                  $updated_at
 * @property    \Carbon\Carbon|null             $deleted_at
 */
class Bid extends Model
{

    use HasTimestamps, SoftDeletes;


    public function __construct($data = [])
    {
        $this->amount                   = AU::get($data['amount']);
        $this->message                  = AU::get($data['message']);
        $this->product_address          = AU::get($data['product_address']);
        $this->product_choices          = AU::get($data['product_choices']);
        $this->reject_reason            = AU::get($data['reject_reason']);
        $this->freshpress_cut           = AU::get($data['freshpress_cut']);
        $this->influencer               = AU::get($data['influencer']);
        $this->opportunity              = AU::get($data['opportunity']);
        $this->accepted_at              = AU::get($data['accepted_at']);
        $this->rejected_at              = AU::get($data['rejected_at']);
    }

    /**
     * @return array
     */
    public function toArray ()
    {
        $object['id']                   = $this->id;
        $object['amount']               = $this->amount;
        $object['message']              = $this->message;
        $object['product_address']      = $this->product_address;
        $object['product_choices']      = $this->product_choices;
        $object['reject_reason']        = $this->rejected_reason;
        $object['influencer']           = $this->influencer->toArray();
        $object['accepted_at']          = $this->accepted_at;
        $object['rejected_at']          = $this->rejected_at;

        return $object;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function influencer ()
    {
        return $this->belongsTo(Influencer::class);
    }

}