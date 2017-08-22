<?php

namespace App\Models\Market;


use App\Models\CMS\Advertiser;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @property    int                             $id
 * @property    string                          $name
 * @property    string|null                     $alias
 * @property    string                          $description
 * @property    string                          $logo
 * @property    string|null                     $website
 * @property    string|null                     $facebook
 * @property    string|null                     $twitter
 * @property    string|null                     $instagram
 * @property    string|null                     $news_url
 * @property    string|null                     $keywords
 * @property    Advertiser                      $advertiser
 * @property    Platform[]                      $platforms
 * @property    \Carbon\Carbon                  $created_at
 * @property    \Carbon\Carbon                  $updated_at
 * @property    \Carbon\Carbon|null             $deleted_at
 */
class ProductLine extends Model
{

    use HasTimestamps, SoftDeletes;


    protected $fillable = [
        'name',
        'alias',
        'description',
    ];

    protected $platforms;

    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->name                     = AU::get($data['name']);
        $this->alias                    = AU::get($data['alias']);
        $this->description              = AU::get($data['description']);
        $this->logo                     = AU::get($data['logo']);
        $this->website                  = AU::get($data['website']);
        $this->facebook                 = AU::get($data['facebook']);
        $this->twitter                  = AU::get($data['twitter']);
        $this->instagram                = AU::get($data['instagram']);
        $this->news_url                 = AU::get($data['news_url']);
        $this->keywords                 = AU::get($data['keywords']);
    }

    /**
     * @return array
     */
    public function toArray ()
    {
        $object['id']                   = $this->id;
        $object['name']                 = $this->name;
        $object['alias']                = $this->alias;
        $object['description']          = $this->description;
        $object['logo']                 = $this->logo;
        $object['website']              = $this->website;
        $object['facebook']             = $this->facebook;
        $object['twitter']              = $this->twitter;
        $object['instagram']            = $this->instagram;
        $object['news_url']             = $this->news_url;
        $object['keywords']             = $this->keywords;

        return $object;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function platforms ()
    {
        return $this->hasMany(Platform::class);
    }

}