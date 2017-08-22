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
        parent::__construct($data);
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

    /**
     * @param array $params
     * @param bool $paginate_results
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function search ($params = [], $paginate_results = false)
    {
        $qb                             = self::query();

        if (!is_null(AU::get($params['ids'])))
            $qb->whereIn('id', explode(',', AU::get($params['ids'])));

        if (!is_null(AU::get($params['advertiser_ids'])))
            $qb->whereIn('advertiser_id', explode(',', AU::get($params['advertiser_ids'])));

        if (!is_null(AU::get($params['campaign_ids'])))
            $qb->whereIn('campaign_id', explode(',', AU::get($params['campaign_ids'])));

        if (!is_null(AU::get($params['deliverable_type_ids'])))
            $qb->whereIn('deliverable_type_id', explode(',', AU::get($params['deliverable_type_ids'])));

        if (!is_null(AU::get($params['product_line_ids'])))
            $qb->whereIn('product_line_id', explode(',', AU::get($params['product_line_ids'])));

        if (!is_null(AU::get($params['advertiser_ids'])))
            $qb->whereIn('advertiser_id', explode(',', AU::get($params['advertiser_ids'])));

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