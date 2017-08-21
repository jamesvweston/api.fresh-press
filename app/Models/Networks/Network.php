<?php

namespace App\Models\Networks;


use Illuminate\Database\Eloquent\Model;

/**
 * @SWG\Definition()
 *
 * @property    int                             $id
 * @property    string                          $label
 * @property    string                          $shorthand
 * @property    string                          $logo
 * @property    int                             $fmtc_network_id
 * @property    string|null                     $sub_id_key
 * @property    NetworkField[]                  $fields
 */
class Network extends Model
{

    /**
     * @return array
     */
    public function toArray()
    {
        $object['id']                   = $this->id;
        $object['label']                = $this->label;
        $object['shorthand']            = $this->shorthand;
        $object['logo']                 = $this->logo;

        return $object;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fields()
    {
        return $this->hasMany(NetworkField::class);
    }

}