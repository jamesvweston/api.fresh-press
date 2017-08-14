<?php

namespace App\Models\Market;


/**
 * @SWG\Definition()
 */
class AgeRange implements \JsonSerializable
{

    /**
     * @SWG\Property(example="1")
     * @var int
     */
    protected $id;

    /**
     * @SWG\Property(example="13")
     * @var int
     */
    protected $min;

    /**
     * @SWG\Property(example="17")
     * @var int|null
     */
    protected $max;


    /**
     * @return array
     */
    public function jsonSerialize ()
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