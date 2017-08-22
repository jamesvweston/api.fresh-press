<?php

namespace App\Models\Locations;


use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Validator;

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

    protected $fillable = [
        'street1',
        'street2',
        'city',
        'postal_code',
        'phone',
        'state_province',
        'country_id'
    ];

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

    /**
     * @return  \Illuminate\Validation\Validator
     */
    public function getValidator ()
    {
        return Validator::make(parent::toArray(), [
            'street1'                   => 'required|max:100',
            'street2'                   => 'nullable|max:100',
            'city'                      => 'required|max:100',
            'postal_code'               => 'required|max:20',
            'phone'                     => 'nullable|max:20',
            'state_province'            => 'required|max:100',
            'country_id'                => 'required|integer',
        ]);
    }

    public function country()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }

}