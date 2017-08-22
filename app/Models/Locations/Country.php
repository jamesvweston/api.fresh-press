<?php

namespace App\Models\Locations;


use Illuminate\Database\Eloquent\Model;


/**
 * @property    int                             $id
 * @property    string                          $name
 * @property    string                          $code
 */
class Country extends Model
{

    protected $table = 'countries';


    /**
     * @return array
     */
    public function toArray ()
    {
        $object['id']                   = $this->id;
        $object['name']                 = $this->name;
        $object['code']                 = $this->code;

        return $object;
    }

}