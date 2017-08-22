<?php

namespace App\Models\Market;


use Illuminate\Database\Eloquent\Model;


/**
 * @property    int                             $id
 * @property    string                          $name
 */
class PortfolioType extends Model
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