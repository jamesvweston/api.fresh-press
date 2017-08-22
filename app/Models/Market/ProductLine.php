<?php

namespace App\Models\Market;


use App\Models\CMS\Advertiser;
use App\Models\Traits\DBTransactions;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

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
 * @property    \Carbon\Carbon                  $created_at
 * @property    \Carbon\Carbon                  $updated_at
 * @property    \Carbon\Carbon|null             $deleted_at
 *
 * @property    Advertiser                      $advertiser
 * @property    Platform[]                      $platforms
 */
class ProductLine extends Model
{

    use HasTimestamps, SoftDeletes, DBTransactions;


    protected $fillable = [
        'name',
        'alias',
        'description',
        'logo',
        'website',
        'facebook',
        'instagram',
        'news_url',
        'keywords',
    ];

    protected $platforms;


    /**
     * @return  \Illuminate\Validation\Validator
     */
    public function getValidator ()
    {
        return Validator::make(parent::toArray(), [
            'name'                      => 'required|max:255',
            'logo'                      => 'required|max:255',
            'alias'                     => 'nullable|max:255',
            'description'               => 'required',
            'website'                   => 'nullable|url|max:255',
            'facebook'                  => 'nullable|url|max:255',
            'twitter'                   => 'nullable|url|max:255',
            'instagram'                 => 'nullable|url|max:255',
            'news_url'                  => 'nullable|url|max:255',
            'keywords'                  => 'nullable|max:255',
        ]);
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