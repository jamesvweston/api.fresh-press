<?php

namespace App\Models\Locations;


use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @property    int                             $id
 * @property    string                          $street1
 * @property    string|null                     $street2
 * @property    string                          $city
 * @property    string                          $postal_code
 * @property    string|null                     $phone
 * @property    string                          $state_province
 * @property    Country                         $country
 * @property    \Carbon\Carbon                  $created_at
 * @property    \Carbon\Carbon                  $updated_at
 */
class Address extends Model
{

    use HasTimestamps;

    protected $with = ['country'];

    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->created_at               = new \DateTime();
        $this->updated_at               = new \DateTime();
        $this->street1                  = AU::get($data['street1']);
        $this->street2                  = AU::get($data['street2']);
        $this->city                     = AU::get($data['city']);
        $this->postal_code              = AU::get($data['postal_code']);
        $this->phone                    = AU::get($data['phone']);
        $this->state_province           = AU::get($data['state_province']);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $object['id']                   = $this->id;
        $object['street1']              = $this->street1;
        $object['street2']              = $this->street2;
        $object['city']                 = $this->city;
        $object['postal_code']          = $this->postal_code;
        $object['phone']                = $this->phone;
        $object['state_province']       = $this->state_province;
        $object['country']              = $this->country->toArray();

        return $object;
    }

    public function country()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }

}