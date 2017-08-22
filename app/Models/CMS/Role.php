<?php

namespace App\Models\CMS;


use Illuminate\Database\Eloquent\Model;


/**
 * @property    int                             $id
 * @property    string                          $name
 */
class Role extends Model
{


    /**
     * @return array
     */
    public function toArray ()
    {
        $object['id']                   = $this->id;
        $object['name']                 = $this->name;

        return $object;
    }

}