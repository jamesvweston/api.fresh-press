<?php

namespace App\Models\Market;


use App\Models\CMS\Influencer;
use App\Models\Locations\Country;
use App\Models\Outlets\OutletConnection;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @SWG\Definition()
 *
 * @property    int                             $id
 * @property    string                          $title
 * @property    string                          $description
 * @property    int                             $percent_male
 * @property    int                             $percent_female
 * @property    string|null                     $logo
 * @property    Influencer                      $influencer
 * @property    AgeRange|null                   $age_range
 * @property    Country|null                    $country
 * @property    \Carbon\Carbon                  $created_at
 * @property    \Carbon\Carbon                  $updated_at
 * @property    \Carbon\Carbon|null             $deleted_at
 */
class Sphere extends Model
{

    use HasTimestamps, SoftDeletes;



    protected $categories;

    protected $outlet_connections;

    protected $portfolios;

    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->title                    = AU::get($data['title']);
        $this->description              = AU::get($data['description']);
        $this->percent_male             = AU::get($data['percent_male']);
        $this->percent_female           = AU::get($data['percent_female']);
        $this->logo                     = AU::get($data['logo']);
        $this->influencer               = AU::get($data['influencer']);
        $this->age_range                = AU::get($data['age_range']);
        $this->country                  = AU::get($data['country']);
        $this->categories               = AU::get($data['categories']);
        $this->outlet_connections       = AU::get($data['outlet_connections']);
        $this->portfolios               = AU::get($data['portfolios']);
    }

    /**
     * @return array
     */
    public function toArray ()
    {
        $object['id']                   = $this->id;
        $object['title']                = $this->title;
        $object['description']          = $this->description;
        $object['percent_male']         = $this->percent_male;
        $object['percent_female']       = $this->percent_female;
        $object['logo']                 = $this->logo;
        $object['age_range']            = is_null($this->age_range) ? null : $this->age_range->toArray();
        $object['country']              = is_null($this->country) ? null : $this->country->toArray();

        return $object;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function age_range()
    {
        return $this->hasOne(AgeRange::class, 'id', 'age_range_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function country()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function influencer ()
    {
        return $this->belongsTo(Influencer::class);
    }

}