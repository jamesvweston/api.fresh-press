<?php

namespace App\Models\Networks;


use Illuminate\Database\Eloquent\Model;

/**
 * @SWG\Definition()
 *
 * @property    int                             $id
 * @property    string                          $label
 * @property    string                          $field
 * @property    Network                         $network
 */
class NetworkField extends Model
{

    /**
     * @return array
     */
    public function toArray()
    {
        $object['id']                   = $this->id;
        $object['label']                = $this->label;
        $object['field']                = $this->field;

        return $object;
    }

}