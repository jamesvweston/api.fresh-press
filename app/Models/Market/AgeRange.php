<?php

namespace App\Models\Market;


use Illuminate\Database\Eloquent\Model;


/**
 * @SWG\Definition()
 *
 * @property    int                             $id
 * @property    int                             $min
 * @property    int|null                        $max
 */
class AgeRange extends Model
{

    protected $table = 'age_ranges';


    /**
     * @return array
     */
    public function toArray ()
    {
        $object['id']                   = $this->getId();
        $object['min']                  = $this->getMin();
        $object['max']                  = $this->getMax();

        return $object;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * @return int|null
     */
    public function getMax()
    {
        return $this->max;
    }

}