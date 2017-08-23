<?php

namespace App\Models\Networks;


use Illuminate\Database\Eloquent\Model;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @SWG\Definition()
 *
 * @property    int                             $id
 * @property    int                             $network_connection_id
 * @property    int                             $network_field_id
 * @property    string                          $value
 *
 * @property    NetworkField                    $network_field
 * @property    NetworkConnection               $network_connection
 */
class NetworkConnectionField extends Model
{

    protected $with = ['network_field'];

    /**
     * @return array
     */
    public function toArray()
    {
        $object['id']                   = $this->id;
        $object['network_field']        = $this->network_field->toArray();
        $object['value']                = $this->value;

        return $object;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function network_field ()
    {
        return $this->hasOne(NetworkField::class, 'id', 'network_field_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function network_connection ()
    {
        return $this->belongsTo(NetworkConnection::class);
    }

}