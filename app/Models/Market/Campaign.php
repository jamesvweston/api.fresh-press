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
 * @property    string                          $description
 * @property    Advertiser                      $advertiser
 * @property    \Carbon\Carbon                  $created_at
 * @property    \Carbon\Carbon                  $updated_at
 * @property    \Carbon\Carbon|null             $deleted_at
 */
class Campaign extends Model
{

    use HasTimestamps, SoftDeletes;

    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->name                     = AU::get($data['name']);
        $this->description              = AU::get($data['description']);
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