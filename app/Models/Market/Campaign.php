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
 * @property    string                          $description
 * @property    int                             $advertiser_id
 * @property    Advertiser                      $advertiser
 * @property    \Carbon\Carbon                  $created_at
 * @property    \Carbon\Carbon                  $updated_at
 * @property    \Carbon\Carbon|null             $deleted_at
 */
class Campaign extends Model
{

    use HasTimestamps, SoftDeletes, DBTransactions;


    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * @return  \Illuminate\Validation\Validator
     */
    public function getValidator ()
    {
        return Validator::make(parent::toArray(), [
            'name'                      => 'required|max:255',
            'description'               => 'required|max:255',
            'advertiser_id'             => 'required|integer',
        ]);
    }

    /**
     * @return array
     */
    public function toArray ()
    {
        $object['id']                   = $this->id;
        $object['name']                 = $this->name;
        $object['description']          = $this->description;

        return $object;
    }

}