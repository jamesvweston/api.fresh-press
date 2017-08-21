<?php

namespace App\Models\Market;


use App\Models\CMS\Advertiser;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @SWG\Definition()
 *
 * @property    int                             $id
 * @property    string                          $name
 * @property    string|null                     $cover_photo
 * @property    string|null                     $keywords
 * @property    string|null                     $notes
 * @property    string|null                     $pitch
 * @property    string|null                     $rejected_reason
 * @property    int                             $deliverable_deadline_days
 * @property    \Carbon\Carbon|null             $apply_by
 * @property    \Carbon\Carbon|null             $published_at
 * @property    \Carbon\Carbon|null             $closed_at
 * @property    \Carbon\Carbon|null             $paused_at
 * @property    \Carbon\Carbon|null             $submitted_at
 * @property    \Carbon\Carbon|null             $rejected_at
 * @property    Advertiser                      $advertiser
 * @property    Campaign                        $campaign
 * @property    ProductLine                     $product_line
 * @property    DeliverableType                 $deliverable_type
 * @property    \Carbon\Carbon                  $created_at
 * @property    \Carbon\Carbon                  $updated_at
 * @property    \Carbon\Carbon|null             $deleted_at
 */
class Opportunity extends Model
{

    use HasTimestamps, SoftDeletes;


    protected $with = ['advertiser', 'campaign', 'product_line', 'deliverable_type'];

    protected $dates = ['apply_by'];

    protected $creatives;

    protected $compensation_models;

    protected $bids;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->name                     = AU::get($data['name']);
        $this->cover_photo              = AU::get($data['cover_photo']);
        $this->keywords                 = AU::get($data['keywords']);
        $this->notes                    = AU::get($data['notes']);
        $this->pitch                    = AU::get($data['pitch']);
        $this->rejected_reason          = AU::get($data['rejected_reason']);
        $this->deliverable_deadline_days= AU::get($data['deliverable_deadline_days']);
        $this->apply_by                 = AU::get($data['apply_by']);
        $this->published_at             = AU::get($data['published_at']);
        $this->closed_at                = AU::get($data['closed_at']);
        $this->paused_at                = AU::get($data['paused_at']);
        $this->submitted_at             = AU::get($data['submitted_at']);
        $this->rejected_at              = AU::get($data['rejected_at']);
        $this->advertiser               = AU::get($data['advertiser']);
        $this->campaign                 = AU::get($data['campaign']);
        $this->product_line             = AU::get($data['product_line']);
        $this->deliverable_type         = AU::get($data['deliverable_type']);
        $this->bids                     = AU::get($data['bids']);
        $this->creatives                = AU::get($data['creatives']);
        $this->compensation_models      = AU::get($data['compensation_models']);
    }

    /**
     * @return array
     */
    public function toArray ()
    {
        $object['id']                   = $this->id;
        $object['name']                 = $this->name;
        $object['cover_photo']          = $this->cover_photo;
        $object['keywords']             = $this->keywords;
        $object['notes']                = $this->notes;
        $object['pitch']                = $this->pitch;
        $object['rejected_reason']      = $this->rejected_reason;
        $object['deliverable_deadline_days']    = $this->deliverable_deadline_days;
        $object['apply_by']             = $this->apply_by;
        $object['published_at']         = $this->published_at;
        $object['closed_at']            = $this->closed_at;
        $object['paused_at']            = $this->paused_at;
        $object['submitted_at']         = $this->submitted_at;
        $object['rejected_at']          = $this->rejected_at;
        $object['advertiser']           = $this->advertiser->toArray();
        $object['campaign']             = $this->campaign->toArray();
        $object['product_line']         = $this->product_line->toArray();
        $object['deliverable_type']     = $this->deliverable_type->toArray();

        return $object;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function advertiser ()
    {
        return $this->belongsTo(Advertiser::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function campaign ()
    {
        return $this->hasOne(Campaign::class, 'id', 'campaign_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product_line ()
    {
        return $this->hasOne(ProductLine::class, 'id', 'product_line_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function deliverable_type ()
    {
        return $this->hasOne(DeliverableType::class, 'id', 'deliverable_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bids ()
    {
        return $this->hasMany(Bid::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function creatives ()
    {
        return $this->hasMany(OpportunityCreative::class);
    }

}