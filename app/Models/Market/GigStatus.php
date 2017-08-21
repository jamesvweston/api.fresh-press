<?php

namespace App\Models\Market;


use Illuminate\Database\Eloquent\Model;


/**
 * @SWG\Definition()
 *
 * @property    int                             $id
 * @property    string                          $name
 */
class GigStatus extends Model
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