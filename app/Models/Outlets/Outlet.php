<?php

namespace App\Models\Outlets;


use Illuminate\Database\Eloquent\Model;


/**
 * @SWG\Definition()
 *
 * @property    int                             $id
 * @property    string                          $name
 */
class Outlet extends Model
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